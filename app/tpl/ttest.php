<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
		
$(function(){

	$("#corregir").on("click", function(){
		contestadas = 0;
		fcontestadas = 0;
		for(i=1;i<31 && fcontestadas == 0;i++)
		{
			if($("input[name=pregunta_"+i+"]").is(':checked'))
			{
				contestadas ++;
			}
			else
			{
				alert("Falta por contestar la pregunta "+i);
				fcontestadas = 1;
			}
		}
		
		if(contestadas == 30)
		{
			total = 0;
			for(i=1;i<31;i++)
			{
				val = $("input[name=pregunta_"+i+"]").val();
				
				if(val == "c")
				{
					total++;
					$("input[name=pregunta_"+i+"]:checked").siblings("span").css("display","inline").text("                 Acierto!!!!");
				}
				else
				{
					$("input[name=pregunta_"+i+"][value=c]").siblings("span").css("display","inline").text("Correcta");
					$("input[name=pregunta_"+i+"]:checked").siblings("span").css("display","inline").text("                 ErrorT.T");
				}				
			}

			$("#aciertos").text(total);
		}	
	});	
});


</script>
<div>
<h1>Test</h1>
<?php
	$i = 1;

	foreach ($this->dataTable as $test) {
		$random = rand(1,3);
		?>
		<div><?=$i?>. <?=utf8_encode($test['pregunta'])?></div>
		<?php
			switch ($random) {
				case 1:
					?>
						<div><input type="radio" name="pregunta_<?=$i?>" value="c"> a) <?=utf8_encode($test['opcion_c'])?><span style="display: none;" class="respuesta"></span></div>
						<div><input type="radio" name="pregunta_<?=$i?>" value="i1"> b) <?=utf8_encode($test['opcion_i1'])?><span style="display: none;" class="respuesta"></span></div>
						<div><input type="radio" name="pregunta_<?=$i?>" value="i2"> c) <?=utf8_encode($test['opcion_i2'])?><span style="display: none;" class="respuesta"></span></div>
					<?php
					break;
				
				case 2:
					?>
						<div><input type="radio" name="pregunta_<?=$i?>" value="i2"> a) <?=utf8_encode($test['opcion_i2'])?><span style="display: none;" class="respuesta"></span></div>
						<div><input type="radio" name="pregunta_<?=$i?>" value="i1"> b) <?=utf8_encode($test['opcion_i1'])?><span style="display: none;" class="respuesta"></span></div>
						<div><input type="radio" class="correcto" name="pregunta_<?=$i?>" value="c"> c) <?=utf8_encode($test['opcion_c'])?><span style="display: none;" class="respuesta"></span></div>
					<?php
					break;

				case 3:
					?>
						<div><input type="radio" name="pregunta_<?=$i?>" value="i1"> a) <?=utf8_encode($test['opcion_i1'])?><span style="display: none;" class="respuesta"></span></div>
						<div><input type="radio" class="correcto" name="pregunta_<?=$i?>" value="c"> b) <?=utf8_encode($test['opcion_c'])?><span style="display: none;" class="respuesta"></span></div>
						<div><input type="radio" name="pregunta_<?=$i?>" value="i2"> c) <?=utf8_encode($test['opcion_i2'])?><span style="display: none;" class="respuesta"></span></div>
					<?php
					break;
			}
		
		$i++;
	}
?>
<input type="button" id="corregir"  value="Corregir">
<div>Aciertos: <span id="aciertos"></span></div>
</div>