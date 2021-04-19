<?php

function SetStyle($Inp){
	$res = 'style="color: black; font-weight: bold;"';
	if($Inp == "РІШЕННЯ НЕ ПРИЙНЯТО") $res = 'style="color: red; font-weight: bold; margin:5px; vertical-align:  middle"';
	else if($Inp == "РІШЕННЯ ПРИЙНЯТО") $res = 'style="color: green; font-weight: bold; margin:5px; vertical-align:  middle"';
	else if($Inp == "НЕ ГОЛОСУВАЛОСЬ") $res = 'style="color: blue; font-weight: bold; margin:5px;; vertical-align:  middle"';
	return $res;
}

function SetGolos($Inp){
	if($Inp == "За") $color = "green";
	else if($Inp == "Утр.") $color = "#C6AB41";
	else if($Inp == "Проти") $color = "red";
	else if($Inp == "Н/Г") $color = "grey";
	else if($Inp == "Відсутній") $color = "fuchsia"; 
	$res = 'style="color: '.$color.'; font-weight: bold; margin:5px; vertical-align:  middle"';
	return $res;
}

function DrawPoimen($FName){

	if (file_exists($FName)) {
				$xml = simplexml_load_file($FName);
				if($xml->Result == 'НЕ ГОЛОСУВАЛОСЬ') return;
?>

<p class="header" >Поіменні результати голосування питання</p>
			<p class="header" ><?php echo $xml->Short; ?></p>
			<p class="header1">"<?php echo $xml->Long; ?>"</p>	
			<p class="header">Результати голосування</p>
			<table class="table">
			<thead>
				<tr>
					<th width="60%">Назва параметру</th>
					<th style="font-weight: bold;">Параметр</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Дата та час голосування</td>
					<td><?php echo $xml->Voted; ?></td>
				</tr>
				<tr>
					<td>Кількість присутніх</td>
					<td><?php echo $xml->Present; ?></td>
				</tr>
				<tr>
					<td>Загальна кількість</td>
					<td><?php echo $xml->Total; ?></td>
				</tr>
				<tr>
					<td>Проголосували "За"</td>
					<td ><span style="font-weight:bold; color:green;"><?php echo $xml->Yes; ?></span></td>
				</tr>
				<tr>
					<td>Утримались</td>
					<td><span style="font-weight:bold; color:#C6AB41;"><?php echo $xml->Absent; ?></span></td>
				</tr>
				<tr>
					<td>Проголосували "Проти"</td>
					<td><span style="font-weight:bold; color:red;"><?php echo $xml->No; ?></span></td>
				</tr>
				<tr>
					<td>Не голосували</td>
					<td><span style="font-weight:bold;"><?php echo $xml->Pass; ?></span></td> 
				</tr>
				<tr>
					<td>Відсутні</td>
					<td><span style="font-weight:bold; color:fuchsia;"><?php echo $xml->Vids; ?></span></td> 
				</tr>
				<tr>
					<td>Результат голосування</td>
					<?php echo '<td '.SetStyle($xml->Result).'>'.$xml->Result.'</td>'; ?>
				</tr>
			</tbody>
			</table>	


			
			<p class="header">Поіменно</p>
			<table class="table">
			<thead>
				<tr>
					<th width="70%">ПІБ депутата</th>
					<th>Голос</th>
				</tr>
			</thead>
			<tbody>
			<?php
				//print_r($xml->Voprosy);
				foreach ( $xml->Poimen->Deputat as $dep ) {
			?>
				<tr>
					<td><?php echo $dep->Name; ?></td>
					<?php echo '<td '.SetGolos($dep->Golos).'>'.$dep->Golos.'</td>'; ?>
				</tr>
			<?php
			}
			?>	
			</tbody>
			</table>

				<?php
			} else echo '<p class="header" style="color: red;">Питання не голосувалось!</p>';

}
?>