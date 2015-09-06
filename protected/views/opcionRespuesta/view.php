<?php
/* @var $this OpcionRespuestaController */
/* @var $model OpcionRespuesta */

$this->breadcrumbs=array(
	'Opcion Respuestas'=>array('index'),
	$model->id_respuesta,
);

$this->menu=array(
	array('label'=>'List OpcionRespuesta', 'url'=>array('index')),
	array('label'=>'Create OpcionRespuesta', 'url'=>array('create')),
	array('label'=>'Update OpcionRespuesta', 'url'=>array('update', 'id'=>$model->id_respuesta)),
	array('label'=>'Delete OpcionRespuesta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_respuesta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OpcionRespuesta', 'url'=>array('admin')),
);
?>

<h1>View OpcionRespuesta #<?php echo $model->id_respuesta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pregunta',
		'id_metrica',
		'id_respuesta',
	),
)); ?>
