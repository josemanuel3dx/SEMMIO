<?php
/* @var $this CuestionarioController */
/* @var $model Cuestionario */

$this->breadcrumbs=array(
	'Cuestionario'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Cuestionario', 'url'=>array('index')),
	array('label'=>'Editar Cuestionario', 'url'=>array('admin')),
);
?>

<h1>Crear Matriz</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
