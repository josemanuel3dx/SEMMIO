<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />


<!--Menu -->
<link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery2.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/menu2.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.js"></script>
<!--ToolTips -->
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tooltips/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tooltips/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tooltips/jquery-ui.js"></script>
<!--Libreria para graficar -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/grafico/highcharts.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/grafico/modules/data.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/grafico/modules/drilldown.js"></script>



	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php 
if(Yii::app()->user->id==1){ 
//echo 'admin'; 
}else{ 
//echo 'empresa';
}
?>
<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?> <br />  Sistema de Evaluación de Modelo de Madurez para la IO</div>
	</div><!-- header -->

	<!--<div id="mainmenu">-->
		 <div id="menu2">
		<?php $this->widget('zii.widgets.CMenu',array(	
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/')),
				array('label'=>'Empresa', 'url'=>array(''),
				
				'items'=>array(
                                        array('label'=>'Crear Evaluacion', 'url'=>array('/evaluacion/index'),'visible'=>Yii::app()->user->checkAccess('admin')),
                                        array('label'=>'Evaluar', 'url'=>array('/evaluacion/evaluar2'),'visible'=>!Yii::app()->user->isGuest),
                                        
                                        ),
				
				 'visible'=>!Yii::app()->user->isGuest),
				
				
				array('label'=>'Ver Matriz', 'url'=>array('Matriz/ver'), 'visible'=>!Yii::app()->user->isGuest),
				

				array('label'=>'Maestros', 'url'=>array(''),
				
				
				'items'=>array(
                                        array('label'=>'Rol', 'url'=>array('/Rol/index')),
                                        array('label'=>'Usuarios', 'url'=>array('/Usuario/index')),
                                        array('label'=>'Empresa', 'url'=>array('/Empresa/index')),
                                        array('label'=>'Matriz', 'url'=>array('/Matriz/index')),
                                        array('label'=>'Nivel', 'url'=>array('/Nivel/index')),
                                        array('label'=>'Aspecto', 'url'=>array('/Aspecto/index')),
                                        array('label'=>'Caracteristica', 'url'=>array('/Caracteristica/index')),
                                        array('label'=>'Metrica', 'url'=>array('/metrica/index')),
										array('label'=>'Cuestionario', 'url'=>array('/cuestionario/index')),
                                    
                                        ),
				
				
				
				'visible'=>Yii::app()->user->checkAccess('admin')),
			
				
				
				
			//	array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about'),),
				array('label'=>'Contáctenos', 'url'=>array('/site/contact')),
				array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Cerrar Sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by FaCyT.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
