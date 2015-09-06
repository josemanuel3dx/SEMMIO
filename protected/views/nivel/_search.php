<?php
/* @var $this NivelController */
/* @var $model Nivel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_nivel'); ?>
		<?php echo $form->textField($model,'id_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_nivel'); ?>
		<?php echo $form->textField($model,'nombre_nivel',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_nivel'); ?>
		<?php echo $form->textArea($model,'descripcion_nivel',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->