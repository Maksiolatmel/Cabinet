<div class="container">
  <div class="row row-flex">
    <div class="col-4 col-but">
      <button id="BackToSession" type="button" class="btn btn-primary">Повернутися до Сесій</button>
    </div>
    <div class="col-4 col-but">
      <button id="BackToVopr" type="button" class="btn btn-primary">Повернутися до питань сесії</button>
    </div>
    <div class="col-4 col-but">
      <button id="Druk" type="button" class="btn btn-warning">Друк</button>
    </div>	
   </div>
</div>
<br>

<?php
require "function.php";	
	$session = '../FTP'.$_GET['dir'].'/Session.xml';
	if (file_exists($session)) {
				$xml_sess = simplexml_load_file($session);
			}
?>
<div id="DrukArea">
<table class="session">
  	<tr>
  		<td width="40%">Версія ПЗ "SVM_20"</td>
  		<td width="20%">
  			<!--<div class ="TDLogo">
  			<img id="Org" src="Logo.png">
  			</div>-->
  		</td>
  		<td><?php echo $xml_sess->Name; ?></td>
  	</tr>
</table>  

<p id="Self" style="display: none;"><?php echo '/pages_ftp/vopr.php?dir='.$_GET['dir']; ?></p>

<?php
	$name = '../FTP'.$_GET['dir'].'/'.$_GET['file'].'.xml';
	DrawPoimen($name);
 			/*if (file_exists($name)) {
				$xml = simplexml_load_file($name);*/
				?>
    <br><br>
</div>			
			<!--<p class="header" >Поіменні результати голосування питання</p>
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
			<tbody>-->
			<?php

				//foreach ( $xml->Poimen->Deputat as $dep ) {
			?>
				<!--<tr>
					<td><?php echo $dep->Name; ?></td>
					<?php echo '<td '.SetGolos($dep->Golos).'>'.$dep->Golos.'</td>'; ?>
				</tr>-->
			<?php
			//}
			?>	
			<!--</tbody>
			</table>-->

				<?php
			//} else echo '<p class="header" style="color: red;">Питання не голосувалось!</p>';
			?>

		<!--	<p id="get" style="display: none;"><?php echo $_GET[dir]; ?></p>

	<table class="RK">
  	<tr "width=100%">
		<td width="22%">Лічильна комісія:</td>
		<?php
			if (count($xml->RK->Chlen)>0){
				foreach ( $xml->RK->Chlen as $CName ) {
			
			?>
		<td width="26%"><?php echo $CName; ?></td>
		<?php
			}
		}
			?>

		
  	</tr>
  	</table>
</div>-->				