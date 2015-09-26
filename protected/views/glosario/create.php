<?php
/* @var $this GlosarioController */
/* @var $model Glosario */

$this->breadcrumbs=array(
	'Términos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Términos', 'url'=>array('index')),
	array('label'=>'Administrar Términos', 'url'=>array('admin')),
);
?>

<h1>Crear Término</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>