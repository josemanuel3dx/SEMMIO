<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('index'),
	$model->id_evaluacion=>array('view','id'=>$model->id_evaluacion),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Evaluación', 'url'=>array('index')),
	array('label'=>'Crear Evaluación', 'url'=>array('create')),
	array('label'=>'Ver Evaluación', 'url'=>array('view', 'id'=>$model->id_evaluacion)),
	array('label'=>'Administrar Evaluación', 'url'=>array('admin')),
);
?>

<h1>Actualizar Evaluación <?php echo $model->id_evaluacion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>