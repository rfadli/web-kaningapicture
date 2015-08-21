<?php

class contentdetil_controller extends controller
{
	public function index()
	{
		$id = $_GET['id'];
		
		$db = Db::init();
		$content = $db->content;
		$q = array(
			'_id' => new MongoId($id),
			'contributor_id' => CLIENT_ID,
		);
		$data = $content->findOne($q);
		
		$b = array(
			'category_content' => new MongoId($data['category_content']),
			'contributor_id' => CLIENT_ID,
		);
		$limit = 3;
		$recent = $content->find($b)->sort(array('time_created' => -1))->limit($limit);
		
		$link = "/contentdetil/index?id=".$id;
		
		$p = array(
			'page_header' => "Content",
			'page_description' => "Content",
			'data' => $data,
			'recent' => $recent,
			'link' => $link
		);
		
		$content = $this->getView(DOCVIEW.'contentdetil/index.php', $p);
		$this->addView('content', $content);
		//$this->tambah();
		$this->render(array());
	}
	
}