<?php
/* @var $this MatrizController */
/* @var $data Matriz */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_matriz')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_matriz), array('view', 'id'=>$data->id_matriz)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_matriz')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_matriz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_matriz')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_matriz); ?>
	<br />


</div>