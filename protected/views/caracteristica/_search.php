<?php
/* @var $this CaracteristicaController */
/* @var $model Caracteristica */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_caracteristica'); ?>
		<?php echo $form->textField($model,'id_caracteristica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_caracteristica'); ?>
		<?php echo $form->textField($model,'nombre_caracteristica',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'definicion_caracteristica'); ?>
		<?php echo $form->textArea($model,'definicion_caracteristica',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_nivel'); ?>
		<?php echo $form->textField($model,'id_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_aspecto'); ?>
		<?php echo $form->textField($model,'id_aspecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_matriz'); ?>
		<?php echo $form->textField($model,'id_matriz'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->