<?php
class contact_controller extends controller
{
	public function index()
	{
		$db = Db::init();
		$content = $db->preference;
		$q = array(
			'_id' => new MongoId(PREFERENCES),
			'contributor_id' => CLIENT_ID,
		);
		$mcontent = $content->findOne($q);
		
		$p = array(
			'page_header' => "Contact",
			'page_description' => "Contact",
			'mcontent' => $mcontent,
		);
		$content = $this->getView(DOCVIEW.'contact/index.php', $p);
		$this->addView('content', $content);
		
		$this->render(array());
	}
	
	public function lteie8()
	{
		$content = $this->getView(DOCVIEW.'template/lte-ie8.php', array());
		echo $content;
	}
}
