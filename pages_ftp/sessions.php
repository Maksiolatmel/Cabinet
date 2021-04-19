<p class="header">Проведенні та поточні сесії</p>
		<table class="table">
			<thead>
				<tr>
					<th width="55%">Сесія</th>
					<th width="25%">Дата</th>
					<th>Питань</th>
					<th style="display:none"></th>
				</tr>
			</thead>
			<tbody>
		
<?php
		//$dir    = 'FTP';
		$result = glob('../FTP/*.xml');
		array_multisort(array_map('filemtime', $result), SORT_NUMERIC, SORT_DESC, $result);
		//print_r($result);
		foreach ( $result as $name ) {
 			if (file_exists($name)) {
				$xml = simplexml_load_file($name);
				//print_r($xml);
				?>
			<tr class="hovered sess">
				<td class="name"><?php echo $xml->Name; ?></td>
				<td class="date"><?php echo $xml->Date; ?></td>
				<td class="vopr"><?php echo $xml->Vopr; ?></td>
				<td class="dir" style="display:none"><?php echo $dir."/".$xml->Dir; ?></td>
			</tr>	
				
			<?php
				//echo $xml->Name."  ".$xml->Date."<br />";
			}
  		}

?>	
		</table>

<!--
	В functions.php темы добавить:

	wp_enqueue_script( 'theme_slug-ftp-js', '/pages_ftp/ftp.js', array(), false, true );
	wp_enqueue_style( 'ftp-css', '/pages_ftp/ftp.css', array(), null );

	wp_enqueue_script('bootstrap-js', '/pages_ftp/bootstrap.min.js');
	wp_enqueue_style('bootstrap-css', '/pages_ftp/bootstrap.min.css');
-->