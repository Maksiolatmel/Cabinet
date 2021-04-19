



<!--<p class="header"><?php if(isset($_GET['dir'])) echo $_GET['dir']; ?></p>-->
<div class="container" >
  <div class="row">
    <div class="col-4 col-but">
      <button id="BackToSession" type="button" class="btn btn-primary">Повернутися до Сесій</button>
    </div>
    <div class="col-4 col-but">
      <button id="GoToAll" type="button" class="btn btn-primary">Всі поіменні питтання сесії</button>
    </div>
 	<div class="col-4 col-but">
      <button id="Druk" type="button" class="btn btn-warning">Друкувати</button>
    </div>	
  </div>
</div>
<br>
		
<?php
require "function.php";		
		$name = '../FTP'.$_GET['dir'].'/Session.xml';
		//echo $name;
 			if (file_exists($name)) {
				$xml = simplexml_load_file($name);
				//echo " - Present!";

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
  		<td><?php echo $xml->Name; ?></td>
  	</tr>
</table> 
			<p id="Self" style="display: none;"><?php echo '/pages_ftp/poimen.php?dir='.$_GET[dir]; ?></p>
			<p id="Dir" style="display: none;"><?php echo $_GET['dir']; ?></p>

			<p class="header" >Проголосовані питання сесії </p>
			<p class="header1">"<?php echo $xml->Name; ?>"</p>	
			<p class="header">Параметри сесії</p>
			<table class="table">
			<thead>
				<tr>
					<th width="60%">Назва параметру</th>
					<th style="font-weight: bold;">Параметр</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Дата та час початку проведення</td>
					<td><?php echo $xml->Date; ?></td>
				</tr>
				<tr>
					<td>Загальна кількість питань</td>
					<td><?php echo $xml->Vopr; ?></td>
				</tr>
				<tr>
					<td>Кількість присутніх депутатів</td>
					<td><?php echo $xml->Present; ?></td>
				</tr>
				<tr>
					<td>Загальна кількість депутатів</td>
					<td><?php echo $xml->Total; ?></td>
				</tr>
			</tbody>
			</table>

			<p class="header">Перелік питань, винесених на сесію</p>
			<table class="table">
			<thead>
				<tr>
					<th width="65%">Зміст питання</th>
					<th>Рішення</th>
					<th style="display:none"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				//print_r($xml->Voprosy);
				foreach ( $xml->Voprosy->Vopros as $vopr ) {
				?>
				<tr class="hovered voposy">
					<td style="vertical-align:top;"><?php echo '
					<p class="header_time">'.$vopr->Voted.'</p>
					<p class="header1_Left">'.$vopr->Short.'</p>
					
					<p class="header_justify">'.$vopr->Long.'</p>';?>
					</td>
					<?php echo '<td '.SetStyle($vopr->Result).'>'.$vopr->Result.'</td>'; ?>
					<td style="display:none" class="vopr_file"><?php echo $vopr->ID; ?></td>
				</tr>

				<?php
				}
				?>
			</tbody>
			</table>
    <br><br>
</div>				
		<?php
			} else echo '<p class="header" style="color:red;">Нема голосувань!</p>';


		?>	
<!--<table class="table">
			<thead>
				<tr>
					<th width="60%">Сессія</th>
					<th>Дата проведення</th>
					<th>Кількість питань</th>
					<th style="display:none"></th>
				</tr>
			</thead>
			<tbody>-->

			