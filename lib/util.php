<?php

class util
{
	public static function isAdmin()
	{
		if(isset($_SESSION['contributor_id']))
		{
			if($_SESSION['contributor_id'] == 'skripc@gmail.com')
				return true;
		}
		return false;
	}
	
	public static function limitString($string, $limit = 100) 
	{
	    // Return early if the string is already shorter than the limit
	    if(strlen($string) < $limit) {return $string;}
	
	    $regex = "/(.{1,$limit})\b/";
	    preg_match($regex, $string, $matches);
	    return $matches[1].'...';
	}
	
	public static function menuActive($controller_name, $mn, $add = '')
	{
		$arr = explode(',', $mn);
		foreach($arr as $ar)
		{
			$m = trim($ar);
			if($controller_name == $m)
			{
				if(strlen(trim($add)) == 0)
					return 'class="active"';
				return 'class="active '.$add.'"';
			}
		}
		if(strlen(trim($add)) == 0)
			return '';
		return 'class="'.$add.'"';
	}
	
	public static function getImageCache($name, $imgsrc, $width, $height)
	{
		$path_parts = pathinfo($name);
		$ext = $path_parts['extension'];
		$flname = $path_parts['filename']; 
		$fname = $flname.'.'.$width.'x'.$height.'.'.$ext;
		$fpath = "./public/media/".$fname;
		if(!file_exists($fpath))
		{
			try
			{
				$image = WideImage::load($imgsrc);
				$resizedImage = $image->resize(intval($width), intval($height));
    			$resizedImage->saveToFile($fpath);
			}
			catch (Exception $e)
			{
				echo "<td>".$e."</td>";
			}
		}
		return '/public/media/'.$fname;
	}

	public static function randomKey()
    {
        $crypt = new CkCrypt2() ;

	    $success = $crypt->UnlockComponent("WILLAWCrypt_KM8tJZPHMRLn");
	    if ($success != true) {
	        printf("%s\n",$crypt->lastErrorText());
	        return "";
	    }

		$crypt->put_CryptAlgorithm("aes");
	    $crypt->put_CipherMode("cbc");
	    $crypt->put_KeyLength(256);
	    $crypt->put_PaddingScheme(0);
	    $crypt->put_EncodingMode("hex");

    	return $crypt->genRandomBytesENC(32);               
    }
	
	public static function passwordHash($pwd)
	{
		$salt = 'CMS798dig%%44$$33**_';
		$salt = md5($salt.$pwd);
				
		$options = [
			'cost' => 11,
			'salt' => $salt,
		];
		$pwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
		return $pwd;
	}
	
	public static function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	
	
}
