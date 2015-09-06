<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	$model->id_pregunta=>array('view','id'=>$model->id_pregunta),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Pregunta', 'url'=>array('index')),
	array('label'=>'Crear Pregunta', 'url'=>array('create')),
	array('label'=>'Ver Pregunta', 'url'=>array('view', 'id'=>$model->id_pregunta)),
	array('label'=>'Administrar Pregunta', 'url'=>array('admin')),
);
?>

<h1>Actualizar Pregunta <?php echo $model->id_pregunta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'b'=>$b)); ?>
