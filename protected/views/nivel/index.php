<?php
/* @var $this NivelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nivel',
);

$this->menu=array(
	array('label'=>'Crear Nivel', 'url'=>array('create')),
	array('label'=>'Administrar Nivel', 'url'=>array('admin')),
);
?>

<h1>Niveles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
