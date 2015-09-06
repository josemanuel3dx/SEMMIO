<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pregunta'); ?>
		<?php echo $form->textField($model,'id_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_pregunta'); ?>
		<?php echo $form->textField($model,'descripcion_pregunta',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_caracteristica'); ?>
		<?php echo $form->textField($model,'id_caracteristica',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_aspecto'); ?>
		<?php echo $form->textField($model,'id_aspecto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estatus_pregunta'); ?>
		<?php echo $form->textField($model,'estatus_pregunta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->