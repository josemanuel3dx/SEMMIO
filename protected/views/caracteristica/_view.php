<?php
/* @var $this CaracteristicaController */
/* @var $data Caracteristica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_caracteristica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_caracteristica), array('view', 'id'=>$data->id_caracteristica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_caracteristica')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_caracteristica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('definicion_caracteristica')); ?>:</b>
	<?php echo CHtml::encode($data->definicion_caracteristica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nivel')); ?>:</b>
	<?php //echo CHtml::encode($data->id_nivel); ?>
	<?php
	$model=Nivel::model()->findByPk($data->id_nivel); echo $model->nombre_nivel; 
	?>
	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_aspecto')); ?>:</b>
	<?php //echo CHtml::encode($data->id_aspecto); ?>
	<?php
	$model2=Aspecto::model()->findByPk($data->id_aspecto); echo $model2->nombre_aspecto; 
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_matriz')); ?>:</b>
	<?php //echo CHtml::encode($data->id_matriz); ?>
	<?php
	$model3=Matriz::model()->findByPk($data->id_matriz); echo $model3->nombre_matriz; 
	?>
	<br />


</div>
