<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('hash_id'))
{
	function hash_id($id = '')
	{
		$CI =& get_instance();
		return urlencode($CI->encrypt->encode($id));
	}
}

if ( ! function_exists('dehash_id'))
{
	function dehash_id($id = '', $urldec = false)
	{
		$CI =& get_instance();
		if ($urldec == true) {
			return $CI->encrypt->decode(urldecode($id));
		} else {
			return $CI->encrypt->decode($id);
		}
	}
}
