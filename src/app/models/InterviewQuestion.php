<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interview_question".
 *
 * @property integer $id
 * @property integer $data_status
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 * @property integer $interview_id
 * @property integer $question_id
 * @property integer $usage
 *
 * @property Question $question
 * @property Interview $interview
 */
class InterviewQuestion extends \batsg\models\BaseBatsgModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interview_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_status', 'created_by', 'created_at', 'updated_by', 'updated_at', 'interview_id', 'question_id', 'usage'], 'integer'],
            [['interview_id', 'question_id'], 'required'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['question_id' => 'id']],
            [['interview_id'], 'exist', 'skipOnError' => true, 'targetClass' => Interview::className(), 'targetAttribute' => ['interview_id' => 'id']],
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
            'interview_id' => 'Interview ID',
            'question_id' => 'Question ID',
            'usage' => 'Usage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterview()
    {
        return $this->hasOne(Interview::className(), ['id' => 'interview_id']);
    }
}
