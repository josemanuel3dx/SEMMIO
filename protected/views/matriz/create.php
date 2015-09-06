<?php
/* @var $this MatrizController */
/* @var $model Matriz */

$this->breadcrumbs=array(
	'Matriz'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Matriz', 'url'=>array('index')),
	array('label'=>'Administrar Matriz', 'url'=>array('admin')),
);
?>

<h1>Crear Matriz</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
