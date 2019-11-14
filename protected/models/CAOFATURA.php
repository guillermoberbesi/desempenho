<?php

/**
 * This is the model class for table "cao_fatura".
 *
 * The followings are the available columns in table 'cao_fatura':
 * @property string $co_factura
 * @property string $co_cliente
 * @property string $co_sistema
 * @property string $co_os
 * @property double $commissao_cn
 */
class CaoFatura extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cao_fatura';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('co_cliente, co_sistema, co_os, commissao_cn', 'required'),
			array('commissao_cn', 'numerical'),
			array('co_cliente, co_sistema, co_os', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('co_factura, co_cliente, co_sistema, co_os, commissao_cn', 'safe', 'on'=>'search'),
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
			 'coCliente' => array(self::BELONGS_TO, 'CAOCLIENTE', 'co_cliente'),
            'coSistema' => array(self::BELONGS_TO, 'PERMISSAOSISTEMA', 'co_sistema'),
            'coOs' => array(self::BELONGS_TO, 'CAOOS', 'co_os'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'co_factura' => 'Co Factura',
			'co_cliente' => 'Co Cliente',
			'co_sistema' => 'Co Sistema',
			'co_os' => 'Co Os',
			'commissao_cn' => 'Commissao Cn',
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

		$criteria->compare('co_factura',$this->co_factura,true);
		$criteria->compare('co_cliente',$this->co_cliente,true);
		$criteria->compare('co_sistema',$this->co_sistema,true);
		$criteria->compare('co_os',$this->co_os,true);
		$criteria->compare('commissao_cn',$this->commissao_cn);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CaoFatura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
