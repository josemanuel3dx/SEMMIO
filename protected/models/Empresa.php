<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id_empresa
 * @property string $nombre_empresa
 * @property string $direccion_empresa
 * @property string $area_manufactura
 * @property string $letra_id
 * @property string $num_id
 * @property string $digito_id
 * @property string $telefono1
 * @property string $telefono2
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_empresa, direccion_empresa, area_manufactura, letra_id, num_id, digito_id, telefono1', 'required'),
			array('nombre_empresa, direccion_empresa, area_manufactura', 'length', 'max'=>255),
			array('letra_id, digito_id', 'length', 'max'=>1),
			array('num_id', 'length', 'max'=>8),
			array('telefono1, telefono2', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_empresa, nombre_empresa, direccion_empresa, area_manufactura, letra_id, num_id, digito_id, telefono1, telefono2', 'safe', 'on'=>'search'),
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
			'id_empresa' => 'Id Empresa',
			'nombre_empresa' => 'Nombre Empresa',
			'direccion_empresa' => 'Direccion Empresa',
			'area_manufactura' => 'Area Manufactura',
			'letra_id' => 'Letra',
			'num_id' => 'Num',
			'digito_id' => 'Digito',
			'telefono1' => 'Telefono1',
			'telefono2' => 'Telefono2',
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

		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('nombre_empresa',$this->nombre_empresa,true);
		$criteria->compare('direccion_empresa',$this->direccion_empresa,true);
		$criteria->compare('area_manufactura',$this->area_manufactura,true);
		$criteria->compare('letra_id',$this->letra_id,true);
		$criteria->compare('num_id',$this->num_id,true);
		$criteria->compare('digito_id',$this->digito_id,true);
		$criteria->compare('telefono1',$this->telefono1,true);
		$criteria->compare('telefono2',$this->telefono2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
