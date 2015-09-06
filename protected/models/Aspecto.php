<?php

/**
 * This is the model class for table "aspecto".
 *
 * The followings are the available columns in table 'aspecto':
 * @property integer $id_aspecto
 * @property string $nombre_aspecto
 * @property string $definicion_aspecto
 * @property integer $id_matriz
 * @property string $meta_aspecto
 */
class Aspecto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aspecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_aspecto, definicion_aspecto, id_matriz, meta_aspecto', 'required'),
			array('id_matriz', 'numerical', 'integerOnly'=>true),
			array('nombre_aspecto', 'length', 'max'=>80),
			array('meta_aspecto', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_aspecto, nombre_aspecto, definicion_aspecto, id_matriz, meta_aspecto', 'safe', 'on'=>'search'),
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
			'id_aspecto' => 'Id Aspecto',
			'nombre_aspecto' => 'Nombre Aspecto',
			'definicion_aspecto' => 'Definicion Aspecto',
			'id_matriz' => 'Id Matriz',
			'meta_aspecto' => 'Meta Aspecto',
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

		$criteria->compare('id_aspecto',$this->id_aspecto);
		$criteria->compare('nombre_aspecto',$this->nombre_aspecto,true);
		$criteria->compare('definicion_aspecto',$this->definicion_aspecto,true);
		$criteria->compare('id_matriz',$this->id_matriz);
		$criteria->compare('meta_aspecto',$this->meta_aspecto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aspecto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
