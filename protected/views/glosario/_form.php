<?php
/* @var $this GlosarioController */
/* @var $model Glosario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'glosario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'termino'); ?>
		<?php echo $form->textField($model,'termino',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'termino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'definicion'); ?>
		<?php echo $form->textArea($model,'definicion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'definicion'); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'id_matriz'); ?>
		<?php echo $form->textField($model,'id_matriz'); ?>
		<?php echo $form->error($model,'id_matriz');*/ ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'id_matriz'); ?>
		<?php echo $form->dropDownList($model, 'id_matriz', CHtml::listData(
            Matriz::model()->findAll(), 'id_matriz', 'nombre_matriz')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->