<?php
$db = Db::init();
$mn = $db->menu;
$mnd = $mn->find(array('contributor_id' => CLIENT_ID))->sort(array('no_urut' => 1));

if($controller_name == 'welcome')
	echo '<li class="menu-active"><a href="/">HOME</a><div class="hover-active"></div></li>';
else {
	echo '<li><a href="/">HOME</a><div class="hover-active"></div></li>';
}
	
foreach($mnd as $dd)
{
	$ada = false;
	$ext = explode('/', $dd['linkurl']);
	if(isset($ext[1]))
	{
		if($controller_name == strtolower($ext[1]))
		{
			$ada = true;
			$havetdy = false;
			$mystring = $dd['linkurl'];
			$findme   = '?';
			$pos = strpos($mystring, $findme);
			
			// Note our use of ===.  Simply == would not work as expected
			// because the position of 'a' was the 0th (first) character.
			if ($pos === false) {
			    $havetdy = false;
			} else {
			    $havetdy = true;
			}
			
			if($havetdy)
				$linkurl = $dd['linkurl'].'&menuid='.trim($dd['_id']);
			else
				$linkurl = $dd['linkurl'].'?menuid='.trim($dd['_id']);
			echo '<li class="menu-active"><a href="'.$linkurl.'">'.$dd['name'].'</a><div class="hover-active"></div></li>';
		}
	}
	if(!$ada)
		echo '<li><a href="'.$dd['linkurl'].'">'.$dd['name'].'</a><div class="hover-active"></div></li>';
}

if($controller_name == 'contact')
	echo '<li class="menu-active"><a href="/contact/index">CONTACT US</a><div class="hover-active"></div></li>';
else {
	echo '<li><a href="/contact/index">CONTACT US</a><div class="hover-active"></div></li>';
}
?>

