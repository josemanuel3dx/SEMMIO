<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evaluacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_matriz'); ?>
			<?php echo $form->dropDownList($model, 'id_matriz', CHtml::listData(
                    Matriz::model()->findAll(), 'id_matriz', 'nombre_matriz')); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'id_empresa'); ?>
			<?php echo $form->dropDownList($model, 'id_empresa', CHtml::listData(
                    Empresa::model()->findAll(), 'id_empresa', 'nombre_empresa')); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'fecha_evaluacion'); ?>
		<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
'model'=>$model,
'attribute'=>'fecha_evaluacion',
'value'=>$model->fecha_evaluacion,
'language' => 'es',
'htmlOptions' => array('readonly'=>"readonly"),
'options'=>array(
'autoSize'=>true,
'defaultDate'=>$model->fecha_evaluacion,
'dateFormat'=>'yy-mm-dd',
'buttonImage'=>Yii::app()->baseUrl.'/images/calendario.jpg',
'buttonImageOnly'=>true,
'buttonText'=>'Ver',
'selectOtherMonths'=>true,
'showAnim'=>'slide',
'showButtonPanel'=>true,
'showOn'=>'button', 
'showOtherMonths'=>true, 
'changeMonth' => 'true', 
'changeYear' => 'true', 
'minDate'=>'date("Y-m-d")', 
'maxDate'=> "+20Y",
),
)); 
?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion'); ?>
		<?php echo $form->textArea($model,'observacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estatus_evaluacion'); ?>
		<?php $options = array ('1' => 'Abierta', '0' => 'Cerrada'); 
		echo CHtml::dropDownList('estatus_evaluacion', '1', $options,array("disabled"=>"disabled"));?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
