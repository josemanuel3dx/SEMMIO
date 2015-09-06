<?php
/* @var $this NivelController */
/* @var $data Nivel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nivel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_nivel), array('view', 'id'=>$data->id_nivel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_nivel')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_nivel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_nivel')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_nivel); ?>
	<br />


</div>