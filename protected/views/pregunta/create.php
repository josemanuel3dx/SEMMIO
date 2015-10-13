<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Pregunta', 'url'=>array('index')),
	array('label'=>'Administrar Pregunta', 'url'=>array('admin')),
);
?>

<h1>Crear Pregunta</h1>

<?php 
	
	if (isset($id_matriz))
		$this->renderPartial('_form', array('model'=>$model,'b'=>$b,'id_matriz'=>$id_matriz)); 
	else
		$this->renderPartial('_form', array('model'=>$model,'b'=>$b));

?>
