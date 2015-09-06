<?php
/* @var $this PreguntaController */
/* @var $data Pregunta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pregunta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pregunta), array('view', 'id'=>$data->id_pregunta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_pregunta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_caracteristica')); ?>:</b>
	<?php echo CHtml::encode($data->id_caracteristica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_aspecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_aspecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->estatus_pregunta); ?>
	<br />


</div>