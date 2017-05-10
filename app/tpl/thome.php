<?php 
	include 'head_common.php';
	?>
<body>

	<h1><?= $this->page; ?></h1>
	<table class="table table-hover">
		<?php for($i=0;$i<count($this->dataTable);$i++){ ?>
			<tr>
			<?php foreach($this->dataTable[$i] as $key=>$value) :?>
				
	        		<td><?= $value; ?></td>
	    	
	    	<?php endforeach; ?>
	    	</tr>
	    <?php } ?>
	</table>
	
<?php 
	include 'footer_common.php';
?>