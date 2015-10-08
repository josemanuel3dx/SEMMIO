<?php

class PreguntaController extends Controller
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
				'actions'=>array('index','view', 'mostrar'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pregunta;
		$b = new Metrica;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pregunta'] , $_POST['Metrica']))
		{
			/*var_dump("<pre>".print_r($_POST['Pregunta'],TRUE)."</pre>");
			exit();	*/
			$model->attributes=$_POST['Pregunta'];
			$b->attributes=$_POST['Metrica'];
			
							
			$model->descripcion_pregunta = $model->descripcion_pregunta;
			$arr2 = implode(",",$model->attributes['id_caracteristica']);
			$model->id_caracteristica=$arr2;
			
			$model->id_aspecto = $model->id_aspecto;
			$model->estatus_pregunta = $model->estatus_pregunta;
			$model->save();
		
			$arr = implode("," , $b->attributes['id_metrica']);
			$porciones = explode(",", $arr);
			foreach($porciones as $met){
					$c= new OpcionRespuesta;
					$c->isNewRecord = true;
				error_log('Metrica_id: '.$met);
					$c->id_metrica =$met;
					$c->id_pregunta = $model->id_pregunta;
					
					$c->save();
					
				}
				$this->redirect(array('view','id'=>$model->id_pregunta));
		}

		/*else
		{
			var_dump("<pre>".print_r($model,TRUE)."</pre>");
			exit();
		}*/

		$this->render('create',array(
			'model'=>$model,
			'b'=>$b,
		));
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
			$model=new Pregunta;
		$b = new Metrica;
	$c= new OpcionRespuesta;
		//$model=$this->loadModel($id);
		//$b=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model,$b,$c);
		$model=$this->loadModel($id);
		$c = OpcionRespuesta::model()->findByAttributes(array('id_pregunta'=>$model->id_pregunta));
		//$b=$this->loadModel($id);
		if(isset($_POST['Pregunta'],$_POST['Metrica'],$_POST['OpcionRespuesta']))
		{
			$model->attributes=$_POST['Pregunta'];
			$b->attributes=$_POST['Metrica'];
			$c->attributes=$_POST['OpcionRespuesta'];

			$c->id_pregunta=$model->id_pregunta;
			$b->setIsNewRecord(false);
			
			if($model->save() && $b->update() && $c->update)
				$this->redirect(array('view','id'=>$model->id_pregunta));
		}

		$this->render('update',array(
			'model'=>$model,
			'b'=>$b,
			'c'=>$c,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pregunta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pregunta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pregunta']))
			$model->attributes=$_GET['Pregunta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pregunta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pregunta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pregunta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pregunta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionMostrar(){

		$resultado = $_GET['id_aspecto'];
		$aspecto = Aspecto::model()->findByPk($resultado);
		$caracteristica = Caracteristica::model()->findAllByAttributes(array('id_aspecto'=>$aspecto->id_aspecto));
		
		if(count($caracteristica)!=0){
			$div = '<label for="Pregunta_id_aspecto" class="required">
						Característica 
						<span class="required">*</span>
					</label>';
			$div .= '<select multiple>';

			foreach($caracteristica as $data):
				$div .=' <option value="'.$data->id_caracteristica.'">'.$data->nombre_caracteristica.'</option>'; 
			endforeach;

			$div .= '</select>';

		}else{

			$div='<br /><br /><center><p><b>**Aspecto sin Caracteristicas**</b></p></center>';
		}
	
		$return['message'] = $div;
		echo json_encode($return);
	}


}
