<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluación'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Evaluación', 'url'=>array('index')),
	array('label'=>'Administrar Evaluación', 'url'=>array('admin')),
);
?>

<h1>Crear Evaluación</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
