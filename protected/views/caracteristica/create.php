<?php
/* @var $this CaracteristicaController */
/* @var $model Caracteristica */

$this->breadcrumbs=array(
	'Caracteristicas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Caracteristica', 'url'=>array('index')),
	array('label'=>'Administrar Caracteristica', 'url'=>array('admin')),
);
?>

<h1>Crear Caracteristica</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
