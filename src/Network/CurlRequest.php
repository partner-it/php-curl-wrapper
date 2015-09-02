<?php

namespace PartnerIT\Curl\Network;

/**
 * Interface HttpRequest
 * @package PartnerIT\Curl\Network
 */
interface HttpRequest
{
	public function setOption($name, $value);

	public function execute();

	public function getInfo($name);

	public function close();
}

/**
 * Class CurlRequest
 * @package PartnerIT\Curl\Network
 */
class CurlRequest implements HttpRequest
{
	private $handle = null;

	public function __construct($url = null)
	{
		$this->handle = curl_init($url);
	}

	public function setOption($name, $value)
	{
		curl_setopt($this->handle, $name, $value);
	}

	public function execute()
	{
		return curl_exec($this->handle);
	}

	public function getInfo($name)
	{
		return curl_getinfo($this->handle, $name);
	}

	public function close()
	{
		curl_close($this->handle);
	}

	public function getHandle()
	{
		return $this->handle;
	}

	public function getErrorNo()
	{
		return curl_errno($this->handle);
	}

	public function getError()
	{
		return curl_error($this->handle);
	}

}
