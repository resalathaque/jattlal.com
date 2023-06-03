<?php

class Str {
	
	/**
	 * Generate a URL friendly "slug" from a given string.
	 *
	 * @param	string	$title
	 * @param	string	$separator
	 * @return string
	 */
	public static function slug($title, $separator = '-')
	{
		// Convert all dashes/undescores into separator
		$flip = $separator == '-' ? '_' : '-';

		$title = iconv('utf-8', 'us-ascii//TRANSLIT', $title);

		$title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

		// Remove all characters that are not the separator, letters, numbers, or whitespace.
		$title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

		// Replace all separator characters and whitespace by a single separator
		$title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

		return trim($title, $separator);
	}

	public static function normalize($str) {
		return ucwords(str_replace('-', ' ', $str));
	}

	/**
	 * MB safe uc words
	 * @param string
	 *
	 * @return string
	 */
	public static function title($str)
	{
		return mb_convert_case($str, MB_CASE_TITLE, 'UTF-8');
	}

	/**
	 * Short readable url
	 *
	 * @param string $uri (full url path)
	 * @return string host.com/../path.file
	 */
	public static function urify($uri)
	{
		return parse_url($uri, PHP_URL_HOST) .'/../'. pathinfo($uri, PATHINFO_BASENAME);
	}

	/**
	 * Funcion for preaseing youtube url
	 */
	public static function getVideoIdFromYoutubeURL($url)
	{
		parse_str(parse_url($url, PHP_URL_QUERY), $params);
		if (isset($params['v'])) return $params['v'];
	}
}
?>