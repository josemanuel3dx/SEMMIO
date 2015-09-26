<?php
/* @var $this GlosarioController */
/* @var $data Glosario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_glosario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_glosario), array('view', 'id'=>$data->id_glosario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('termino')); ?>:</b>
	<?php echo CHtml::encode($data->termino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('definicion')); ?>:</b>
	<?php echo CHtml::encode($data->definicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_matriz')); ?>:</b>
	<?php echo CHtml::encode($data->id_matriz); ?>
	<br />


</div>