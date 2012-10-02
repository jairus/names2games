<div class='center pad20'>
	<script>
		function submitRating(){
			data = jQuery("#rating").serialize();
			jQuery('#message').hide();
			$.ajax({
				type: 'POST',
				url: "<?php echo n2gUrl("?c=ajax&a=insertrating")?>",
				data: data,
				success: function(html){
					jQuery('#message').html(html);
					jQuery('#message').fadeIn(200);
					jQuery('#rating')[0].reset();
				}
			});
		}
	</script>
	<form id='rating' >
		<table class='p100'>
			<tr>
				<td class='center pad10 hidden' id='message'></td>
			</tr>
			<tr>
				<td class='center pad10'>Term: <input class='rate' type="text" name='term' /></td>
			</tr>
			<tr>
				<td class='center pad10'>
				1 <input type='radio' name='rating' value='1' checked="checked">&nbsp;&nbsp;&nbsp;
				2 <input type='radio' name='rating' value='2'>&nbsp;&nbsp;&nbsp;
				3 <input type='radio' name='rating' value='3'>&nbsp;&nbsp;&nbsp;
				4 <input type='radio' name='rating' value='4'>&nbsp;&nbsp;&nbsp;
				5 <input type='radio' name='rating' value='5'>&nbsp;&nbsp;&nbsp;
				6 <input type='radio' name='rating' value='6'>&nbsp;&nbsp;&nbsp;
				7 <input type='radio' name='rating' value='7'>&nbsp;&nbsp;&nbsp;
				8 <input type='radio' name='rating' value='8'>&nbsp;&nbsp;&nbsp;
				9 <input type='radio' name='rating' value='9'>&nbsp;&nbsp;&nbsp;
				10 <input type='radio' name='rating' value='10'>&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td class='center pad10'><input type="button" value='Submit' onclick='submitRating()' /></td>
			</tr>
		</table>
		
	</form>
</div>