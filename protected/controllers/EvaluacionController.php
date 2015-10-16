<?php

class EvaluacionController extends Controller
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
				'actions'=>array('index','view'),
				#'users'=>array('*'),
				'roles'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','evaluar2','evaluar_mostrar','cuestionario','procesar_cuestionario','reporte_grafico'),
				#'users'=>array('@'),
				'roles'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('evaluar2','cuestionario','procesar_cuestionario','reporte_grafico','evaluar_mostrar'),
				#'users'=>array('@'),
				'roles'=>array('empresa'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','evaluar2','evaluar_mostrar','procesar_cuestionario','reporte_grafico'),
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
		$model=new Evaluacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_evaluacion));
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

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_evaluacion));
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
		$dataProvider=new CActiveDataProvider('Evaluacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Evaluacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Evaluacion']))
			$model->attributes=$_GET['Evaluacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Evaluacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Evaluacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Evaluacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Funcion para mostrar las evaluaciones para una determinada empresa
	 * */
	public function actionEvaluar2(){

			$mode1=Empresa::model()->findAll();
			$this->render("evaluar2",array("mode1"=>$mode1));	 
	}
		 
	public function actionCuestionario(){

		//Cantidad de preguntas q se le van a mostrar al usuario
		$cantPregUser=6;
		//Obtener id de evaluacion
		$id_evaluacion = $_GET['id_evaluacion'];
		//Consultar evaluacion
		$evaluacion=Evaluacion::model()->findByAttributes(array('id_evaluacion'=>$id_evaluacion));
		//Form de evaluacion
		$evalForm = new EvaluacionForm($id_evaluacion,$evaluacion->id_matriz, $cantPregUser);



		//Pregunta Actual y cantidad de preguntas restantes
		$preguntaActual = $evaluacion->pregunta_actual;
		$cantPregRestantes = $evalForm->cantPreg - $evaluacion->pregunta_actual;
		
		//Validamos si se esta llegando al final del cuestionario
		if($cantPregRestantes<$cantPregUser)
			$cantPregUser = $cantPregRestantes;

		//Verificar si tenemos valores por POST para anadirlos
		if(isset($_POST['controlForm'])) {

			if (!isset($_POST['PregForm']) || ((count($_POST['PregForm']) < $cantPregUser) && ($cantPregRestantes >= $cantPregUser)))  {

				Yii::app()->user->setFlash("error", "Usted debe responder todas las preguntas de esta sección para Continuar.");
				$evalForm->generarDataVista($preguntaActual,$cantPregUser);
			
				$this->render("cuestionario",array("id"=>$id_evaluacion, "dataVista" => $evalForm->dataVista, "paginaActual" => 
					$evaluacion->pagina, "totalPaginas" => $evalForm->totalPaginas));
				Yii::app()->end();
			}
			//Insertamos las preg y sus resp en resultado
			foreach($_POST['PregForm'] as $id_preg => $id_resp) {
				 			
				$opcion_resp = Yii::app()->db->createCommand()->insert('resultado',array('id_pregunta'=>$id_preg,'id_respuesta'=>$id_resp,'id_evaluacion'=>$id_evaluacion));			 
			}

			Yii::app()->user->setFlash("success", "Sus respuestas anteriores fueron almacenadas correctamente.");
			//Actualizamos el atributo preguntaActual y pagina actual
			$evaluacion->pregunta_actual+=count($_POST['PregForm']);
			$evaluacion->pagina+=1;
			$opcion_respUpdate = $evaluacion->save();
		}


		//Pregunta Actual y cantidad de preguntas restantes
		$preguntaActual = $evaluacion->pregunta_actual;
		$cantPregRestantes = $evalForm->cantPreg - $evaluacion->pregunta_actual;
		
		//Validamos si se esta llegando al final del cuestionario
		if($cantPregRestantes<$cantPregUser)
			$cantPregUser = $cantPregRestantes;

		//Render nuevas preguntas o finalizar evaluacion
		if($cantPregRestantes>0) {

			//Generar las preguntas a mostrar
			$evalForm->generarDataVista($preguntaActual,$cantPregUser);
			
			$this->render("cuestionario",array("id"=>$id_evaluacion, "dataVista" => $evalForm->dataVista, "paginaActual" => $evaluacion->pagina, "totalPaginas" => $evalForm->totalPaginas));

		}
		elseif ($cantPregRestantes==0) {

			//Al llegar a este punto ya podemos cambiar el atributo estatus_evaluacion a 0
			//Nota: Este codigo es el q estaba al final del metodo procesar_Cuestionario
			$evaluacion->estatus_evaluacion=0;
			$act_evaluacion = $evaluacion->save();
				 
			$mode1='Felicidades has completado el cuestionario.';
			$boton_resultado = '<a href="reporte_grafico?id_evaluacion='.$id_evaluacion.'">Mostrar Resultado</a> ';
			$this->render("procesar",array("mode1"=>$mode1,"id_evaluacion"=>$id_evaluacion,"boton"=>$boton_resultado));
		}
		
	}	 
	

	/**
	 * Funcion buscar las evaluaciones de una empresa
	 * @return una lista de evaluaciones activas y cerradas
	 * */
	public function actionEvaluar_Mostrar(){
	
		$resultado = $_GET['id_empresa'];
		$matrices = Matriz::model()->findAll();
		$band=true;
		$div ='';
	
		foreach($matrices as $matrix){

			$evaluacion = Yii::app()->db->createCommand("SELECT nombre_empresa nombre_empresa, nombre_matriz nombre_matriz, ".
				"IF( a.estatus_evaluacion =1, 'Abierta', 'Cerrada' ) estatus, a.estatus_evaluacion est, ".
				"a.observacion observacion, a.id_evaluacion ID, DATE_FORMAT( a.fecha_evaluacion, '%d/%m/%y' ) fecha_e ".
				"FROM evaluacion a ".
				"LEFT JOIN empresa b ON a.id_empresa = b.id_empresa ".
				"LEFT JOIN matriz c ON a.id_matriz = c.id_matriz ".
				"WHERE a.id_empresa =".$resultado." and a.id_matriz=".$matrix->id_matriz)->queryAll();
	
				$div .= '<center><p><b>Matriz:</b> '.$matrix->nombre_matriz.'</p></center>';

				if(count($evaluacion)!=0){

					$div .= '<table class="normal">
							<tr>
								<th>Nro. Evaluación</th> 
								<th>Empresa</th> 
								<th>Estatus</th> 
								<th>Observación</th> 
								<th>Fecha Evaluación</th>
								<th>Acción</th>
							</tr>';

					foreach($evaluacion as $evalu){

						if($evalu['est']==1) 
							$link = '<a href="cuestionario?id_evaluacion='.$evalu['ID'].'">Evaluar </a>';
						else 
							$link = '<a href="reporte_grafico?id_evaluacion='.$evalu['ID'].'">Reporte </a>';
					
						$div .= '<tr><td>'.$evalu['ID'].' </td> <td>'.$evalu['nombre_empresa'].'</td> <td>'.$evalu['estatus'].'</td> <td>'.$evalu['observacion'].'</td> <td>'.$evalu['fecha_e'].'</td> <td>'.$link.'</td></tr>';
					}

					$div .='</table><br />';

				}else{
					$div .='<center><p><b>**No hay Evaluaciones creada para la empresa**</b></p></center>';
				}
		}

		$return['message'] = $div;
		echo json_encode($return);	 		 
	}	 
		 		
	/**
	* Funcion para mostrar en un grafico los resultados de la evaluacion
	* 
	* */
	public function actionReporte_Grafico(){

		$evaluacion_id = $_GET['id_evaluacion'];
		$evaluacion=Evaluacion::model()->findByAttributes(array('id_evaluacion'=>$evaluacion_id)); 
		$matriz=Matriz::model()->findByAttributes(array('id_matriz'=>$evaluacion->id_matriz)); 
		$niveles=Nivel::model()->findAll();
		$nive =array();


		//Metodo de Evalucion por defecto: Por aspetos
		$metodoEval = 2;
		if($evaluacion->id_matriz==1)
			$metodoEval = 1;


		//Metodo por Celda
		if($metodoEval == 1)
		{
			$resultado_graficar = array();

			$repuestas_y_caracteristica = Yii::app()->db->createCommand("SELECT a.id_pregunta id_pregunta, a.id_respuesta metrica, ".
				"b.id_caracteristica caracteristica, c.valor valor   ".
				"FROM resultado a ".
				"LEFT JOIN pregunta b ON a.id_pregunta = b.id_pregunta ".
				"LEFT JOIN metrica c ON a.id_respuesta = c.id_metrica ".
				"WHERE id_evaluacion = ".$evaluacion_id)->queryAll();
				
			foreach($niveles as $n){

				$respuestas=0;
				$valor_por_nivel = 0;
				$id_pregunta_array = array();

				foreach($repuestas_y_caracteristica as $ryc){
				
					$repuestas_y_caracteristica2 = Yii::app()->db->createCommand(" SELECT a.id_caracteristica id_caracteristica ".
					     "FROM caracteristica a ".
					     "WHERE id_caracteristica in (".$ryc['caracteristica'].") and id_nivel=".$n['id_nivel'])->queryAll();
					
					if(count($repuestas_y_caracteristica2)>=1){
						$respuestas++;
						$id_pregunta_array[]= $ryc['id_pregunta'];
					
						$resultados_por_nivel = Yii::app()->db->createCommand(" SELECT * ".
							"FROM resultado a ".
							"LEFT JOIN metrica b ON a.id_respuesta = b.id_metrica ".
							"WHERE a.id_pregunta=".$ryc['id_pregunta']." and a.id_evaluacion = ".$evaluacion_id)->queryAll();
							
							foreach($resultados_por_nivel as $r)
								$valor_por_nivel = $valor_por_nivel + $r['valor'];
					}
						
				}
						
				unset($id_pregunta_array);
					
				if($respuestas!=0) 
				    $valor_por_columna[]=round(($valor_por_nivel*100)/($respuestas*4),2);
				else 
		            $valor_por_columna[]=0;
			}
			
			$resultado_f = implode(", ",$valor_por_columna); 
			
		    foreach($niveles as $niv)
				$nive[] = $niv['nombre_nivel'];	
			
		    $niveles_f = implode(", ",$nive);

		
		}
		else //Metodo por Aspectos
		{

			$dataEvaluacion = Yii::app()->db->createCommand("SELECT a.id_pregunta id_pregunta, a.id_respuesta id_metricaResp, ".
				"b.id_metrica id_metrica, c.valor valor   ".
				"FROM resultado a ".
				"LEFT JOIN opcion_respuesta b ON a.id_pregunta = b.id_pregunta ".
				"LEFT JOIN metrica c ON b.id_metrica = c.id_metrica ".
				"WHERE id_evaluacion = ".$evaluacion_id)->queryAll();


			$universos = array_fill(0, 6, 0);
			$resultadoEvaluacion = array_fill(0, 6, 0);
			$metricasOrden = array_fill(0, 5, 0);
			$ant = $dataEvaluacion[0]['id_pregunta'];
			

			foreach($dataEvaluacion as $value){

				$act = $value['id_pregunta'];
				if($ant!=$act) {
					for ($j=0; $j <= $metResp; $j++) {
						if($metricasOrden[$j]==1)
							$resultadoEvaluacion[$j] += 1;
					}
					$metricasOrden = array_fill(0, 5, 0);
					$ant=$act;
				}

				$metricasOrden[$value['valor']]=1;
	
				$universos[$value['valor']] += 1;

				if($value['id_metricaResp'] == $value['id_metrica']) {
					$metResp = $value['valor'];
				}	
			}
			//Valores de la ultima pregunta
			for ($j=0; $j <= $metResp; $j++) {
				if($metricasOrden[$j]==1)
					$resultadoEvaluacion[$j] += 1;
			}


			//Procesar resultados
		    foreach($niveles as $key => $niv) {
		    	$res[] = round(($resultadoEvaluacion[$key]/$universos[$key])*100,2);
		    	$nivM[] = $niv['nombre_nivel'];	
		    }
			$resultado_f = implode(", ",$res);
		    $niveles_f = implode(", ",$nivM);

		}



		//Mostrar la vista 
		$this->render("reporte_grafico",array(
			"evaluacion_id"=>$evaluacion_id, 
			"resultado_f"=>$resultado_f,
			"niveles_f"=>$niveles_f,
			"matriz"=>$matriz));

		/*var_dump("<pre>".print_r($universos,TRUE)."</pre>");
		exit();*/
	}
}
