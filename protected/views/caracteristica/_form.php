<?php
/* @var $this CaracteristicaController */
/* @var $model Caracteristica */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caracteristica-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_caracteristica'); ?>
		<?php echo $form->textField($model,'nombre_caracteristica',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre_caracteristica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'definicion_caracteristica'); ?>
		<?php echo $form->textArea($model,'definicion_caracteristica',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'definicion_caracteristica'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'id_nivel'); ?>
		<?php //echo $form->textField($model,'id_nivel'); ?>
		<?php //echo $form->error($model,'id_nivel'); ?>
		
			<?php echo $form->dropDownList($model, 'id_nivel', CHtml::listData(
                    Nivel::model()->findAll(), 'id_nivel', 'nombre_nivel')); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'id_matriz'); ?>
		<?php //echo $form->textField($model,'id_matriz'); ?>
		<?php //echo $form->error($model,'id_matriz'); ?>
		
			<?php echo $form->dropDownList($model, 'id_matriz', CHtml::listData(
                    Matriz::model()->findAll(), 'id_matriz', 'nombre_matriz')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_aspecto'); ?>
		<?php //echo $form->textField($model,'id_aspecto'); ?>
		<?php //echo $form->error($model,'id_aspecto'); ?>
		
			<?php echo $form->dropDownList($model, 'id_aspecto', CHtml::listData(
                    Aspecto::model()->findAll(), 'id_aspecto', 'nombre_aspecto')); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
