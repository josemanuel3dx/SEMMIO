<?php
/* @var $this MetricaController */
/* @var $data Metrica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_metrica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_metrica), array('view', 'id'=>$data->id_metrica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_metrica')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_metrica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />


</div>