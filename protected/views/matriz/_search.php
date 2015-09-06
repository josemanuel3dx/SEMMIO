<?php
/* @var $this MatrizController */
/* @var $model Matriz */
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
		<?php echo $form->label($model,'nombre_matriz'); ?>
		<?php echo $form->textField($model,'nombre_matriz',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_matriz'); ?>
		<?php echo $form->textArea($model,'descripcion_matriz',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->