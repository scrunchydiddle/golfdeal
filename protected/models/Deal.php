<?php

/**
 * This is the model class for table "deal".
 *
 * The followings are the available columns in table 'deal':
 * @property integer $golf_course_id
 * @property integer $deal_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property GolfCourse $golfCourse
 * @property SpecialDeal[] $specialDeals
 */
class Deal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Deal the static model class
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
		return 'deal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('golf_course_id, description', 'required'),
			array('golf_course_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('golf_course_id, deal_id, description', 'safe', 'on'=>'search'),
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
			'golfCourse' => array(self::BELONGS_TO, 'GolfCourse', 'golf_course_id'),
			'specialDeals' => array(self::HAS_MANY, 'SpecialDeal', 'deal_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'golf_course_id' => 'Golf Course',
			'deal_id' => 'Deal',
			'description' => 'Description',
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

		$criteria->compare('golf_course_id',$this->golf_course_id);
		$criteria->compare('deal_id',$this->deal_id);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}