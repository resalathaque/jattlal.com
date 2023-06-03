<?php
/**
* curl request
*/
class Http {
	
	/**
	* @var array curl default settings
	**/	
	protected $options = [
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER => false,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_CONNECTTIMEOUT => 50,
		CURLOPT_TIMEOUT => 50,

	];
	
	function __construct($uri)
	{
		if ( !function_exists('curl_init'))
			throw new HttpException('Your PHP installation doesn\'t have cURL enabled. Rebuild PHP with --with-curl');

		$this->connection = curl_init($uri);
	}


	function request($method, $data = array())
	{
		switch ($method) {
			case 'POST':
				$this->options[CURLOPT_POST] = true;
				break;

			case 'PUT':
				$this->options[CURLOPT_PUT] = true;
				break;

			case 'DELETE':
				$this->options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
				break;

			default:
				break;
		}

		if ($method === 'POST' || $method === 'PUT') {
			$this->options[CURLOPT_POSTFIELDS] = $data;
		}

		curl_setopt_array($this->connection, $this->options);
		$response = curl_exec($this->connection);
		
		if ( !$response ) throw new HttpException(curl_error($this->connection), curl_errno($this->connection));

		curl_close($this->connection);
		return $response;
	}

	function setOptions($options)
	{
		foreach ($options as $key => $value) {
			$this->options[$key] = $value;
		}
	}

	public static function __callstatic($method, $params)
	{
		$http = new static($params[0]);
		return $http->request(strtoupper($method), @$params[1]);
	}

	public static function requestJson($uri)
	{
		return json_decode(static::get($uri));
	}
}

class HttpException extends Exception{}

?>