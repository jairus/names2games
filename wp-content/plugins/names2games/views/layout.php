<link rel="stylesheet" href="<?php echo n2gBaseUrl(); ?>js/development-bundle/themes/base/jquery.ui.all.css">
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/jquery-1.8.0.js"></script>
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.core.js"></script>
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.position.js"></script>
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.autocomplete.js"></script>

<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.mouse.js"></script>
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.draggable.js"></script>
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.position.js"></script>
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.resizable.js"></script>
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.dialog.js"></script>
<script src="<?php echo n2gBaseUrl(); ?>js/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script>
jQuery(function(){
	jQuery(".date").datepicker({ 
		onSelect: function(date) {
			},
		});
	$(".rate").autocomplete({
		//define callback to format results
		source: function(req, add){
			
			//pass request to server
			$.getJSON("<?php echo n2gUrl("?c=ajax&a=getratings")?>", req, function(data) {
				//create array for response objects
				var suggestions = [];
				//process response
				$.each(data, function(i, val){								
					suggestions.push(val.name);
				});
				//pass array to callback
				add(suggestions);
			});
		},
		//define select handler
		select: function(e, ui) {
		},
	
	});

});
</script>
<style>
#main{
	width:100%;
}
.center{
	text-align:center;
}
.left{
	text-align:left;
}
.right{
	text-align:right;
}
.top{
	vertical-align:top;
}
.middle{
	vertical-align:middle;
}
.bottom{
	vertical-align:bottom;
}
.pad10{
	padding:10px;
}
.pad20{
	padding:20px;
}
.p100{
	width:100%;
}
.p33{
	width:33%;
}
.hidden{
	display:none;
}
.success{
	color:#009900;
}
.error{
	color:#FF0000;
}
.bold{
	font-weight:bold;	
}
.search{
	height:50px;
	width:80px;
}
.newsearch{
	height:50px;
	width:120px;
}
div.n2gcontainer table, div.n2gcontainer table td, div.n2gcontainer table th{
	border: 0px;
}
div.n2gcontainer .border{
	border: 1px solid gray;
}
</style>
<div class='n2gcontainer'>
	<table id='main'>
		<tr>
			<td class='center top'>
				<a href='<?php echo n2gUrl("?c=rate"); ?>'>Rate</a>
			</td>
			<td class='center top'>
				<a href='<?php echo n2gUrl("?c=search"); ?>'>Search</a>
			</td>
		</tr>
	</table>
</div>
<div class='n2gcontainer'>
<?php echo $content; ?>
</div>