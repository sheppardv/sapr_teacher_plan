<?php

/**
 * This is the model class for table "teacherPlan".
 *
 * The followings are the available columns in table 'teacherPlan':
 * @property integer $id
 * @property integer $user_id
 * @property integer $numberSemestr
 * @property integer $subject_id
 * @property integer $speciality_id
 * @property integer $numberSemester
 * @property integer $countLecture
 * @property integer $countPractic
 * @property integer $countLab
 * @property integer $countConsultation
 * @property integer $countDiploma
 * @property integer $countCoursework
 * @property integer $countZalick
 * @property integer $countExams
 * @property integer $countModulework
 * @property integer $countPostgraduate
 * @property integer $countPracticeLead
 * @property integer $countControlWork
 * @property integer $countCalculateWork
 * @property integer $countDEK
 * @property string $changed_at
 * @property string $created_at
 */
class TeacherPlan extends CActiveRecord
{
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
			array('user_id, subject_id, speciality_id, numberSemester', 'required'),
			array('user_id, numberSemestr, subject_id, speciality_id, numberSemester, countLecture, countPractic, countLab, countConsultation, countDiploma, countCoursework, countZalick, countExams, countModulework, countPostgraduate, countPracticeLead, countControlWork, countCalculateWork, countDEK', 'numerical', 'integerOnly'=>true),
			array('changed_at, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, numberSemestr, subject_id, speciality_id, numberSemester, countLecture, countPractic, countLab, countConsultation, countDiploma, countCoursework, countZalick, countExams, countModulework, countPostgraduate, countPracticeLead, countControlWork, countCalculateWork, countDEK, changed_at, created_at', 'safe', 'on'=>'search'),
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
			'numberSemestr' => 'Number Semestr',
			'subject_id' => 'Subject',
			'speciality_id' => 'Speciality',
			'numberSemester' => 'Number Semester',
			'countLecture' => 'Count Lecture',
			'countPractic' => 'Count Practic',
			'countLab' => 'Count Lab',
			'countConsultation' => 'Count Consultation',
			'countDiploma' => 'Count Diploma',
			'countCoursework' => 'Count Coursework',
			'countZalick' => 'Count Zalick',
			'countExams' => 'Count Exams',
			'countModulework' => 'Count Modulework',
			'countPostgraduate' => 'Count Postgraduate',
			'countPracticeLead' => 'Count Practice Lead',
			'countControlWork' => 'Count Control Work',
			'countCalculateWork' => 'Count Calculate Work',
			'countDEK' => 'Count Dek',
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
		$criteria->compare('numberSemestr',$this->numberSemestr);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('speciality_id',$this->speciality_id);
		$criteria->compare('numberSemester',$this->numberSemester);
		$criteria->compare('countLecture',$this->countLecture);
		$criteria->compare('countPractic',$this->countPractic);
		$criteria->compare('countLab',$this->countLab);
		$criteria->compare('countConsultation',$this->countConsultation);
		$criteria->compare('countDiploma',$this->countDiploma);
		$criteria->compare('countCoursework',$this->countCoursework);
		$criteria->compare('countZalick',$this->countZalick);
		$criteria->compare('countExams',$this->countExams);
		$criteria->compare('countModulework',$this->countModulework);
		$criteria->compare('countPostgraduate',$this->countPostgraduate);
		$criteria->compare('countPracticeLead',$this->countPracticeLead);
		$criteria->compare('countControlWork',$this->countControlWork);
		$criteria->compare('countCalculateWork',$this->countCalculateWork);
		$criteria->compare('countDEK',$this->countDEK);
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
	 * @return TeacherPlan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
