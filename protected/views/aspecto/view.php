<?php
/* @var $this AspectoController */
/* @var $model Aspecto */

$this->breadcrumbs=array(
	'Aspectos'=>array('index'),
	$model->id_aspecto,
);

$this->menu=array(
	array('label'=>'Listar Aspecto', 'url'=>array('index')),
	array('label'=>'Crear Aspecto', 'url'=>array('create')),
	array('label'=>'Actualizar Aspecto', 'url'=>array('update', 'id'=>$model->id_aspecto)),
	array('label'=>'Eliminar Aspecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_aspecto),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Administrar Aspecto', 'url'=>array('admin')),
);
?>

<h1>Aspecto #<?php echo $model->id_aspecto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_aspecto',
		'nombre_aspecto',
		'definicion_aspecto',
		'id_matriz',
		'meta_aspecto',
	),
)); ?>
