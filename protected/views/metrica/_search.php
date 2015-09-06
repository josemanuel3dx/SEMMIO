<?php
/* @var $this MetricaController */
/* @var $model Metrica */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_metrica'); ?>
		<?php echo $form->textField($model,'id_metrica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_metrica'); ?>
		<?php echo $form->textField($model,'nombre_metrica',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->