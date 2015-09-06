<?php
/* @var $this MetricaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Métricas',
);

$this->menu=array(
	array('label'=>'Crear Métrica', 'url'=>array('create')),
	array('label'=>'Administrar Métrica', 'url'=>array('admin')),
);
?>

<h1>Métricas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
