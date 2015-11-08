<?php

/**
 * This is the model class for table "pregunta".
 *
 * The followings are the available columns in table 'pregunta':
 * @property integer $id_pregunta
 * @property string $descripcion_pregunta
 * @property string $id_caracteristica
 * @property integer $id_aspecto
 * @property integer $estatus_pregunta
 */
class Pregunta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pregunta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion_pregunta, id_caracteristica, id_aspecto','required'),
			array('id_aspecto, estatus_pregunta', 'numerical', 'integerOnly'=>true),
			array('descripcion_pregunta, id_caracteristica', 'length', 'max'=>600),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pregunta, descripcion_pregunta, id_caracteristica, id_aspecto, estatus_pregunta', 'safe', 'on'=>'search'),
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
			'id_pregunta' => 'Id Pregunta',
			'descripcion_pregunta' => 'Descripcion Pregunta',
			'id_caracteristica' => 'Id Caracteristica',
			'id_aspecto' => 'Id Aspecto',
			'estatus_pregunta' => 'Estatus Pregunta',
			
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

		$criteria->compare('id_pregunta',$this->id_pregunta);
		$criteria->compare('descripcion_pregunta',$this->descripcion_pregunta,true);
		$criteria->compare('id_caracteristica',$this->id_caracteristica,true);
		$criteria->compare('id_aspecto',$this->id_aspecto);
		$criteria->compare('estatus_pregunta',$this->estatus_pregunta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pregunta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
