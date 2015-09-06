<?php

/**
 * This is the model class for table "caracteristica".
 *
 * The followings are the available columns in table 'caracteristica':
 * @property integer $id_caracteristica
 * @property string $codigo
 * @property string $nombre_caracteristica
 * @property string $definicion_caracteristica
 * @property integer $id_nivel
 * @property integer $id_aspecto
 * @property integer $id_matriz
 */
class Caracteristica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'caracteristica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo, nombre_caracteristica, definicion_caracteristica, id_nivel, id_aspecto, id_matriz', 'required'),
			array('id_nivel, id_aspecto, id_matriz', 'numerical', 'integerOnly'=>true),
			array('codigo', 'length', 'max'=>11),
			array('nombre_caracteristica', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_caracteristica, codigo, nombre_caracteristica, definicion_caracteristica, id_nivel, id_aspecto, id_matriz', 'safe', 'on'=>'search'),
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
			'id_caracteristica' => 'Id Caracteristica',
			'codigo' => 'Codigo',
			'nombre_caracteristica' => 'Nombre Caracteristica',
			'definicion_caracteristica' => 'Definicion Caracteristica',
			'id_nivel' => 'Id Nivel',
			'id_aspecto' => 'Id Aspecto',
			'id_matriz' => 'Id Matriz',
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

		$criteria->compare('id_caracteristica',$this->id_caracteristica);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('nombre_caracteristica',$this->nombre_caracteristica,true);
		$criteria->compare('definicion_caracteristica',$this->definicion_caracteristica,true);
		$criteria->compare('id_nivel',$this->id_nivel);
		$criteria->compare('id_aspecto',$this->id_aspecto);
		$criteria->compare('id_matriz',$this->id_matriz);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Caracteristica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
