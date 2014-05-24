<?php

/**
 * This is the model class for table "teacherReport".
 *
 * The followings are the available columns in table 'teacherReport':
 * @property integer $id
 * @property integer $user_id
 * @property integer $subject_id
 * @property string $dateReport
 * @property string $dateActivity
 * @property string $topicActivity
 * @property string $typeActivity
 * @property integer $countHours
 * @property string $changed_at
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Teacher $teacher
 */
class TeacherReport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'teacherReport';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, subject_id', 'required'),
			array('user_id, subject_id, countHours', 'numerical', 'integerOnly'=>true),
			array('topicActivity', 'length', 'max'=>255),
			array('typeActivity', 'length', 'max'=>45),
			array('dateReport, dateActivity, changed_at, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, subject_id, dateReport, dateActivity, topicActivity, typeActivity, countHours, changed_at, created_at', 'safe', 'on'=>'search'),
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
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'user_id'),
		);
	}

    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created_at',
                'updateAttribute' => 'changed_at',
            )
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'Teacher',
			'subject_id' => 'Subject',
			'dateReport' => 'Date Report',
			'dateActivity' => 'Date Activity',
			'topicActivity' => 'Topic Activity',
			'typeActivity' => 'Type Activity',
			'countHours' => 'Count Hours',
			'changed_at' => 'Changed At',
			'created_at' => 'Created At',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('dateReport',$this->dateReport,true);
		$criteria->compare('dateActivity',$this->dateActivity,true);
		$criteria->compare('topicActivity',$this->topicActivity,true);
		$criteria->compare('typeActivity',$this->typeActivity,true);
		$criteria->compare('countHours',$this->countHours);
		$criteria->compare('changed_at',$this->changed_at,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TeacherReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
