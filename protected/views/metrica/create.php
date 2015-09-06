<?php
/* @var $this MetricaController */
/* @var $model Metrica */

$this->breadcrumbs=array(
	'Métricas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Métrica', 'url'=>array('index')),
	array('label'=>'Administrar Métrica', 'url'=>array('admin')),
);
?>

<h1>Crear Métrica</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
