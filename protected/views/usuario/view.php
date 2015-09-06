<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario,
);

$this->menu=array(
	array('label'=>'Listar Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>'Eliminar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
);
?>

<h1>Usuario #<?php echo $model->id_usuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'nombre',
		'sexo',
		'nacionalidad',
		'usuario',
		'contrasena',
		'apellido',
		'id_empresa',
		'id_rol',
		'letra_id',
		'num_id',
		'digito_id',
		'telefono1',
		'telefono2',
		'email',
	),
)); ?>
