<?php
@session_start();
class search{
	var $n2g;
	function __construct(){
		n2gLoadModel("n2g_model");
		$this->n2g = new n2g_model();
	}
	function index(){
		$data = array();
		$userterms = $this->n2g->getUserTerms();
		if($_POST['terms']){
			$matches = $this->n2g->getMatches();
		}
		$data['matches'] = $matches;
		$data['terms'] = $userterms;
		$data['content'] = n2gLoadView("search/search", $data, true);
		n2gLoadView("layout", $data);
	}
}
?>