<?php
/* @var $this CaracteristicaController */
/* @var $model Caracteristica */

$this->breadcrumbs=array(
	'Caracteristicas'=>array('index'),
	$model->id_caracteristica,
);

$this->menu=array(
	array('label'=>'Listar Caracteristica', 'url'=>array('index')),
	array('label'=>'Crear Caracteristica', 'url'=>array('create')),
	array('label'=>'Actualizar Caracteristica', 'url'=>array('update', 'id'=>$model->id_caracteristica)),
	array('label'=>'Eliminar Caracteristica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_caracteristica),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Administrar Caracteristica', 'url'=>array('admin')),
);
?>

<h1>Caracteristica #<?php echo $model->id_caracteristica; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_caracteristica',
		'codigo',
		'nombre_caracteristica',
		'definicion_caracteristica',
		'id_nivel',
		'id_aspecto',
		'id_matriz',
	),
)); ?>
