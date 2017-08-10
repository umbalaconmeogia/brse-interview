<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interview_question".
 *
 * @property integer $id
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
            [['interview_id', 'question_id'], 'required'],
            [['interview_id', 'question_id', 'usage'], 'integer'],
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
