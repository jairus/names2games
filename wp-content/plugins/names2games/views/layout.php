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
});
</script>

<div>
	<?php echo $content; ?>
</div>