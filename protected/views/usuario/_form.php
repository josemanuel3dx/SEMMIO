<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sexo'); ?>
		<?php //echo $form->textField($model,'sexo',array('size'=>1,'maxlength'=>1)); ?>
		<?php //echo $form->error($model,'sexo'); ?>
		
		<?php echo $form->dropDownList($model,'sexo',array('M'=>'Masculino','F'=>'Femenino'), array('options' => array('M'=>array('selected'=>true)))) ?>
		
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nacionalidad'); ?>
		<?php //echo $form->textField($model,'nacionalidad',array('size'=>25,'maxlength'=>25)); ?>
		<?php //echo $form->error($model,'nacionalidad'); ?>
		<?php echo $form->dropDownList($model,'nacionalidad',array('V'=>'Venezolano','E'=>'Extranjero'), array('options' => array('V'=>array('selected'=>true)))) ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>55,'maxlength'=>55)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contrasena'); ?>
		<?php echo $form->passwordField($model,'contrasena',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'contrasena'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'id_empresa'); ?>
		<?php //echo $form->textField($model,'id_empresa'); ?>
		<?php //echo $form->error($model,'id_empresa'); ?>
		
		<?php echo $form->dropDownList($model, 'id_empresa', CHtml::listData(
                    Empresa::model()->findAll(), 'id_empresa', 'nombre_empresa')); ?>
		
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_rol'); ?>
		<?php //echo $form->textField($model,'id_rol'); ?>
		<?php //echo $form->error($model,'id_rol'); ?>
		
			<?php echo $form->dropDownList($model, 'id_rol', CHtml::listData(
                    Rol::model()->findAll(), 'id_rol', 'nombre_rol')); ?>
	</div>
<fieldset>
  <legend>RIF:</legend>
	<div class="row">
		<?php echo $form->labelEx($model,'letra_id'); ?>
		<?php echo $form->textField($model,'letra_id',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'letra_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_id'); ?>
		<?php echo $form->textField($model,'num_id',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'num_id'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'digito_id'); ?>
		<?php echo $form->textField($model,'digito_id',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'digito_id'); ?>
	</div>
</fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'telefono1'); ?>
		<?php echo $form->textField($model,'telefono1',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'telefono1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono2'); ?>
		<?php echo $form->textField($model,'telefono2',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'telefono2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
