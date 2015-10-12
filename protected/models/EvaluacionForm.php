<?php

class EvaluacionForm extends CFormModel
{
	public $pregForm = array();
	public $cantPreg = 0;
	public $totalPaginas = 0;
	public $preguntas = array();
	public $dataVista = array();

	public function EvaluacionForm($id_evaluacion,$id_matriz, $cantPregUser) {
		parent::__construct();
		
        //Traer todos los ids de los aspecto de la matriz dada
        $aspectos = Yii::app()->db->createCommand("SELECT * FROM aspecto WHERE id_matriz=".$id_matriz)->queryAll();
        $todas_carac = array();

        foreach($aspectos as $carac){
			$todas_carac [] = $carac['id_aspecto']; 
		}

		$separado_por_comas = implode(",", $todas_carac);

        //Preguntas asociadas a cada aspecto
        $this->preguntas = Yii::app()->db->createCommand("SELECT * FROM pregunta WHERE id_aspecto in (".$separado_por_comas.")")->queryAll();
        //Ordenar las preguntas SIN ASOCIACION CON LAS CLAVES	
		sort($this->preguntas);

		//Cantidad de preguntas totales y restantes
		$this->cantPreg = count($this->preguntas);
		$this->totalPaginas = ceil($this->cantPreg/$cantPregUser);
    }

	public function rules()
	{
		return array();

	}

	public function attributeLabels()
	{
		return array();
	}


	public function generarDataVista($preguntaActual,$cantPregUser)
	{

		$this->dataVista= array();

		//Buscar las preguntas y metricas que van a ser mostradas en la vist
		for ($i=$preguntaActual; $i < ($preguntaActual+$cantPregUser); $i++) { 
			$aux = array();
			$aux = $this->preguntas[$i];
			$aux['metricas'] = Yii::app()->db->createCommand("SELECT b.nombre_metrica nombre, b.valor ponderacion, b.id_metrica id_metrica
			FROM opcion_respuesta a
			LEFT JOIN metrica b on a.id_metrica = b.id_metrica
			WHERE id_pregunta =".$this->preguntas[$i]['id_pregunta']." order by valor DESC")->queryAll();
			
			$this->dataVista [] = $aux;
		}
	}


	public function authenticate($attribute,$params)
	{
		//Para validar con rules
	}

}