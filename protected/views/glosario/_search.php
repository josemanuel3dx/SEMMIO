<?php
/* @var $this GlosarioController */
/* @var $model Glosario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_glosario'); ?>
		<?php echo $form->textField($model,'id_glosario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'termino'); ?>
		<?php echo $form->textField($model,'termino',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'definicion'); ?>
		<?php echo $form->textArea($model,'definicion',array('rows'=>6, 'cols'=>50)); ?>
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