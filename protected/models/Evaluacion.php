<?php

/**
 * This is the model class for table "evaluacion".
 *
 * The followings are the available columns in table 'evaluacion':
 * @property integer $id_matriz
 * @property integer $id_empresa
 * @property string $fecha_evaluacion
 * @property string $observacion
 * @property integer $estatus_evaluacion
 * @property integer $id_evaluacion
 */
class Evaluacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_matriz, id_empresa', 'required'),
			array('id_matriz, id_empresa, estatus_evaluacion', 'numerical', 'integerOnly'=>true),
			array('fecha_evaluacion, observacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_matriz, id_empresa, fecha_evaluacion, observacion, estatus_evaluacion, id_evaluacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_matriz' => 'Id Matriz',
			'id_empresa' => 'Id Empresa',
			'fecha_evaluacion' => 'Fecha Evaluacion',
			'observacion' => 'Observacion',
			'estatus_evaluacion' => 'Estatus Evaluacion',
			'id_evaluacion' => 'Id Evaluacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_matriz',$this->id_matriz);
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('fecha_evaluacion',$this->fecha_evaluacion,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('estatus_evaluacion',$this->estatus_evaluacion);
		$criteria->compare('id_evaluacion',$this->id_evaluacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evaluacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
