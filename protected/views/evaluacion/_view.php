<?php
/* @var $this EvaluacionController */
/* @var $data Evaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_evaluacion), array('view', 'id'=>$data->id_evaluacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_matriz')); ?>:</b>
	<?php //echo CHtml::encode($data->id_matriz); ?>
	
	<?php $model=Matriz::model()->findByPk($data->id_matriz); echo $model->nombre_matriz; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php //echo CHtml::encode($data->id_empresa); ?>
	<?php $model=Empresa::model()->findByPk($data->id_empresa); echo $model->nombre_empresa; ?>
	
	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_evaluacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_evaluacion')); ?>:</b>
	<?php //echo CHtml::encode($data->estatus_evaluacion); ?>
	
	<?php if($data->estatus_evaluacion==1) echo 'Abierta'; else echo 'Cerrada';?>
	<br />


</div>
