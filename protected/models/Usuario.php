<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $sexo
 * @property string $nacionalidad
 * @property string $usuario
 * @property string $contrasena
 * @property string $apellido
 * @property integer $id_empresa
 * @property integer $id_rol
 * @property string $letra_id
 * @property string $num_id
 * @property string $digito_id
 * @property string $telefono1
 * @property string $telefono2
 * @property string $email
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, sexo, nacionalidad, usuario, contrasena, apellido, id_empresa, id_rol, letra_id, num_id, digito_id, telefono1, email', 'required'),
			array('id_empresa, id_rol', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido, email', 'length', 'max'=>150),
			array('sexo, letra_id, digito_id', 'length', 'max'=>1),
			array('nacionalidad', 'length', 'max'=>25),
			array('usuario', 'length', 'max'=>55),
			array('contrasena', 'length', 'max'=>128),
			array('num_id', 'length', 'max'=>8),
			array('telefono1, telefono2', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, nombre, sexo, nacionalidad, usuario, contrasena, apellido, id_empresa, id_rol, letra_id, num_id, digito_id, telefono1, telefono2, email', 'safe', 'on'=>'search'),
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
			'id_usuario' => 'Id Usuario',
			'nombre' => 'Nombre',
			'sexo' => 'Sexo',
			'nacionalidad' => 'Nacionalidad',
			'usuario' => 'Usuario',
			'contrasena' => 'Contrasena',
			'apellido' => 'Apellido',
			'id_empresa' => 'Id Empresa',
			'id_rol' => 'Id Rol',
			'letra_id' => 'Letra',
			'num_id' => 'Num',
			'digito_id' => 'Digito',
			'telefono1' => 'Telefono1',
			'telefono2' => 'Telefono2',
			'email' => 'Email',
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('contrasena',$this->contrasena,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('id_rol',$this->id_rol);
		$criteria->compare('letra_id',$this->letra_id,true);
		$criteria->compare('num_id',$this->num_id,true);
		$criteria->compare('digito_id',$this->digito_id,true);
		$criteria->compare('telefono1',$this->telefono1,true);
		$criteria->compare('telefono2',$this->telefono2,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
