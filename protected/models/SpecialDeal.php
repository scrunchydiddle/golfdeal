<?php

/**
 * This is the model class for table "special_deal".
 *
 * The followings are the available columns in table 'special_deal':
 * @property integer $deal_id
 * @property integer $special_deal_id
 * @property string $deal_date
 * @property string $tee_time
 * @property integer $price
 * @property integer $limit
 * @property integer $sold
 * @property integer $sold_out
 *
 * The followings are the available model relations:
 * @property Deal $deal
 */
class SpecialDeal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpecialDeal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'special_deal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deal_id, deal_date, tee_time, price, limit', 'required'),
			array('deal_id, price, limit, sold, sold_out', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('deal_id, special_deal_id, deal_date, tee_time, price, limit, sold, sold_out', 'safe', 'on'=>'search'),
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
			'deal' => array(self::BELONGS_TO, 'Deal', 'deal_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'deal_id' => 'Deal',
			'special_deal_id' => 'Special Deal',
			'deal_date' => 'Deal Date',
			'tee_time' => 'Tee Time',
			'price' => 'Price',
			'limit' => 'Limit',
			'sold' => 'Sold',
			'sold_out' => 'Sold Out',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('deal_id',$this->deal_id);
		$criteria->compare('special_deal_id',$this->special_deal_id);
		$criteria->compare('deal_date',$this->deal_date,true);
		$criteria->compare('tee_time',$this->tee_time,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('limit',$this->limit);
		$criteria->compare('sold',$this->sold);
		$criteria->compare('sold_out',$this->sold_out);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}