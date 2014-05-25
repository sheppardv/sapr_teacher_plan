<?php

/**
 * This is the model class for table "teacherPlan".
 *
 * The followings are the available columns in table 'teacherPlan':
 * @property integer $id
 * @property integer $user_id
 * @property integer $numberSemester
 * @property integer $subject_id
 * @property integer $speciality_id
 * @property integer $activity_id
 * @property integer $countHours
 * @property string $changed_at
 * @property string $created_at
 *
 * @property string $teacher_search
 *
 * @property string $fullname
 *
 * @property User $teacher
 * @property Activity $activity
 * @property Subject $subject
 * @property Speciality $speciality
 */
class TeacherPlan extends CActiveRecord
{
    public $teacher_search;
    public $subject_search;
    public $activity_search;
    public $speciality_search;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'teacherPlan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, subject_id, speciality_id, activity_id, countHours, numberSemester', 'required'),
            array('user_id, numberSemester, subject_id, speciality_id, numberSemester, countHours, activity_id', 'numerical', 'integerOnly' => true),
            array('changed_at, created_at', 'safe'),

            array('id, user_id, numberSemester, subject_id, speciality_id, activity_id, numberSemester, countHours, changed_at, created_at,
             teacher_search, subject_search, activity_search, speciality_search', 'safe', 'on' => 'search'),
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
            'teacher' => array(self::BELONGS_TO, 'User', 'user_id'),
            'activity' => array(self::BELONGS_TO, 'Activity', 'activity_id'),
            'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
            'speciality' => array(self::BELONGS_TO, 'Speciality', 'speciality_id'),
        );
    }

    public function behaviors()
    {
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
            'numberSemester' => 'Number Semestr',
            'subject_id' => 'Subject',
            'activity_id' => 'Activity',
            'speciality_id' => 'Speciality',
            'countHours' => 'Count hours',
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
     * @param bool $onlyMine
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search($onlyMine = false)
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = ['teacher', 'subject', 'activity', 'speciality'];

        if($onlyMine){
            $criteria->addCondition('t.user_id = :user_id');
            $criteria-> params['user_id'] = Yii::app()->user->id;
        }

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('numberSemester', $this->numberSemester);
        $criteria->compare('subject_id', $this->subject_id);
        $criteria->compare('speciality_id', $this->speciality_id);
        $criteria->compare('numberSemester', $this->numberSemester);
        $criteria->compare('countHours', $this->countHours);
        $criteria->compare('changed_at', $this->changed_at, true);
        $criteria->compare('created_at', $this->created_at, true);

        $criteria->compare('teacher.firstName', $this->teacher_search, true);
        $criteria->compare('subject.name', $this->subject_search, true);
        $criteria->compare('activity.name', $this->activity_search, true);
        $criteria->compare('speciality.name', $this->speciality_search, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,

            'sort' => array(
                'attributes' => array(
                    'teacher_search' => array(
                        'asc' => 'teacher.firstName',
                        'desc' => 'teacher.firstName DESC',
                    ),
                    'subject_search' => array(
                        'asc' => 'subject.name',
                        'desc' => 'subject.name DESC',
                    ),
                    'activity_search' => array(
                        'asc' => 'activity.name',
                        'desc' => 'activity.name DESC',
                    ),
                    'speciality_search' => array(
                        'asc' => 'speciality.name',
                        'desc' => 'speciality.name DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TeacherPlan the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
