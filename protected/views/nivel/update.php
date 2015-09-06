<?php
/* @var $this NivelController */
/* @var $model Nivel */

$this->breadcrumbs=array(
	'Nivel'=>array('index'),
	$model->id_nivel=>array('view','id'=>$model->id_nivel),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Nivel', 'url'=>array('index')),
	array('label'=>'Crear Nivel', 'url'=>array('create')),
	array('label'=>'Ver Nivel', 'url'=>array('view', 'id'=>$model->id_nivel)),
	array('label'=>'Administrar Nivel', 'url'=>array('admin')),
);
?>

<h1>Actualizar Nivel <?php echo $model->id_nivel; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
