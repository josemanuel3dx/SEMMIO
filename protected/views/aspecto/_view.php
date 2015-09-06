<?php
/* @var $this AspectoController */
/* @var $data Aspecto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_aspecto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_aspecto), array('view', 'id'=>$data->id_aspecto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_aspecto')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_aspecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('definicion_aspecto')); ?>:</b>
	<?php echo CHtml::encode($data->definicion_aspecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_matriz')); ?>:</b>
	<?php //echo CHtml::encode($data->id_matriz); ?>
	<?php $model=Matriz::model()->findByPk($data->id_matriz); echo $model->nombre_matriz; ?>
	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_aspecto')); ?>:</b>
	<?php echo CHtml::encode($data->meta_aspecto); ?>
	<br />


</div>
