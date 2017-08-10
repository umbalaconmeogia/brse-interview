<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_question".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $question_id
 *
 * @property Question $question
 * @property Category $category
 */
class CategoryQuestion extends \batsg\models\BaseBatsgModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'question_id'], 'required'],
            [['category_id', 'question_id'], 'integer'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['question_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'question_id' => 'Question ID',
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
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
