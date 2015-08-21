<?php
class media_controller extends controller
{
	public function index()
	{
		$db = Db::init();
		$content = $db->content;
		$news = array(
			'category_content' => new MongoId(NEWS),
			'contributor_id' => CLIENT_ID,
		);
		$limit = 1;
		$mnews = $content->find($news)->sort(array("time_created" => -1))->limit($limit);
		
		$blog = array(
			'category_content' => new MongoId(BLOG),
			'contributor_id' => CLIENT_ID,
		);
		$limit = 1;
		$mblog = $content->find($blog)->sort(array("time_created" => -1))->limit($limit);
		
		$press_kit = array(
			'category_content' => new MongoId(PRESS_KIT),
			'contributor_id' => CLIENT_ID,
		);
		$mpress_kit = $content->findOne($press_kit);
		
		$press_release = array(
			'category_content' => new MongoId(PRESS_RELEASE),
			'contributor_id' => CLIENT_ID,
		);
		$mpress_release = $content->findOne($press_release);
		
		$p = array(
			'page_header' => "Media",
			'page_description' => "Media",
			'mnews' => $mnews,
			'mblog' => $mblog,
			'mpress_kit' => $mpress_kit,
			'mpress_release' => $mpress_release
		);
		$content = $this->getView(DOCVIEW.'media/index.php', $p);
		$this->addView('content', $content);
		
		$this->render(array());
	}
	
	public function lteie8()
	{
		$content = $this->getView(DOCVIEW.'template/lte-ie8.php', array());
		echo $content;
	}
}
