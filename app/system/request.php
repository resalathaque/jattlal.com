<?php

class Request {

	/**
	 * is mobile
	 * @var bool
	 */
	protected static $mobile;

	/**
	 * is robot
	 * @var bool
	 */
	protected static $robot;

	
	/**
	 * Get header by key
	 * 
	 * @param string $key
	 * @return string
	 */
	public static function header($key, $default = null)
	{
		return isset($_SERVER[$key]) ? $_SERVER[$key] : $default;
	}

	/**
	 * Check user is mobile or not
	 * 
	 * @return boolen
	 */
	public static function mobile()
	{
		if ( is_null(static::$mobile) )
		{
			$mobile = App::make('Mobile_Detect');
			static::$mobile = $mobile->isMobile();
		}

		return static::$mobile;
	}


	/**
	 * Robots
	 * 
	 * @access public
	 * @return boob
	 */
	public static function robot()
	{
		if ( is_null(static::$robot) )
		{
			static::$robot = preg_match('#\b(googlebot|bingbot|msnbot|slurp|yahoo|askjeeves|fastcrawler|infoseek|lycos)\b#i', static::header('HTTP_USER_AGENT'));
		}

		return static::$robot;
	}

	/**
	 * get user ip
	 * @return string
	 */
	public static function ip()
	{
		return static::header('REMOTE_ADDR');
	}


	/**
	* Fetch the IP Address
	*
	* @return	string
	*/
	public static function real_ip()
	{
		if( static::header('HTTP_CLIENT_IP') )
			return static::header('HTTP_CLIENT_IP');

		elseif( static::header('X_FORWARDED_FOR') )
			return static::header('X_FORWARDED_FOR');

		else return static::header('REMOTE_ADDR');
	}

	/**
	 * request if from ajax or not
	 *
	 * @return bool
	 */
	public static function ajax()
	{
		return (static::header('HTTP_X_REQUESTED_WITH') === 'XMLHttpRequest');
	}

	/**
	 * get referer
	 *
	 * @return string
	 */
	public static function referer()
	{
		return static::header('HTTP_REFERER');
	}

	/**
	 * get request method
	 *
	 * @return string
	 */
	public static function method()
	{
		return static::header('REQUEST_METHOD');
	}

	/**
	 * get request uri
	 *
	 * @return string
	 */
	public static function uri()
	{
		return 'http://'. Config::app('domain') . parse_url(static::header('REQUEST_URI'), PHP_URL_PATH);
	}

	public static function paths()
	{
		$uri = trim(parse_url(static::header('REQUEST_URI'), PHP_URL_PATH), '/');
		return explode('/', $uri);
	}
}
?>