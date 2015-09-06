<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_matriz'); ?>
		<?php echo $form->textField($model,'id_matriz'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_empresa'); ?>
		<?php echo $form->textField($model,'id_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_evaluacion'); ?>
		<?php echo $form->textField($model,'fecha_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion'); ?>
		<?php echo $form->textArea($model,'observacion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estatus_evaluacion'); ?>
		<?php echo $form->textField($model,'estatus_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion'); ?>
		<?php echo $form->textField($model,'id_evaluacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->