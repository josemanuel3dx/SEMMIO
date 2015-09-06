<?php
/* @var $this MetricaController */
/* @var $model Metrica */

$this->breadcrumbs=array(
	'Métricas'=>array('index'),
	$model->id_metrica,
);

$this->menu=array(
	array('label'=>'Listar Métrica', 'url'=>array('index')),
	array('label'=>'Crear Métrica', 'url'=>array('create')),
	array('label'=>'Actualizar Métrica', 'url'=>array('update', 'id'=>$model->id_metrica)),
	array('label'=>'Eliminar Métrica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_metrica),'confirm'=>'Estás seguro que deseas eliminar éste elemento?')),
	array('label'=>'Administrar Métrica', 'url'=>array('admin')),
);
?>

<h1>Métrica #<?php echo $model->id_metrica; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_metrica',
		'nombre_metrica',
		'valor',
	),
)); ?>
