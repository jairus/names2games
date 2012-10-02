<?php
@session_start();
class ajax{
	var $n2g;
	function __construct(){
		n2gLoadModel("n2g_model");
		$this->n2g = new n2g_model();
	}
	function index(){
	}
	function getratings(){
		global $wpdb;
		$term = $_GET['term'];
		$sql = "select distinct `term` from `n2g_ratings` where `term` like '".mysql_escape_string(trim($term))."%' limit 20";
		$rows = $wpdb->get_results($sql);
		$items = array();
		
		foreach($rows as $term){
			$item = array();
			$item['name'] = $term->term;
			$items[] = $item;
		}
		ob_end_clean();
		echo json_encode($items);
		exit();	
	}
	function insertrating(){
		global $current_user, $wpdb;
		$wpdb->show_errors();
		wp_get_current_user();
		$term = trim(strip_tags(mysql_escape_string($_POST['term'])));
		$rating = mysql_escape_string($_POST['rating']);
		if(!$term){
			/*
			$sql = "SHOW COLUMNS from `n2g_ratings` where 1";
			$rows = $wpdb->get_results($sql);
			echo "<pre>";
			print_r($rows);
			echo "</pre>";
			$sql = "select * from `n2g_ratings`";
			$rows = $wpdb->get_results($sql);
			echo "<pre>";
			print_r($rows);
			echo "</pre>";
			*/
			echo "<a class='error'>Please input a term!</a>";
			exit();
		}
		if(!$current_user->ID){
			echo "<a class='error'>You must be logged in to submit a rating!</a>";
			exit();
		}
		$sql = "select * from `n2g_ratings` where 
			`term` = '".$term."' and 
			`user_id` = '".$current_user->ID."'
		";
		$rows = $wpdb->get_results($sql);
		if(count($rows)){
			$sql = "update `n2g_ratings` set
			`term` = '".$term."',
			`rating` = '".$rating."',
			`user_id` = '".$current_user->ID."' where 
			`term` = '".$term."' and 
			`user_id` = '".$current_user->ID."'
			";
		}
		else{
			$sql = "insert into `n2g_ratings` set 
			`term` = '".$term."',
			`rating` = '".$rating."',
			`user_id` = '".$current_user->ID."'
			";
		}
		$wpdb->query($sql);
		//$wpdb->print_error();
		echo "<a class='success'>You have rated <b>$term</b> with <b>$rating</b>.</a>";
		exit();
	}
}
?>