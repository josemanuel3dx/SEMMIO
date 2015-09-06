<?php
/* @var $this NivelController */
/* @var $model Nivel */

$this->breadcrumbs=array(
	'Nivel'=>array('index'),
	$model->id_nivel,
);

$this->menu=array(
	array('label'=>'Listar Nivel', 'url'=>array('index')),
	array('label'=>'Crear Nivel', 'url'=>array('create')),
	array('label'=>'Actualizar Nivel', 'url'=>array('update', 'id'=>$model->id_nivel)),
	array('label'=>'Eliminar Nivel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_nivel),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Administrar Nivel', 'url'=>array('admin')),
);
?>

<h1>Nivel #<?php echo $model->id_nivel; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_nivel',
		'nombre_nivel',
		'descripcion_nivel',
	),
)); ?>
