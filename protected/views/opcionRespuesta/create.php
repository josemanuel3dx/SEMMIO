<?php
/* @var $this OpcionRespuestaController */
/* @var $model OpcionRespuesta */

$this->breadcrumbs=array(
	'Opcion Respuestas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OpcionRespuesta', 'url'=>array('index')),
	array('label'=>'Manage OpcionRespuesta', 'url'=>array('admin')),
);
?>

<h1>Create OpcionRespuesta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>