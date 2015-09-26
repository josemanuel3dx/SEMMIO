<?php

/**
 * This is the model class for table "glosario".
 *
 * The followings are the available columns in table 'glosario':
 * @property integer $id_glosario
 * @property string $termino
 * @property string $definicion
 * @property integer $id_matriz
 */
class Glosario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'glosario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('termino, definicion, id_matriz', 'required'),
			array('id_matriz', 'numerical', 'integerOnly'=>true),
			array('termino', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_glosario, termino, definicion, id_matriz', 'safe', 'on'=>'search'),
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
			'id_glosario' => 'Id Término',
			'termino' => 'Término',
			'definicion' => 'Definición',
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

		$criteria->compare('id_glosario',$this->id_glosario);
		$criteria->compare('termino',$this->termino,true);
		$criteria->compare('definicion',$this->definicion,true);
		$criteria->compare('id_matriz',$this->id_matriz);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Glosario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
