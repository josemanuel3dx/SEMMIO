<?php
/* @var $this CaracteristicaController */
/* @var $model Caracteristica */

$this->breadcrumbs=array(
	'Caracteristicas'=>array('index'),
	$model->id_caracteristica=>array('view','id'=>$model->id_caracteristica),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Caracteristica', 'url'=>array('index')),
	array('label'=>'Crear Caracteristica', 'url'=>array('create')),
	array('label'=>'Ver Caracteristica', 'url'=>array('view', 'id'=>$model->id_caracteristica)),
	array('label'=>'Administrar Caracteristica', 'url'=>array('admin')),
);
?>

<h1>Actualizar Caracteristica <?php echo $model->id_caracteristica; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
