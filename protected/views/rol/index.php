<?php
/* @var $this RolController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rol',
);

$this->menu=array(
	array('label'=>'Crear Rol', 'url'=>array('create')),
	array('label'=>'Administrar Rol', 'url'=>array('admin')),
);
?>

<h1>Roles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
