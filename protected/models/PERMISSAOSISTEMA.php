<?php

/**
 * This is the model class for table "permissao_sistema".
 *
 * The followings are the available columns in table 'permissao_sistema':
 * @property string $co_sistema
 * @property string $in_ativo
 * @property string $co_tipo_usuario
 * @property string $co_usuario
 */
class PermissaoSistema extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'permissao_sistema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('in_ativo, co_tipo_usuario, co_usuario', 'required'),
			array('in_ativo', 'length', 'max'=>1),
			array('co_tipo_usuario, co_usuario', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('co_sistema, in_ativo, co_tipo_usuario, co_usuario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		
		return array(
			'coUsuario' => array(self::BELONGS_TO, 'CAOUSUARIO', 'co_usuario'),
            'coTipoUsuario' => array(self::BELONGS_TO, 'TIPOUSUARIO', 'co_tipo_usuario'),
            'cAOFATURAs' => array(self::HAS_MANY, 'CAOFATURA', 'co_sistema'),
            'cAOSALARIOs' => array(self::HAS_MANY, 'CAOSALARIO', 'co_sistema'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'co_sistema' => 'Co Sistema',
			'in_ativo' => 'In Ativo',
			'co_tipo_usuario' => 'Co Tipo Usuario',
			'co_usuario' => 'Co Usuario',
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

		$criteria->compare('co_sistema',$this->co_sistema,true);
		$criteria->compare('in_ativo',$this->in_ativo,true);
		$criteria->compare('co_tipo_usuario',$this->co_tipo_usuario,true);
		$criteria->compare('co_usuario',$this->co_usuario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PermissaoSistema the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
