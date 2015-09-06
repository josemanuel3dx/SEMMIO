<?php
/* @var $this OpcionRespuestaController */
/* @var $model OpcionRespuesta */

$this->breadcrumbs=array(
	'Opcion Respuestas'=>array('index'),
	$model->id_respuesta=>array('view','id'=>$model->id_respuesta),
	'Update',
);

$this->menu=array(
	array('label'=>'List OpcionRespuesta', 'url'=>array('index')),
	array('label'=>'Create OpcionRespuesta', 'url'=>array('create')),
	array('label'=>'View OpcionRespuesta', 'url'=>array('view', 'id'=>$model->id_respuesta)),
	array('label'=>'Manage OpcionRespuesta', 'url'=>array('admin')),
);
?>

<h1>Update OpcionRespuesta <?php echo $model->id_respuesta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>