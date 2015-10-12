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

<!--<script>
	$(document).ready(function(){
	    $("select[name=empresa_evaluacion]").change(function(){
		   id_matriz = $('select[name=empresa_evaluacion]').val();
		   $.ajax({
			        url: <?php /*echo "'".CController::createUrl('evaluacion/evaluar_mostrar')."'"; */?>,
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
</script>-->

<?php $evaluacion=Evaluacion::model()->findByAttributes(array('id_evaluacion'=>$id)); ?>
<?php $nombre_empresa=Empresa::model()->findByAttributes(array('id_empresa'=>$evaluacion->id_empresa)); ?>
<?php $nombre_matriz=Matriz::model()->findByAttributes(array('id_matriz'=>$evaluacion->id_matriz)); ?>

<div class="form">

	<form action="cuestionario?id_evaluacion=<?php echo $id; ?>" method="post">

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
				<td><b>PÁGINA </b> <?php echo " ". $paginaActual . " de " . $totalPaginas; ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						//Imprimir Errores de Validacion
						foreach(Yii::app()->user->getFlashes() as $key => $message) {
					  		echo '<div class="flash-' . $key . '"><b>'.$key.'</b>: ' . $message . "</div>\n";
					    }  
					?>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<ol>
				<?php //var_dump("<pre>".print_r($preguntas,TRUE)."</pre>"); ?>

				<?php foreach($dataVista as $pregunta) { ?>

					<tr>
						<td> <?php echo '<li>'.$pregunta['descripcion_pregunta']; ?> <br /><br />
				
							<?php

								foreach($pregunta['metricas'] as $value) {
									echo '<input type="radio" name="PregForm['.$pregunta['id_pregunta'].']" value="'.$value['id_metrica'].'">'.$value['ponderacion'].') '.$value['nombre'].'<br />'; 
									if($value['ponderacion'] == 0) 
										echo '<br />';
								}
							?>
					    </td>
					</tr>

				<?php } ?> 
			</ol>

			<tr><td><p><input type="submit" value="Continuar" /></p></td></tr>
			<input type="hidden" name="controlForm" value="true">
	 
	 	</table>

	</form>

</div>

 <div id="mostrar_evaluaciones"></div>
