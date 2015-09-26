<?php
/* @var $this GlosarioController */
/* @var $model Glosario */

$this->breadcrumbs=array(
	'Términos'=>array('index'),
	$model->id_glosario,
);

$this->menu=array(
	array('label'=>'Listar Términos', 'url'=>array('index')),
	array('label'=>'Crear Término', 'url'=>array('create')),
	array('label'=>'Actualizar Término', 'url'=>array('update', 'id'=>$model->id_glosario)),
	array('label'=>'Eliminar Término', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_glosario),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Administrar Términos', 'url'=>array('admin')),
);
?>

<h1>Ver Término #<?php echo $model->id_glosario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_glosario',
		'termino',
		'definicion',
		'id_matriz',
	),
)); ?>
