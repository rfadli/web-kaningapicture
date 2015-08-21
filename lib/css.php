<?php

class css
{
	protected $datcss;
	
	public function __construct()
	{
		$this->datcss = array();
	}
	
	public function add($link, $rel="stylesheet", $type="text/css", $media="all")
	{
		$p = array(
			'link' => $link,
			'rel' => $rel,
			'type' => $type,
			'media' => $media
		);
		$this->datcss[] = $p;
	}
	
	public function getCss()
	{
		$hasil = "";
		foreach($this->datcss as $d)
		{
			$hasil .= '<link href="'.$d['link'].'" rel="'.$d['rel'].'" type="'.$d['type'].'" media="'.$d['media'].'" />'."\n";
		}
		
		return $hasil;
	}
}
