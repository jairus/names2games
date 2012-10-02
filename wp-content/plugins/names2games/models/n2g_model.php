<?php
class n2g_model{
	function __construct(){
	}
	function getUserTerms(){
		global $current_user, $wpdb;
		$wpdb->show_errors();
		wp_get_current_user();
		$sql = "select distinct * from `n2g_ratings` where `user_id`= '".$current_user->ID."' order by `term` asc";
		$rows = $wpdb->get_results($sql);
		return $rows;
	}
	function getMatches(){
		global $current_user, $wpdb;
		$wpdb->show_errors();
		wp_get_current_user();
		$terms = $_POST['terms'];
		$ratings = $_POST['ratings'];
		$weights = $_POST['weights'];
		$rows = array();
		$t = count($terms);
		if($t){
			
			$temp = array();
			$sqlext = array();
			$sqlext2 = array();
			foreach($terms as $key=>$value){
				$temp[$value] = array();
				$temp[$value]['rating'] = $ratings[$key];
				$temp[$value]['weight'] = $weights[$key];
			}
			$termsc = $temp;
			
			for($i=0; $i<$t; $i++){
				$sqlext[] = "`n2g_ratings`.`term` = '".mysql_escape_string($terms[$i])."'";
			}
			
			$sql = "select distinct `n2g_ratings`.`user_id` from `n2g_ratings` where `user_id` <> '".$current_user->ID."'
				and 
				`user_id` in (select `ID` from $wpdb->users where `user_status`=0 )
				and 
				(";
				$sql .= implode(" or ", $sqlext);
				$sql .= ")
				order by rand() limit 50";
				
			$userids = $wpdb->get_results($sql);
			
			$t = count($userids);
			if($t){
				for($i=0; $i<$t; $i++){
					$sqlext2[] = "`user_id` = '".mysql_escape_string($userids[$i]->user_id)."'";
				}
				
				
				$sql = "select distinct * from `n2g_ratings` where `user_id` <> '".$current_user->ID."' and 
					(";
					$sql .= implode(" or ", $sqlext);
					$sql .= ") and 
					(";
					$sql .= implode(" or ", $sqlext2);
					$sql .= ")
					order by `user_id` asc";
				//echo $sql;
				$rows = $wpdb->get_results($sql);
				
				$matches = array();
				foreach($userids as $userid){
					$ud = get_userdata( $userid->user_id );
					$temp = array();
					$temp['user_login'] = $ud->user_login;  
					$temp['user_nicename'] = $ud->user_nicename;  
					$temp['match'] = "%";
					$matches[] = $temp;
				}
				
			}
			
			
		}
		
		return $matches;
	}
}
?>