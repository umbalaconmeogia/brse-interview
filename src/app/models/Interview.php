<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interview".
 *
 * @property integer $id
 * @property integer $data_status
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 * @property string $interviewee
 * @property string $interviewer
 * @property string $inteview_date
 * @property string $remarks
 *
 * @property InterviewQuestion[] $interviewQuestions
 */
class Interview extends \batsg\models\BaseBatsgModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interview';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_status', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['interviewee', 'interviewer'], 'required'],
            [['inteview_date'], 'safe'],
            [['remarks'], 'string'],
            [['interviewee', 'interviewer'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_status' => 'Data Status',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'interviewee' => 'Interviewee',
            'interviewer' => 'Interviewer',
            'inteview_date' => 'Inteview Date',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterviewQuestions()
    {
        return $this->hasMany(InterviewQuestion::className(), ['interview_id' => 'id']);
    }
}
