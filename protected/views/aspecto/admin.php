<?php
/* @var $this AspectoController */
/* @var $model Aspecto */

$this->breadcrumbs=array(
	'Aspectos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Aspecto', 'url'=>array('index')),
	array('label'=>'Crear Aspecto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#aspecto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Aspectos</h1>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'aspecto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_aspecto',
		'nombre_aspecto',
		'definicion_aspecto',
		'id_matriz',
		'meta_aspecto',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
