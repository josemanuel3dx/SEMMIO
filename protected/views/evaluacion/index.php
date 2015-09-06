<?php
/* @var $this EvaluacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluacion',
);

$this->menu=array(
	array('label'=>'Crear Evaluación', 'url'=>array('create')),
	array('label'=>'Administrar Evaluación', 'url'=>array('admin')),
);
?>

<h1>Evaluaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
