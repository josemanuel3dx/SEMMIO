<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_empresa'); ?>
		<?php echo $form->textField($model,'nombre_empresa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion_empresa'); ?>
		<?php echo $form->textField($model,'direccion_empresa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'direccion_empresa'); ?>
	</div>

	<div class="row">
		<?php echo '<b>Area de Producción</b> <span class="required">*</span>';//$form->labelEx($model,'area_manufactura'); ?>
		<?php echo $form->textField($model,'area_manufactura',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'area_manufactura'); ?>
	</div>
<fieldset>
  <legend>RIF:</legend>
	<div class="row">
		<?php echo $form->labelEx($model,'letra_id'); ?>
		<?php echo $form->textField($model,'letra_id',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'letra_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_id'); ?>
		<?php echo $form->textField($model,'num_id',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'num_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'digito_id'); ?>
		<?php echo $form->textField($model,'digito_id',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'digito_id'); ?>
	</div>
</fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'telefono1'); ?>
		<?php echo $form->textField($model,'telefono1',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'telefono1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono2'); ?>
		<?php echo $form->textField($model,'telefono2',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'telefono2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
