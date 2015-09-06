<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usuario), array('view', 'id'=>$data->id_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($data->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->sexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>

	<b><?php //echo CHtml::encode($data->getAttributeLabel('contrasena')); ?><!--:--></b>
	<?php //echo CHtml::encode($data->contrasena); ?>
	<br />

	

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->id_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rol')); ?>:</b>
	<?php echo CHtml::encode($data->id_rol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('letra_id')); ?>:</b>
	<?php echo CHtml::encode($data->letra_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_id')); ?>:</b>
	<?php echo CHtml::encode($data->num_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('digito_id')); ?>:</b>
	<?php echo CHtml::encode($data->digito_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono1')); ?>:</b>
	<?php echo CHtml::encode($data->telefono1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono2')); ?>:</b>
	<?php echo CHtml::encode($data->telefono2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	*/ ?>

</div>
