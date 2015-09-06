<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->id_empresa,
);

$this->menu=array(
	array('label'=>'Listar Empresa', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Actualizar Empresa', 'url'=>array('update', 'id'=>$model->id_empresa)),
	array('label'=>'Eliminar Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_empresa),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>

<h1>Empresa #<?php echo $model->id_empresa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_empresa',
		'nombre_empresa',
		'direccion_empresa',
		'area_manufactura',
		'letra_id',
		'num_id',
		'digito_id',
		'telefono1',
		'telefono2',
	),
)); ?>
