<?php
/* @var $this MatrizController */
/* @var $model Matriz */

$this->breadcrumbs=array(
	'Matriz'=>array('index'),
	$model->id_matriz,
);

$this->menu=array(
	array('label'=>'Listar Matriz', 'url'=>array('index')),
	array('label'=>'Crear Matriz', 'url'=>array('create')),
	array('label'=>'Actualizar Matriz', 'url'=>array('update', 'id'=>$model->id_matriz)),
	array('label'=>'Eliminar Matriz', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_matriz),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Administrar Matriz', 'url'=>array('admin')),
);
?>

<h1>Matriz #<?php echo $model->id_matriz; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_matriz',
		'nombre_matriz',
		'descripcion_matriz',
	),
)); ?>
