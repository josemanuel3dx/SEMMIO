<?php
/* @var $this MatrizController */
/* @var $model Matriz */

	$this->breadcrumbs=array(
		'Evaluar'=>array('index'),
		'Resultados',
	);

	$this->menu=array(
		//array('label'=>'List Matriz', 'url'=>array('index')),
		//array('label'=>'Manage Matriz', 'url'=>array('admin')),
	);
?>

<script>
	$(document).ready(function(){
	    $("select[name=empresa_evaluacion]").change(function(){
		   id_matriz = $('select[name=empresa_evaluacion]').val();
		   $.ajax({
			        url: <?php echo "'".CController::createUrl('evaluacion/evaluar_mostrar')."'"; ?>,
			       	type: "GET",
			       	data: {'id_empresa' : $('select[name=empresa_evaluacion]').val()},
			       	dataType: 'json',
			       	success: function(data){
					   $("#mostrar_evaluaciones").html(data.message);
			       	},
			       	error: function(data){
					   alert('ERROR');
					},
	        });
	    });
	});
</script>

<?php $evaluacion=Evaluacion::model()->findByAttributes(array('id_evaluacion'=>$id)); ?>
<?php $nombre_empresa=Empresa::model()->findByAttributes(array('id_empresa'=>$evaluacion->id_empresa)); ?>
<?php $nombre_matriz=Matriz::model()->findByAttributes(array('id_matriz'=>$evaluacion->id_matriz)); ?>

<div class="form">

	<form action="procesar_cuestionario" method="post">

		<center><p><b>CUESTIONARIO</b></p></center>

		<table border="1">
			<tr>
				<td><b>Empresa:</b> <?php echo $nombre_empresa->nombre_empresa;?></td>
			</tr>
				
			<tr>
				<td><b> Nro. Evaluación:</b> <?php echo $id; ?></td>
			</tr>
			
			<tr>
				<td><b>Matriz:</b> <?php echo $nombre_matriz->nombre_matriz; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<ol>
				<?php
					asort($preguntas_basa); // added line
					foreach($preguntas_basa as $preguntas_f){ ?>
						<tr>
							<td> <?php echo '<li>'.$preguntas_f['descripcion_pregunta']; ?> <br /><br />
					
								<?php $posibles_respuestas = Yii::app()->db->createCommand("SELECT a.id_pregunta id_pregunta, 
									b.nombre_metrica nombre, b.valor ponderacion, b.id_metrica id_metrica
									FROM opcion_respuesta a
									LEFT JOIN metrica b on a.id_metrica = b.id_metrica
									WHERE id_pregunta =".$preguntas_f['id_pregunta']." order by valor DESC")->queryAll();
									
									foreach($posibles_respuestas as $resp){
									echo '<input type="radio" name="preg_[p_'.$preguntas_f['id_pregunta'].']" value="'.$resp['id_metrica'].'">'.$resp['ponderacion'].') '.$resp['nombre'].'<br />'; if($resp['ponderacion'] == 0) echo '<br />';
									}
								?>
						    </td>
						</tr>
					<?php } ?>
			</ol>

			<tr><td><p><input type="submit" /></p></td></tr>
			<input type="hidden" id="id_evaluacion" name="id_evaluacion" value="<?php echo $id ?>">
	 
	 	</table>

	</form>

</div>

 <div id="mostrar_evaluaciones"></div>
