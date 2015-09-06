<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->id_empresa=>array('view','id'=>$model->id_empresa),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Empresa', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Ver Empresa', 'url'=>array('view', 'id'=>$model->id_empresa)),
	array('label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>

<h1>Actualizar Empresa <?php echo $model->id_empresa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
