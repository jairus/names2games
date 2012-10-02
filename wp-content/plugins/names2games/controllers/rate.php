<?php
@session_start();
class rate{
	var $rate;
	function __construct(){
		n2gLoadModel("n2g_model");
		$this->n2g = new n2g_model();
	}
	function index(){
		$data = array();
		$data['content'] = n2gLoadView("rate/rate", $data, true);
		n2gLoadView("layout", $data);
	}
}
?>