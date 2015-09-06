<?php
/* @var $this NivelController */
/* @var $model Nivel */

$this->breadcrumbs=array(
	'Nivel'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Nivel', 'url'=>array('index')),
	array('label'=>'Administrar Nivel', 'url'=>array('admin')),
);
?>

<h1>Crear Nivel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
