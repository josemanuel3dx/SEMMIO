<?php
/* @var $this GlosarioController */
/* @var $model Glosario */

$this->breadcrumbs=array(
	'Términos'=>array('index'),
	$model->id_glosario=>array('view','id'=>$model->id_glosario),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Términos', 'url'=>array('index')),
	array('label'=>'Crear Término', 'url'=>array('create')),
	array('label'=>'Ver Término', 'url'=>array('view', 'id'=>$model->id_glosario)),
	array('label'=>'Administrar Términos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Término <?php echo $model->id_glosario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>