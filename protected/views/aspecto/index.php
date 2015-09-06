<?php
/* @var $this AspectoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aspectos',
);

$this->menu=array(
	array('label'=>'Crear Aspecto', 'url'=>array('create')),
	array('label'=>'Adminstrar Aspecto', 'url'=>array('admin')),
);
?>

<h1>Aspectos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
