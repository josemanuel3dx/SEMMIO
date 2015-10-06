<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><i><?php /*echo CHtml::encode(Yii::app()->name);*/ ?></i></h1>

<p style="text-align:justify">Sistema de Evaluación del Modelo de Madurez para la IO (SEMMIO), es una aplicación web desarrollada por el departamento de Computación (FACYT-UC) que ayuda a las organizaciones a 
evaluar su situación actual y proporcionar un camino estructurado hacia la madurez. Entre los objetivos del modelo se encuentran: </p>

<ul>
<li>Definir cuáles son las características a medir de una organización para determinar el grado de madurez en el área Tecnológica, Informacional, 
Legal-Organizacional, Político-Social e Implementación. </li>
<li>Identificar las metas. </li>
<li> Identificar los indicadores.</li>
<li>Procesar la información obtenida en el cuestionario. </li>
<li> Realizar reportes sobre la información procesada en el cuestionario.</li> 
</ul>

<center>
<img src="<?php echo Yii::app()->request->baseUrl;?>/images/marco/dimensiones.png" alt="DimIO" height="42%" width="42%"> 
<p> Interrelación entre las dimensiones temática, implantación y servicio</p>
<p> <b>Fuente:</b> Poggi,Eduardo (2010)</p>
</center>
