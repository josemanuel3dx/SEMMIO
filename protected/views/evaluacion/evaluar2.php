<?php
/* @var $this MatrizController */
/* @var $model Matriz */

$this->breadcrumbs=array(
	'Evaluar'=>array('index'),
	'Resultados',
);

$this->menu=array(
	//array('label'=>'Crear Evaluación', 'url'=>array('evaluacion/create')),
	//array('label'=>'Administrar Evaluación', 'url'=>array('evaluacion/admin')),
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

	    $('#empresa_evaluacion').trigger('change');	 
	});

</script>

<table border="1">

	<tr>
		<td>Empresa:</td>
		
		<td>
			<?php if( Yii::app()->user->checkAccess('admin')){ ?>
			
				<select name="empresa_evaluacion" id="empresa_evaluacion">
				
					<?php foreach($mode1 as $data): ?>
		    			<option value="<?php echo $data->id_empresa?>"><?php echo $data->nombre_empresa?></option>
					<?php endforeach; ?>

	 			</select>
 			
 			<?php }
 			
 			if(Yii::app()->user->checkAccess('empresa')){ ?>
 			
	 			<?php 
					$usu=Usuario::model()->find('id_usuario='.Yii::app()->user->id);
					$empre = Empresa::model()->find('id_empresa='.$usu->id_empresa);
				?>
				<select name="empresa_evaluacion" id="empresa_evaluacion">
	 			
	    			<option value="<?php echo $empre->id_empresa?>"><?php echo $empre->nombre_empresa?></option>
				
				</select>

 			<?php }?>

 		</td>

 	</tr>	

</table>
 
 <div id="mostrar_evaluaciones"></div>
