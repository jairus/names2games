<div class='center pad20'>
<?php
function n2gSelectWeight(){
	echo "<select name='weights[]'>";
	for($i=1; $i<=10; $i++){
		echo "<option value='".$i."'>".$i."</option>";
	}
	echo "</select>";
}
if($_POST){
	$t = count($matches);
	if($t){
		?>
		<table class='p100'>
			<tr>
				<td class='top'>
					<?php
					echo "<table class='p100' style='border-collapse:collapse;'>";
					echo "<tr>";
					echo "<th class='top left bold p33 pad10'>Username</th>";
					echo "<th class='top left bold p33 pad10'>Match %</th>";
					echo "</tr>";
					for($i=0; $i<$t; $i++){
						echo "<tr>";
						echo "<td class='top left p33 border pad10'><a href='/members/".$matches[$i]['user_login']."'>".$matches[$i]['user_login']."</a></td>";
						echo "<td class='top left p33 border pad10'>".$matches[$i]['match']."</td>";;
						echo "</td>";
					}
					echo "</table>";
					?>
				<td class='top pad20'>
				<td style='width:200px; height:100%'>
					<table class='p100' style='height:100%'>
						<tr>
							<td class='top'><input class='newsearch' type='button' value='New Search' onclick='self.location="<?php echo n2gUrl("?c=search"); ?>"'></td>
						</tr>
						<tr>
							<td class='bottom'><input class='newsearch' type='button' value='New Search' onclick='self.location="<?php echo n2gUrl("?c=search"); ?>"'></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php
	}
	else{
		echo "Found 0 Matches";
	}
}
else{
	global $current_user, $wpdb;
	$wpdb->show_errors();
	wp_get_current_user();
	if($current_user->ID){
		$t = count($terms);
		if($t){
			?>
			<script>
			function n2gSearch(){
				jQuery("#n2gsearch").submit();
			}
			</script>
			<form method='post' id='n2gsearch'>
			<table class='p100'>
				<tr>
					<td class='top'>
						<?php
						echo "<table class='p100' style='border-collapse:collapse;'>";
						echo "<tr>";
						echo "<th class='top left bold p33 pad10'>Term</th>";
						echo "<th class='top left bold p33 pad10'>Rating</th>";
						echo "<th class='top left bold p33 pad10'>Weight</th>";
						echo "</tr>";
						for($i=0; $i<$t; $i++){
							echo "<tr>";
							echo "<td class='top left p33 border pad10'><input type='hidden' name='terms[]' value=\"".htmlentities($terms[$i]->term)."\" >".$terms[$i]->term."</td>";
							echo "<td class='top left p33 border pad10'><input type='hidden' name='ratings[]' value=\"".htmlentities($terms[$i]->rating)."\">".$terms[$i]->rating."</td>";
							echo "<td class='top left p33 border pad10'>";
							n2gSelectWeight();
							echo "</td>";
							echo "</td>";
						}
						echo "</table>";
						?>
					<td class='top pad20'>
					<td style='width:200px; height:100%'>
						<table class='p100' style='height:100%'>
							<tr>
								<td class='top'><input class='search' type='button' value='Search' onclick='n2gSearch()'></td>
							</tr>
							<tr>
								<td class='bottom'><input class='search' type='button' value='Search' onclick='n2gSearch()'></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<?php
		}
		else{
			echo "0 terms found.";
		}
	}
	else{
		echo "<a class='error'>You must be logged in to do a search.</a>";
	}
}
?>
</div>