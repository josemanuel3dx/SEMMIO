<?php
/* @var $this MetricaController */
/* @var $model Metrica */

$this->breadcrumbs=array(
	'Métricas'=>array('index'),
	$model->id_metrica=>array('view','id'=>$model->id_metrica),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Métricas', 'url'=>array('index')),
	array('label'=>'Crear Métricas', 'url'=>array('create')),
	array('label'=>'Ver Métricas', 'url'=>array('view', 'id'=>$model->id_metrica)),
	array('label'=>'Administrar Métricas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Métrica <?php echo $model->id_metrica; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>