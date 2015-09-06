<?php
/* @var $this NivelController */
/* @var $model Nivel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nivel-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_nivel'); ?>
		<?php echo $form->textField($model,'nombre_nivel',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'nombre_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_nivel'); ?>
		<?php echo $form->textArea($model,'descripcion_nivel',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_nivel'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
