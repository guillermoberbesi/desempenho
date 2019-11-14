<?php

/**
 * This is the model class for table "CAO_SALARIO".
 *
 * The followings are the available columns in table 'CAO_SALARIO':
 * @property string $co_salario
 * @property string $co_sistema
 * @property double $brut_salario
 *
 * The followings are the available model relations:
 * @property PERMISSAOSISTEMA $coSistema
 */
class CAOSALARIO extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cao_salario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('co_sistema, brut_salario', 'required'),
			array('brut_salario', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('co_salario, co_sistema, brut_salario', 'safe', 'on'=>'search'),
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
			'coSistema' => array(self::BELONGS_TO, 'PERMISSAOSISTEMA', 'co_sistema'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'co_salario' => 'Co Salario',
			'co_sistema' => 'Co Sistema',
			'brut_salario' => 'Brut Salario',
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

		$criteria->compare('co_salario',$this->co_salario,true);
		$criteria->compare('co_sistema',$this->co_sistema,true);
		$criteria->compare('brut_salario',$this->brut_salario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CAOSALARIO the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
