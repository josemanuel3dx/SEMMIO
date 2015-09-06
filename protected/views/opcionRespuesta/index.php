<?php
/* @var $this OpcionRespuestaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Opcion Respuestas',
);

$this->menu=array(
	array('label'=>'Create OpcionRespuesta', 'url'=>array('create')),
	array('label'=>'Manage OpcionRespuesta', 'url'=>array('admin')),
);
?>

<h1>Opcion Respuestas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
