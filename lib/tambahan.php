<?php

class tambahan
{
	protected $dattambahan;
	
	public function __construct()
	{
		$this->dattambahan = array();
	}
	
	public function add($content)
	{
		$p = array(
			'content' => $content,
		);
		$this->dattambahan[] = $p;
	}
	
	public function getTambahan()
	{
		$hasil = "";
		foreach($this->dattambahan as $d)
		{
			$hasil .= $d['content']."\n";
		}
		
		return $hasil;
	}
}
