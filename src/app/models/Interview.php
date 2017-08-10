<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interview".
 *
 * @property integer $id
 * @property string $interviewee
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
            [['interviewee'], 'required'],
            [['inteview_date'], 'safe'],
            [['remarks'], 'string'],
            [['interviewee'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'interviewee' => 'Interviewee',
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
