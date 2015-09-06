<?php
/* @var $this EmpresaController */
/* @var $data Empresa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_empresa), array('view', 'id'=>$data->id_empresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_empresa); ?>
	<br />

	<b><?php echo 'Area de Producción';//CHtml::encode($data->getAttributeLabel('area_manufactura')); ?>:</b>
	<?php echo CHtml::encode($data->area_manufactura); ?>
	<br />

	<b><?php echo 'Rif'; ?>:</b>
	<?php echo CHtml::encode($data->letra_id); ?><?php echo CHtml::encode($data->num_id);?>-<?php echo CHtml::encode($data->digito_id); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('letra_id')); ?><!--:--></b>
	<?php //echo CHtml::encode($data->letra_id); ?>
	

	<b><?php //echo CHtml::encode($data->getAttributeLabel('num_id')); ?><!--:--></b>
	<?php //echo CHtml::encode($data->num_id); ?>
	

	<b><?php //echo CHtml::encode($data->getAttributeLabel('digito_id')); ?><!--:--></b>
	<?php //echo CHtml::encode($data->digito_id); ?>
	

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono1')); ?>:</b>
	<?php echo CHtml::encode($data->telefono1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono2')); ?>:</b>
	<?php echo CHtml::encode($data->telefono2); ?>
	<br />

	*/ ?>

</div>
