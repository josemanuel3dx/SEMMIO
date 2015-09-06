<?php
/* @var $this AspectoController */
/* @var $model Aspecto */

$this->breadcrumbs=array(
	'Aspectos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Aspecto', 'url'=>array('index')),
	array('label'=>'Administrar Aspecto', 'url'=>array('admin')),
);
?>

<h1>Crear Aspecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
