<?php

/**
 * This is the model class for table "teacherReport".
 *
 * The followings are the available columns in table 'teacherReport':
 * @property integer $id
 * @property integer $user_id
 * @property integer $subject_id
 * @property string $dateActivity
 * @property string $topicName
 * @property integer $activity_id
 * @property integer $countHours
 * @property string $changed_at
 * @property string $created_at
 *
 * @property string $teacher_search
 *
 * The followings are the available model relations:
 * @property Teacher $teacher
 *
 * @property Activity $activity
 * @property Subject $subject
 */
class TeacherReport extends CActiveRecord
{

    public $teacher_search;
    public $subject_search;
    public $activity_search;

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
            array('user_id, subject_id, activity_id, dateActivity, topicName, countHours', 'required'),
            array('user_id, subject_id, countHours, activity_id', 'numerical', 'integerOnly' => true),
            array('topicName', 'length', 'max' => 255),
            array('user_id, subject_id, activity_id, dateActivity, topicName, countHours', 'safe'),

            ['activity_id', 'limitHours'],

            array('id, user_id, subject_id, dateActivity, topicName, countHours, changed_at, created_at, teacher_search, subject_searchm activity_search', 'safe', 'on' => 'search'),
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
        );
    }

    public function limitHours($attributes, $params)
    {
        $criteria = new CDbCriteria();

        $criteria->addCondition('subject_id = :subject_id');
        $criteria->addCondition('activity_id = :activity_id');
        $criteria->addCondition('user_id = :user_id');
        $criteria->addCondition('YEAR(created_at) = :created_at');
        $criteria->params['activity_id'] = $this->activity_id;
        $criteria->params['user_id'] = $this->user_id;
        $criteria->params['subject_id'] = $this->subject_id;
        $criteria->params['created_at'] = date('Y', time());

        $teacherPlan = TeacherPlan::model()->findAll($criteria);

        if (empty($teacherPlan)) {
            $this->addError('activity_id', 'You have no plan yet');
        } else {
            $hoursReported = (int)Yii::app()->db->createCommand()
                ->select('SUM(tr.countHours)')
                ->from('teacherReport tr')
                ->where('tr.activity_id = :activity_id AND tr.user_id = :user_id AND tr.subject_id = :subject_id AND YEAR(tr.created_at) = :created_at', [
                    ':activity_id' => $this->activity_id,
                    ':user_id' => $this->user_id,
                    ':subject_id' => $this->subject_id,
                    ':created_at' => date('Y', time()),
                ])
                ->queryScalar();

            $hoursPlaned = (int)Yii::app()->db->createCommand()
                ->select('SUM(tp.countHours)')
                ->from('teacherPlan tp')
                ->where('tp.activity_id = :activity_id AND tp.user_id = :user_id AND tp.subject_id = :subject_id AND YEAR(tp.created_at) = :created_at', [
                    ':activity_id' => $this->activity_id,
                    ':user_id' => $this->user_id,
                    ':subject_id' => $this->subject_id,
                    ':created_at' => date('Y', time()),
                ])
                ->queryScalar();

            if(($hoursPlaned - ($hoursReported + $this->countHours)) < 0){
                $this->addError('countHours', 'To many hours, you have ' . ($hoursPlaned - $hoursReported) . ' hours left');
            }
        }
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
            'subject_id' => 'Subject',
            'dateActivity' => 'Date Activity',
            'topicName' => 'Topic Name',
            'activity_id' => 'Activity',
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
        $criteria = new CDbCriteria;
        $criteria->with = ['teacher', 'subject', 'activity',];

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('subject_id', $this->subject_id);
        $criteria->compare('dateActivity', $this->dateActivity, true);
        $criteria->compare('topicName', $this->topicName, true);
        $criteria->compare('topicName', $this->topicName, true);
        $criteria->compare('countHours', $this->countHours);
        $criteria->compare('changed_at', $this->changed_at, true);
        $criteria->compare('created_at', $this->created_at, true);

        $criteria->compare('teacher.firstName', $this->teacher_search, true);
        $criteria->compare('subject.name', $this->subject_search, true);
        $criteria->compare('activity.name', $this->activity_search, true);

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
                    '*',
                ),
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TeacherReport the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getActivityTypes()
    {
        return [
            'Lecture',
            'Practic',
            'Lab',
            'Consultation',
            'Diploma',
            'Coursework',
            'Zalick',
            'Exams',
            'Modulework',
            'Postgraduate',
            'PracticeLead',
            'ControlWork',
            'CalculateWork',
            'DEK',
        ];
    }

}
