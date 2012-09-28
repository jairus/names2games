<?php
@session_start();
class n2g{
	var $n2g;
	function __construct(){
		n2gLoadModel("n2g_model");
		$this->n2g = new n2g_model();
	}
	function index(){
		$data = array();
		$data['content'] = n2gLoadView("main", $data, true);
		n2gLoadView("layout", $data);
	}
}
?>