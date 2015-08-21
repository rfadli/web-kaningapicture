<?php

class error_controller extends controller
{
	public function err404($errno, $error_text, $simpan)
	{
		$p = array(
			'errortext' => $error_text
		);
		$content = $this->getView(DOCVIEW.'template/404.php', $p);
		
		$p = array(
			'content' => $content
		);
		$view = $this->getView(DOCVIEW.'template/template.php', $p);
		echo $view;
		die;
	}
}
