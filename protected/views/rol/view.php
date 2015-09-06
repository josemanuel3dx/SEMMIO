<?php
/* @var $this RolController */
/* @var $model Rol */

$this->breadcrumbs=array(
	'Rol'=>array('index'),
	$model->id_rol,
);

$this->menu=array(
	array('label'=>'Listar Rol', 'url'=>array('index')),
	array('label'=>'Crear Rol', 'url'=>array('create')),
	array('label'=>'Actualizar Rol', 'url'=>array('update', 'id'=>$model->id_rol)),
	array('label'=>'Eliminar Rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rol),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Administrar Rol', 'url'=>array('admin')),
);
?>

<h1>Rol #<?php echo $model->id_rol; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rol',
		'nombre_rol',
		'descripcion_rol',
	),
)); ?>
