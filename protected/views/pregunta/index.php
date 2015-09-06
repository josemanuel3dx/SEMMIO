<?php
/* @var $this PreguntaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Preguntas',
);

$this->menu=array(
	array('label'=>'Crear Pregunta', 'url'=>array('create')),
	array('label'=>'Administrar Pregunta', 'url'=>array('admin')),
);
?>

<h1>Preguntas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
