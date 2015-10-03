<?php
/* @var $this AspectoController */
/* @var $model Aspecto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aspecto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_aspecto'); ?>
		<?php echo $form->textField($model,'nombre_aspecto',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'nombre_aspecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'definicion_aspecto'); ?>
		<?php echo $form->textArea($model,'definicion_aspecto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'definicion_aspecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_matriz'); ?>
		<?php //echo $form->textField($model,'id_aspecto'); ?>
		<?php //echo $form->error($model,'id_aspecto'); ?>
		
			<?php echo $form->dropDownList($model, 'id_matriz', CHtml::listData(
                    Matriz::model()->findAll(), 'id_matriz', 'nombre_matriz')); ?>
		
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_aspecto'); ?>
		<?php echo $form->textField($model,'meta_aspecto',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'meta_aspecto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
