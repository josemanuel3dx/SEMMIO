<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('index'),
	$model->id_evaluacion,
);

$this->menu=array(
	array('label'=>'Listar Evaluación', 'url'=>array('index')),
	array('label'=>'Crear Evaluación', 'url'=>array('create')),
	array('label'=>'Actualizar Evaluación', 'url'=>array('update', 'id'=>$model->id_evaluacion)),
	array('label'=>'Eliminar Evaluación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_evaluacion),'confirm'=>'Estás seguro que deseas eliminar éste item?')),
	array('label'=>'Administrar Evaluación', 'url'=>array('admin')),
);
?>

<h1>Ver Evaluación #<?php echo $model->id_evaluacion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_matriz',
		'id_empresa',
		'fecha_evaluacion',
		'observacion',
		'estatus_evaluacion',
		'id_evaluacion',
	),
)); ?>
