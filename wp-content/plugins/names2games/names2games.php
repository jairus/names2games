<?php
@session_start();
/*
Plugin Name: Names2Games
Plugin URI: 
Description: <strong>IMPORTANT!!!</strong> Names2Games Plugin, Make a page with slug: <strong>n2g</strong>  and content of: <strong>[[Names2Games]]</strong> to view plugin
Version: 1.0
Author: Jairus Bondoc
*/
function n2gUrl($add=""){
	$sn = dirname($_SERVER['SCRIPT_NAME']);
	if(trim($sn)=="/"){
		$sn = "";
	}
	$pluginbaseurl = $sn."/n2g/"; //the page slug to be created
	return $pluginbaseurl.$add;
}
function n2gBaseUrl($add=""){
	$sn = dirname($_SERVER['SCRIPT_NAME']);
	if(trim($sn)=="/"){
		$sn = "";
	}
	$pluginbaseurl = $sn."/wp-content/plugins/names2games/";
	return $pluginbaseurl.$add;
}
function n2gRedirect($url){
	ob_end_clean();
	?>
	<script>
	self.location = "<?php echo $url; ?>";
	</script>
	<?php
	exit();
}

function n2gLoadModel($model){
	include_once(dirname(__FILE__)."/models/".$model.".php");
}
function n2gLoadView($view, $data=array(), $ob=false){
	if(is_array($data)){
		foreach($data as $key=>$value){
			$$key = $value;
		}
	}
	@ob_start();
	include_once(dirname(__FILE__)."/views/".$view.".php");
	$out = ob_get_contents();
	ob_end_clean();
	if($ob){
		return $out;
	}
	else{
		echo $out;
	}
}

function n2gProcess(){
	ob_start();
	$c = $_GET['c'];
	$a = $_GET['a'];
	if($c){
		if(!file_exists(dirname(__FILE__)."/controllers/".$c.".php")){
			echo "Controller '$c' not found!";
			$c = "";
		}
	}
	else{
		$c = 'n2g';
	}
	if($c){
		include_once(dirname(__FILE__)."/controllers/".$c.".php");
		if($a){
			$obj = new $c();
			$obj->$a();
		}
		else{
			$obj = new $c();
			$obj->index();
		}
	}
	$res = ob_get_contents();
	ob_end_clean();
	return $res;
}
function Names2Games($content){
	/*
	//some useful things
	global $current_user;
	$pluginbaseurl = dirname($_SERVER['SCRIPT_NAME'])."/wp-content/plugins/sampleplugin/";
	print_r(get_func_args(),1);
	get_currentuserinfo();
	$nick = "";
	ob_start();
	the_author_nickname();
	$nick = ob_get_contents();
	ob_end_clean();
	$nick = $current_user->user_login;
	if(!$nick){
		$nick = " ";
	}
	*/
	
		
	$matches = array();
	preg_match_all("/\[\[Names2Games:*([^]]*)\]\]/iUs", $content, $matches);
	$toreplace = $matches[0][0];
	$extraargs = $matches[1][0];
	
	$res = n2gProcess();
	$content = str_replace($toreplace, $res, $content);
	$content = $res;
	return $content;
}
if ( !function_exists('wp_get_current_user') ) {
	function wp_get_current_user() {
		// Insert pluggable.php before calling get_currentuserinfo()
		require (ABSPATH . WPINC . '/pluggable.php');
		global $current_user;
		get_currentuserinfo();
		return $current_user;
	}
}
if($_GET['c']=='ajax'){
	echo n2gProcess();
	exit();
}
else{
	add_filter('the_content', 'Names2Games');
}



function n2g_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', n2gBaseUrl('js/js/jquery-1.8.0.min.js'));
    wp_enqueue_script( 'jquery' );
}    

/*
global $wpdb;
$sql = "SELECT ID FROM $wpdb->posts WHERE post_name = 'n2g'";
$id = $wpdb->get_results($sql);
$id = $id[0]->ID;
//$id = $id[0]->ID;
if($id){
	$post = array(
		'ID' => $id, //Are you updating an existing post?	
		'comment_status' => 'closed', // 'closed' means no comments.
		'ping_status' => 'open', // 'closed' means pingbacks or trackbacks turned off
		'post_content' => 'hello', //The full text of the post.
		'post_name' => 'n2g', // The name (slug) for your post
		'post_status' => 'publish',
		'post_title' => 'Names2Games',
		'post_type' => 'page'
	); 
	@wp_update_post( $post );
}
else{
	$post = array(
		'comment_status' => 'closed', // 'closed' means no comments.
		'ping_status' => 'open', // 'closed' means pingbacks or trackbacks turned off
		'post_content' => 'hello', //The full text of the post.
		'post_name' => 'n2g', // The name (slug) for your post
		'post_status' => 'publish',
		'post_title' => 'Names2Games',
		'post_type' => 'page'
	); 
	wp_insert_post( $post );
}
*/

/*
//create page
 */

//create databases
add_action('wp_enqueue_scripts', 'n2g_method');



$sql = "
CREATE TABLE IF NOT EXISTS `n2g_ratings` (
`id` int(2) NOT NULL AUTO_INCREMENT,
`term` varchar(255) NOT NULL,
`user_id` int(1) NOT NULL,
`rating` int(1) NOT NULL,
`dateadded` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
global $wpdb;
$wpdb->query($sql);



?>