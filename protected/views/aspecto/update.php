<?php
/* @var $this AspectoController */
/* @var $model Aspecto */

$this->breadcrumbs=array(
	'Aspectos'=>array('index'),
	$model->id_aspecto=>array('view','id'=>$model->id_aspecto),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Aspecto', 'url'=>array('index')),
	array('label'=>'Crear Aspecto', 'url'=>array('create')),
	array('label'=>'Ver Aspecto', 'url'=>array('view', 'id'=>$model->id_aspecto)),
	array('label'=>'Administrar Aspecto', 'url'=>array('admin')),
);
?>

<h1>Actualizar Aspecto <?php echo $model->id_aspecto; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
