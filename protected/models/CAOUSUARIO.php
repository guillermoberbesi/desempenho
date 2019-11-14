<?php

/**
 * This is the model class for table "CAO_USUARIO".
 *
 * The followings are the available columns in table 'CAO_USUARIO':
 * @property string $co_usuario
 * @property string $usuario_nombre
 * @property string $usuario_apellido
 *
 * The followings are the available model relations:
 * @property PERMISSAOSISTEMA[] $pERMISSAOSISTEMAs
 */
class CAOUSUARIO extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cao_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_nombre, usuario_apellido', 'required'),
			array('usuario_nombre, usuario_apellido', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('co_usuario, usuario_nombre, usuario_apellido', 'safe', 'on'=>'search'),
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
			'pERMISSAOSISTEMAs' => array(self::HAS_MANY, 'PERMISSAOSISTEMA', 'co_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'co_usuario' => 'Co Usuario',
			'usuario_nombre' => 'Usuario Nombre',
			'usuario_apellido' => 'Usuario Apellido',
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

		$criteria->compare('co_usuario',$this->co_usuario,true);
		$criteria->compare('usuario_nombre',$this->usuario_nombre,true);
		$criteria->compare('usuario_apellido',$this->usuario_apellido,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CAOUSUARIO the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
