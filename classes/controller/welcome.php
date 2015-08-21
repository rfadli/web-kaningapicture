<?php

class welcome_controller extends controller
{
	public function index()
	{
		
		$p = array(
			'page_header' => "Dashboard",
			'page_description' => "Dashboard",
		);
		$content = $this->getView(DOCVIEW.'welcome/index.php', $p);
		$this->addView('content', $content);
		
		$this->render(array());
	}
	
	public function lteie8()
	{
		$content = $this->getView(DOCVIEW.'template/lte-ie8.php', array());
		echo $content;
	}
}
