<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $email
 * @property string $firstName
 * @property string $lastName
 * @property string $fatherName
 * @property string $password
 * @property integer $status
 * @property integer $type
 * @property string $created_at
 * @property string $changed_at
 * @property string $last_visited_at
 *
 * The followings are the available model relations:
 * @property Teacher[] $teachers
 * @method User findByAttributes()
 * @method User findByPk()
 */
class User extends CActiveRecord
{
    public $newPassword;
    public $position_search;

    const TYPE_TEACHER = 0;
    const TYPE_ADMIN = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'email'),
            array('firstName, lastName, email', 'required'),
            array('status, type', 'numerical', 'integerOnly' => true),
            array('firstName, lastName, fatherName, password', 'length', 'max' => 255),
            array('created_at, changed_at, last_visited_at, newPassword', 'safe'),
            // The following rule is used by search().
            array('id, firstName, lastName, fatherName, password, status, type, created_at, changed_at, last_visited_at, position_search', 'safe', 'on' => 'search'),
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
            'position' => array(self::BELONGS_TO, 'Position', 'position_id'),
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
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'fatherName' => 'Father Name',
            'password' => 'Password',
            'status' => 'Status',
            'type' => 'Type',
            'created_at' => 'Created At',
            'changed_at' => 'Changed At',
            'last_visited_at' => 'Last Visited At',
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

        $criteria = new CDbCriteria;
        $criteria->with = ['position'];

        $criteria->compare('id', $this->id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('firstName', $this->firstName, true);
        $criteria->compare('lastName', $this->lastName, true);
        $criteria->compare('fatherName', $this->fatherName, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('type', $this->type);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('changed_at', $this->changed_at, true);
        $criteria->compare('last_visited_at', $this->last_visited_at, true);

        $criteria->compare('position.name', $this->position_search, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'position_search' => array(
                        'asc' => 'position.name',
                        'desc' => 'position.name DESC',
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
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function verifyPassword($password, $hash)
    {
        return CPasswordHelper::verifyPassword($password, $hash);
    }

    public static function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

    protected function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->password = User::hashPassword($this->password);
        } else {
            if ($this->newPassword) {
                $this->password = User::hashPassword($this->newPassword);
            }
        }
        return parent::beforeSave();
    }

    public function getFullName()
    {
        return sprintf('%s %s %s', $this->lastName, $this->fatherName, $this->firstName);
    }

    public static function getTextTypes()
    {
        return [
            self::TYPE_TEACHER => 'Teacher',
            self::TYPE_ADMIN => 'Admin'
        ];
    }
}
