<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>

<script>

	$(document).ready(function(){
	    $("select[id=Pregunta_id_aspecto]").change(function(){
		   id_aspecto = $('select[id=Pregunta_id_aspecto]').val();
		   $.ajax({
		       	url: <?php echo "'".CController::createUrl('pregunta/mostrar')."'"; ?>,
	           	type: "GET",
		       	data: {'id_aspecto' : $('select[id=Pregunta_id_aspecto]').val()},
		       	dataType: 'json',
		       	success: function(data){
				   $("#Pregunta_id_caracteristica").html(data.message);
		       	},
		       	error: function(data){
				   alert('Error');
			   	},
	       	});
	    });
	    $('#Pregunta_id_aspecto').trigger('change');	
	});
	
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pregunta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
		
)); 

echo $form->errorSummary($model);

?>
	<style type="text/css">
		#Pregunta_id_caracteristica {
			width: 750px;
			word-wrap:break-word;
		}
	</style>


	<?php 
		//Imprimir Errores de Validacion
		$flashes = Yii::app()->user->getFlashes();
		if(!empty($flashes)) {
			echo '<div class="flash-error"><b>Error:</b><br>';
			foreach($flashes  as $key => $message) {
		  		echo " - ".$message ."<br>";
		    }  
		    echo "</div>\n";
		}
	?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_pregunta'); ?>
		<?php echo $form->textField($model,'descripcion_pregunta',array('size'=>60,'maxlength'=>600)); ?>
		<?php echo $form->error($model,'descripcion_pregunta'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'id_aspecto'); ?>
		<?php 
			if (isset($id_matriz)) {

				echo $form->dropDownList($model, 'id_aspecto', 
				CHtml::listData(Aspecto::model()->findAll(array("condition"=>"id_matriz =  $id_matriz")), 'id_aspecto', 'nombre_aspecto')); 
			
				} else {
					
					echo $form->dropDownList($model, 'id_aspecto', 
				CHtml::listData(Aspecto::model()->findAll(), 'id_aspecto', 'nombre_aspecto')); 
			
			}
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_caracteristica'); ?>
			<?php echo $form->dropDownList($model, 'id_caracteristica', CHtml::listData(
                    Caracteristica::model()->findAll(), 'id_caracteristica', 'nombre_caracteristica'), array('multiple'=>true )); ?>
	</div>

	<div class="row">
			<label>Métricas de valor 0</label>
			<?php echo $form->dropDownList($b, 'id_metrica[0]', CHtml::listData(
            Metrica::model()->findAllByAttributes(array('valor'=>0)), 'id_metrica', 'nombre_metrica'),
            array('empty' => '(Seleccione)')); ?>
	</div>

	<div class="row">
			<label>Métricas de valor 1</label>
			<?php echo $form->dropDownList($b, 'id_metrica[1]', CHtml::listData(
            Metrica::model()->findAllByAttributes(array('valor'=>1)), 'id_metrica', 'nombre_metrica'),
            array('empty' => '(Seleccione)')); ?>
	</div>

	<div class="row">
			<label>Métricas de valor 2</label>
			<?php echo $form->dropDownList($b, 'id_metrica[2]', CHtml::listData(
            Metrica::model()->findAllByAttributes(array('valor'=>2)), 'id_metrica', 'nombre_metrica'),
            array('empty' => '(Seleccione)')); ?>
	</div>

	<div class="row">
			<label>Métricas de valor 3</label>
			<?php echo $form->dropDownList($b, 'id_metrica[3]', CHtml::listData(
            Metrica::model()->findAllByAttributes(array('valor'=>3)), 'id_metrica', 'nombre_metrica'),
            array('empty' => '(Seleccione)')); ?>
	</div>

	<div class="row">
			<label>Métricas de valor 4</label>
			<?php echo $form->dropDownList($b, 'id_metrica[4]', CHtml::listData(
            Metrica::model()->findAllByAttributes(array('valor'=>4)), 'id_metrica', 'nombre_metrica'),
            array('empty' => '(Seleccione)')); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'estatus_pregunta'); ?>
		<?php $options = array ('1' => 'Activa', '0' => 'Inactivo'); 
		echo CHtml::dropDownList('estatus_pregunta', '1', $options);?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
