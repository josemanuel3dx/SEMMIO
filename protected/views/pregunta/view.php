<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	$model->id_pregunta,
);

$this->menu=array(
	array('label'=>'Listar Pregunta', 'url'=>array('index')),
	array('label'=>'Crear Pregunta', 'url'=>array('create')),
	array('label'=>'Actualizar Pregunta', 'url'=>array('update', 'id'=>$model->id_pregunta)),
	array('label'=>'Eliminar Pregunta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pregunta),'confirm'=>'Estás seguro que deseas eliminar éste item?')),
	array('label'=>'Administrar Pregunta', 'url'=>array('admin')),
);
?>

<h1>Pregunta #<?php echo $model->id_pregunta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pregunta',
		'descripcion_pregunta',
		'id_caracteristica',
		'id_aspecto',
		'estatus_pregunta',
	),
)); ?>
