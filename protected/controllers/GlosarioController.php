<?php

class GlosarioController extends Controller
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
				'actions'=>array('index','view', 'ver', 'mostrar'),
				#'users'=>array('*'),
				'roles'=>array('admin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('ver','mostrar'),
				#'users'=>array('*'),
				'roles'=>array('empresa'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				#'users'=>array('*'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				#'users'=>array('*'),
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
		$model=new Glosario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Glosario']))
		{
			$model->attributes=$_POST['Glosario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_glosario));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Glosario']))
		{
			$model->attributes=$_POST['Glosario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_glosario));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Glosario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Glosario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Glosario']))
			$model->attributes=$_GET['Glosario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Glosario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Glosario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Glosario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='glosario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * Muestra el glosario de términos
	 */
	public function actionVer(){
		$mode1=Matriz::model()->findAll();
		$this->render("ver",array("mode1"=>$mode1));	 
	}
	
	public function actionMostrar(){

		$termino = Glosario::model()->findAllByAttributes(array('id_matriz'=>$_GET['id_matriz']));
		$count = count($termino);
		if($count){
	
			$div = '<br /><br /><center><b>Glosario</b></center><br />';
			$div .= '<table class="normal" style="padding-left:40px"><tr> <th>Término</th><th>Definición</th>';
	
			$div .= '</tr>';
			asort($termino);
			foreach($termino as $data2):
				
				$div .= '<tr><td style="background:beige;padding:10px">'.$data2->termino.'</td><td style="padding:10px;text-align:justify;">'.$data2->definicion.'</td></tr>';
				
			endforeach;
	
			$div .='</table>';

		}else{

			$div='<br /><br /><center><p><b>**Glosario sin términos**</b></p></center>';
		}
	
		$return['message'] = $div;
		echo json_encode($return);
	}
}
