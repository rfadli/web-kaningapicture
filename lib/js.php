<?php

class js
{
	protected $datjs;
	
	public function __construct()
	{
		$this->datjs = array();
	}
	
	public function add($link, $type="text/javascript")
	{
		$p = array(
			'link' => $link,
			'type' => $type
		);
		$this->datjs[] = $p;
	}
	
	public function getJs()
	{
		$hasil = "";
		foreach($this->datjs as $d)
		{
			$hasil .= '<script src="'.$d['link'].'" type="'.$d['type'].'"></script>'."\n";
		}
		
		return $hasil;
	}
}
