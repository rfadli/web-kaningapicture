<?php

class aboutus_controller extends controller
{
	public function index()
	{
		$db = Db::init();
		$content = $db->content;
		$q = array(
			'category_content' => new MongoId(SLIDER_ID),
			'contributor_id' => CLIENT_ID,
		);
		$mcontent = $content->find($q);
		
		$vision = array(
			'category_content' => new MongoId(VISION),
			'contributor_id' => CLIENT_ID,
		);
		$mvision = $content->find($vision);
		
		$history = array(
			'category_content' => new MongoId(HISTORY),
			'contributor_id' => CLIENT_ID,
		);
		$mhistory = $content->find($history);
		
		$wordsceo = array(
			'category_content' => new MongoId(WORDSCEO),
			'contributor_id' => CLIENT_ID,
		);
		$mwordsceo = $content->find($wordsceo);
		
		$p = array(
			'page_header' => "About Us",
			'page_description' => "About Us",
			'mcontent' => $mcontent,
			'mvision' => $mvision,
			'mhistory' => $mhistory,
			'mwordsceo' => $mwordsceo
			
		);
		$content = $this->getView(DOCVIEW.'aboutus/index.php', $p);
		$this->addView('content', $content);
		
		//$this->tambah();
		$this->render(array());
	}
	
	
}
