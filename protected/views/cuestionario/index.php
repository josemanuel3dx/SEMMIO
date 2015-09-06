<?php
/* @var $this MatrizController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cuestionario',
);

$this->menu=array(
	array('label'=>'Crear Pregunta', 'url'=>array('/pregunta/create')),
	//array('label'=>'Editar Pregunta', 'url'=>array('update')),
	array('label'=>'Listar Preguntas','url'=>array('/pregunta/index')),
);
?>

<script>

	$(document).ready(function(){
	    $("select[name=matrix_cues]").change(function(){
		   id_matriz = $('select[name=matrix_cues]').val();
		   $.ajax({
		       	url: <?php echo "'".CController::createUrl('cuestionario/mostrar')."'"; ?>,
	           	type: "GET",
		       	data: {'id_matriz' : $('select[name=matrix_cues]').val()},
		       	dataType: 'json',
		       	success: function(data){
				   $("#mostrar_cuestionario").html(data.message);
		       	},
		       	error: function(data){
				   alert('ERROR');
			   	},
	       	});
	    });
	    $('#matrix_cues').trigger('change');	
	});
	
</script>

<select name="matrix_cues" id="matrix_cues">
	<?php foreach($mode1 as $data): ?>
    	<option value="<?php echo $data->id_matriz?>"><?php echo $data->nombre_matriz?></option>
	<?php endforeach; ?>
</select>

<div id="mostrar_cuestionario"></div>
