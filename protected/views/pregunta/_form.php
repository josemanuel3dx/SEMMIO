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

echo $form->errorSummary(array($model,$b));

?>
	<style type="text/css">
		#Pregunta_id_caracteristica {
			width: 750px;
			word-wrap:break-word;
		}
	</style>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_pregunta'); ?>
		<?php echo $form->textField($model,'descripcion_pregunta',array('size'=>60,'maxlength'=>600)); ?>
		<?php echo $form->error($model,'descripcion_pregunta'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'id_aspecto'); ?>
			<?php echo $form->dropDownList($model, 'id_aspecto', 
				CHtml::listData(Aspecto::model()->findAll(), 'id_aspecto', 'nombre_aspecto')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_caracteristica'); ?>
			<?php echo $form->dropDownList($model, 'id_caracteristica', CHtml::listData(
                    Caracteristica::model()->findAll(), 'id_caracteristica', 'nombre_caracteristica'), array('multiple'=>true )); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($b,'id_metrica'); ?>
			<?php echo $form->dropDownList($b, 'id_metrica', CHtml::listData(
                Metrica::model()->findAll(), 'id_metrica', 'nombre_metrica','valor'), array('multiple'=>true )); ?>
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
