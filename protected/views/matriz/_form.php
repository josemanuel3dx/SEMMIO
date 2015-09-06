<?php
/* @var $this MatrizController */
/* @var $model Matriz */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matriz-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_matriz'); ?>
		<?php echo $form->textField($model,'nombre_matriz',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre_matriz'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_matriz'); ?>
		<?php echo $form->textArea($model,'descripcion_matriz',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_matriz'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
