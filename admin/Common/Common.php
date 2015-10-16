<?php
		function getIP() {
							if (@$_SERVER["HTTP_X_FORWARDED_FOR"])
							$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
							else if (@$_SERVER["HTTP_CLIENT_IP"])
							$ip = $_SERVER["HTTP_CLIENT_IP"];
							else if (@$_SERVER["REMOTE_ADDR"])
							$ip = $_SERVER["REMOTE_ADDR"];
							else if (@getenv("HTTP_X_FORWARDED_FOR"))
							$ip = getenv("HTTP_X_FORWARDED_FOR");
							else if (@getenv("HTTP_CLIENT_IP"))
							$ip = getenv("HTTP_CLIENT_IP");
							else if (@getenv("REMOTE_ADDR"))
							$ip = getenv("REMOTE_ADDR");
							else
							$ip = "Unknown";
							return $ip;
				}
		function getTime(){
							$time=time();
							return $time;
				}
		function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
		{
			if(function_exists("mb_substr"))
				return mb_substr($str, $start, $length, $charset);
			elseif(function_exists('iconv_substr')) {
				return iconv_substr($str,$start,$length,$charset);
			}
			$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
			$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
			$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
			$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
			preg_match_all($re[$charset], $str, $match);
			$slice = join("",array_slice($match[0], $start, $length));
			if($suffix) return $slice;
			return $slice;
		}
?>