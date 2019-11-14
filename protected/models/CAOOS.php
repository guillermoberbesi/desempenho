<?php

/**
 * This is the model class for table "cao_os".
 *
 * The followings are the available columns in table 'cao_os':
 * @property string $co_os
 * @property string $data_emissao
 * @property double $valor
 * @property double $total_imp_inc
 */
class CaoOs extends CActiveRecord
{

		public $desde;
		public $hasta;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cao_os';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data_emissao, valor, total_imp_inc', 'required'),
			array('valor, total_imp_inc', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('co_os, data_emissao, valor, total_imp_inc', 'safe', 'on'=>'search'),
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
			'cAOFATURAs' => array(self::HAS_MANY, 'CAOFATURA', 'co_os'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'co_os' => 'Co Os',
			'data_emissao' => 'Data Emissao',
			'valor' => 'Valor',
			'total_imp_inc' => 'Total Imp Inc',
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

		$criteria->compare('co_os',$this->co_os,true);
		$criteria->compare('data_emissao',$this->data_emissao,true);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('total_imp_inc',$this->total_imp_inc);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CaoOs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
