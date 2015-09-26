<?php
/* @var $this GlosarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Términos',
);

$this->menu=array(
	array('label'=>'Crear Término', 'url'=>array('create')),
	array('label'=>'Administrar Términos', 'url'=>array('admin')),
);
?>

<h1>Términos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
