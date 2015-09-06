<?php
/* @var $this MatrizController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Matriz',
);

$this->menu=array(
	array('label'=>'Crear Matriz', 'url'=>array('create')),
	array('label'=>'Administrar Matriz', 'url'=>array('admin')),
);
?>

<h1>Matriz</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
