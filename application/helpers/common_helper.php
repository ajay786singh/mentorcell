<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('pr'))
{
    function pr($array)
    {
        print("<pre>");
        print_r($array);
		print("</pre>");
    }
}

if ( ! function_exists('coupon_generator'))
{
	function coupon_generator($length) {
		$key = '';
		$keys = array_merge(range(0, 9), range('A', 'Z'));

		for ($i = 0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
		}

		return $key;
	}
}
