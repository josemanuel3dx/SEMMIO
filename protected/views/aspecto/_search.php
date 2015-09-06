<?php
/* @var $this AspectoController */
/* @var $model Aspecto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_aspecto'); ?>
		<?php echo $form->textField($model,'id_aspecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_aspecto'); ?>
		<?php echo $form->textField($model,'nombre_aspecto',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'definicion_aspecto'); ?>
		<?php echo $form->textArea($model,'definicion_aspecto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_matriz'); ?>
		<?php echo $form->textField($model,'id_matriz'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_aspecto'); ?>
		<?php echo $form->textField($model,'meta_aspecto',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->