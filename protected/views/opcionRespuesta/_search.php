<?php
/* @var $this OpcionRespuestaController */
/* @var $model OpcionRespuesta */
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
		<?php echo $form->label($model,'id_metrica'); ?>
		<?php echo $form->textField($model,'id_metrica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_respuesta'); ?>
		<?php echo $form->textField($model,'id_respuesta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->