<?php
/* @var $this MatrizController */
/* @var $model Matriz */

$this->breadcrumbs=array(
	'Matriz'=>array('index'),
	$model->id_matriz=>array('view','id'=>$model->id_matriz),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Matriz', 'url'=>array('index')),
	array('label'=>'Crear Matriz', 'url'=>array('create')),
	array('label'=>'Ver Matriz', 'url'=>array('view', 'id'=>$model->id_matriz)),
	array('label'=>'Administrar Matriz', 'url'=>array('admin')),
);
?>

<h1>Actualizar Matriz <?php echo $model->id_matriz; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
