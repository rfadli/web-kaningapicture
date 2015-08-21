<?php

class helper
{
	public static function getIp()
	{
		$ip = '';
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	public static function time_elapsed_string($ptime)
	{
	    $etime = time() - $ptime;
	
	    if ($etime < 1)
	    {
	        return '0 seconds';
	    }
	
	    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
	                30 * 24 * 60 * 60       =>  'month',
	                24 * 60 * 60            =>  'day',
	                60 * 60                 =>  'hour',
	                60                      =>  'minute',
	                1                       =>  'second'
	                );
	
	    foreach ($a as $secs => $str)
	    {
	        $d = $etime / $secs;
	        if ($d >= 1)
	        {
	            $r = round($d);
	            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
	        }
	    }
	}
	
	public static function limitString($string, $limit = 100) 
	{
	    // Return early if the string is already shorter than the limit
	    if(strlen($string) < $limit) {return $string;}
	
	    $regex = "/(.{1,$limit})\b/";
	    preg_match($regex, $string, $matches);
	    return $matches[1].'...';
	}
	
	public static function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);
	 
	  if ($unit == "K") {
	    return ($miles * 1.609344);
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}
	
	public static function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
	}
	
	public static function gethotproduct()
	{
		$db = Db::init();
		$product = $db->product;
		$ar = array(
			'contributor_id' => CLIENT_ID
		);
		$mproduct = $product->findOne($ar);
		if(isset($mproduct['_id']))
		{
			return $mproduct;
		}
		return FALSE;
	}
	
	public static function getfeatureartist()
	{
		$db = Db::init();
		$artist = $db->content;
		$ar = array(
			'contributor_id' => CLIENT_ID,
			'category_content' => new MongoId('555c524d1295956e3d8b4570')
		);
		$martist = $artist->findOne($ar);
		if(isset($martist['_id']))
		{
			return $martist;
		}
		return FALSE;
	}
	
	public static function getcontactdealer()
	{
		$db = Db::init();
		$dealer = $db->dealer;
		$ar = array(
			'contributor_id' => CLIENT_ID
		);
		$mdealer = $dealer->findOne($ar);
		if(isset($mdealer['_id']))
		{
			return $mdealer;
		}
		return FALSE;
	}
	
	public static function getimageproductrandom()
	{
		$db = Db::init();
		$product = $db->product;
		$ar = array(
			'contributor_id' => CLIENT_ID
		);
		$limit = 3;
		$mmproduct = $product->find($ar)->limit($limit);
		foreach ($mmproduct as $mproduct) 
		{
			if(isset($mproduct['_id']))
			{
				return $mproduct;
			}
		}
		
		return FALSE;
	}
}
