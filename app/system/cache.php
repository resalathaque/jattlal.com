<?php
/**
 * Memcached based caching system
 * @date 26.04.2015
 * @author kiash
 */

class Cache {
	
	private static $config = [
		'host'	=>	'localhost',
		'port'	=>	11211,
	];

	private static $instance;


	public static function connection()
	{
		if ( ! self::$instance instanceof Memcached ) {
			self::$instance = new Memcached();
			self::$instance->addServer(self::$config['host'], self::$config['port']);
		}

		return self::$instance;
	}

	public static function put($key, $data, $minutes = 0)
	{
		return self::connection()->set($key, $data, $minutes * 60);
	}

	public static function get($key)
	{
		return self::connection()->get($key);
	}
}

?>