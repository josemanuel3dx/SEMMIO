<?php

class CuestionarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','ver','mostrar'),
				#'users'=>array('*'),
				'roles'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin'),
				#'users'=>array('@'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				#'users'=>array('admin'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		
		if(isset($_POST['Cuestionario']))
		{
			$model->attributes=$_POST['Cuestionario'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->id_pregunta));
		}

		$this->render('create',array(
			'model'=>$model,
		));
		
	}

	public function actionIndex(){

		$mode1=Matriz::model()->findAll();
		$this->render("index",array("mode1"=>$mode1));
	}
					
	public function actionMostrar(){
	
		$matriz = $_GET['id_matriz'];
		$aspectos = Yii::app()->db->createCommand("SELECT * FROM aspecto WHERE id_matriz=".$matriz)->queryAll();
     
	    if(count($aspectos)!=0){
			 
	            $todas_carac = array();

	            foreach($aspectos as $carac){

					$todas_carac [] = $carac['id_aspecto']; 
				}

				$separado_por_comas = implode(",", $todas_carac);
	             
	            $preguntas = Yii::app()->db->createCommand("SELECT * FROM pregunta WHERE id_aspecto in (".$separado_por_comas.") ORDER BY id_pregunta ASC")->queryAll();
				$cantidad_preguntas = count($preguntas);
	 	
	 	}else{

	 		$cantidad_preguntas=0;
	 	}
	 
	    $div='';
            
		if($cantidad_preguntas!=0 ){

            $todas_preguntas = array();

            foreach($preguntas as $preg){

				$todas_preguntas [] = $preg['id_pregunta']; 
			}

			$separado_por_comas_preg = implode(",", $todas_preguntas);
             
            $posibles_respuestas = Yii::app()->db->createCommand("SELECT * FROM opcion_respuesta WHERE id_pregunta in (".$separado_por_comas_preg.")  ORDER BY id_pregunta ASC")->queryAll();
            
            $todas_respuestas = array();

            foreach($posibles_respuestas as $pr){

				$todas_respuestas [] = $pr['id_respuesta']; 
			}

			$separado_por_comas_re = implode(",", $todas_respuestas);
	 	 	
			$div .= '<table border="1">
			<tr>
			<ol>';

		 	foreach($preguntas as $preguntas_f){ 

				$div .=	'<tr><td>';
				$div .= '<li>'.$preguntas_f['descripcion_pregunta'];
				$div .='<br />';
				$posibles_respuestas = Yii::app()->db->createCommand("SELECT a.id_pregunta id_pregunta, b.nombre_metrica nombre, b.valor ponderacion, b.id_metrica id_metrica
				FROM opcion_respuesta a
				LEFT JOIN metrica b on a.id_metrica = b.id_metrica
				WHERE id_pregunta =".$preguntas_f['id_pregunta']." order by valor DESC ")->queryAll();
				$div.= '<br />';
				
				foreach($posibles_respuestas as $resp){
					$div .= $resp['ponderacion'].') '.$resp['nombre'].'<br />';
				}
					
				$div .='</td></tr><tr><td>&nbsp;</td></tr>';
			}

			$div .='</ol></table>';

	 	}else{

		 	error_log('No hay preguntas');
		 	$div .='<br /><br /><center><p><b>**No hay Preguntas Creadas**</b></p></center>';
		}
	 
	 	$return['message'] = $div;
		echo json_encode($return);
	}
}

