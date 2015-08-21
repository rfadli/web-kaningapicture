<?php
class contentcategory_controller extends controller
{
	public function index()
	{
		$id = $_GET['id'];
		
		$page = "";
		if (isset($_GET['page']))
			$page = $_GET['page'];
		
		if(strlen(trim($page)) > 0)
			$page = intval($page);
		else
			$page = 1;
		
		$docs_per_page = 3;
		$skip = (int)($docs_per_page * ($page - 1));
		
		$db = Db::init();
		$content = $db->content;
		$q = array(
			'category_content' => new MongoId($id),
			'contributor_id' => CLIENT_ID,
		);
		$c = $content->find($q)->limit($docs_per_page)->skip($skip)->sort(array("time_created" => -1));
		$count = $content->count($q);
		//$mcontent = $content->find($q);
		
		$pg = new Pagination();
		$pg -> pag_url = "/contentcategory/index?id=".$id.'&page=';
		$pg -> calculate_pages($count, $docs_per_page, $page);
		
		$p = array(
			'page_header' => "Dashboard",
			'page_description' => "Dashboard",
			'mcontent' => $c,
			'pagination' => $pg->Show(),
			'idx' => (($page-1)*$docs_per_page)+1,
		);
		$content = $this->getView(DOCVIEW.'contentcategory/index.php', $p);
		$this->addView('content', $content);

		$this->render(array());
	}
	
	
	public function lteie8()
	{
		$content = $this->getView(DOCVIEW.'template/lte-ie8.php', array());
		echo $content;
	}
}