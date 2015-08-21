<?php
class career_controller extends controller
{
	public function index()
	{
		$db = Db::init();
		$content = $db->content;
		$jobs = array(
			'category_content' => new MongoId(JOBVACANY),
			'contributor_id' => CLIENT_ID,
		);
		$mjobs = $content->find($jobs);
		
		$whywork = array(
			'category_content' => new MongoId(WHYWORK),
			'contributor_id' => CLIENT_ID,
		);
		$mwhywork = $content->find($whywork);
		
		$p = array(
			'page_header' => "Dashboard",
			'page_description' => "Dashboard",
			'mjobs' => $mjobs,
			'mwhywork' => $mwhywork
		);
		$content = $this->getView(DOCVIEW.'career/index.php', $p);
		$this->addView('content', $content);
		
		$this->render(array());
	}
	
	public function lteie8()
	{
		$content = $this->getView(DOCVIEW.'template/lte-ie8.php', array());
		echo $content;
	}
}
