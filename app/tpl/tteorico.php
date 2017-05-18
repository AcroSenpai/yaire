<h1><?= $this->page; ?></h1>
<a href="/yaire/teorico/crear/">Crear</a>
<h1>DGT</h1>
<table>
<tr>
	<th>Nombre</th>
</tr>
<?php 
	foreach ($this->dataTable as $test) {
		if($test['categoria']==1)
		{
		?><tr>
			<td><a href="/yaire/teorico/test/id/<?=$test['id_test']?>"><?=$test['Nombre']?></a></td>
		</tr>
		<?php
		}
	}
?>

</table>
<h1>Examen</h1>
<table>
<tr>
	<th>Nombre</th>
</tr>
<?php 
	foreach ($this->dataTable as $test) {
		if($test['categoria']==2)
		{
		?><tr>
			<td><a href="/yaire/teorico/test/id/<?=$test['id_test']?>"><?=$test['Nombre']?></a></td>
		</tr>
		<?php
		}
	}
?>

</table>
<h1>Tema</h1>
<table>
<tr>
	<th>Nombre</th>
</tr>
<?php 
	foreach ($this->dataTable as $test) {
		if($test['categoria']==3)
		{
		?><tr>
			<td><a href="/yaire/teorico/test/id/<?=$test['id_test']?>"><?=$test['Nombre']?></a></td>
		</tr>
		<?php
		}
	}
?>

</table>
<h1>Caliente</h1>
<table>
<tr>
	<th>Nombre</th>
</tr>
<?php 
	foreach ($this->dataTable as $test) {
		if($test['categoria']==4)
		{
		?><tr>
			<td><a href="/yaire/teorico/test/id/<?=$test['id_test']?>"><?=$test['Nombre']?></a></td>
		</tr>
		<?php
		}
	}
?>

</table>