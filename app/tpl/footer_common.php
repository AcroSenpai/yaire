<footer>
	<?= $this->version; ?>
	<?= $this->title; ?>
	<?php if(isset($this->msg)){
		echo $this->msg;
	}?>

</footer>
</body>
</html>