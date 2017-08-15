<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $question
 * @property string $remarks
 *
 * @property CategoryQuestion[] $categoryQuestions
 * @property InterviewQuestion[] $interviewQuestions
 * 
 * @property Category[] $categories
 * @property integer[] $categoryIds IDs of categories that this question belongs to.
 */
class Question extends \batsg\models\BaseBatsgModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question'], 'required'],
            [['question', 'remarks'], 'string'],
            [['categoryIds'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryQuestions()
    {
        return $this->hasMany(CategoryQuestion::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterviewQuestions()
    {
        return $this->hasMany(InterviewQuestion::className(), ['question_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->andOnCondition(['<>', 'data_status', self::DATA_STATUS_DELETE])
            ->via('categoryQuestions');
    }
    
    /**
     * IDs of categories that this question belongs to.
     * @return integer[]
     */
    public function getCategoryIds()
    {
        $categoryQuestions = CategoryQuestion::hashModels($this->categoryQuestions, 'category_id');
        return array_keys($categoryQuestions);
    }
    
    /**
     * Set IDs of categories that this question belongs to.
     * This will save CategoryQuestion model into DB.
     * @param integer[] $categoryIds
     */
    public function setCategoryIds($categoryIds)
    {
        $categoryQuestions = CategoryQuestion::hashModels($this->categoryQuestions, 'category_id');
        foreach ($categoryIds as $categoryId) {
            if (isset($categoryQuestions[$categoryId])) {
                // Remove existing categoryId out of $categoryQuestions.
                unset($categoryQuestions[$categoryId]);
            } else {
                // Save new category.
                (new CategoryQuestion([
                    'question_id' => $this->id,
                    'category_id' => $categoryId,
                ]))->saveThrowError();
            }
        }
        // Delete all left $categoryQuestions from DB.
        foreach ($categoryQuestions as $categoryQuestion) {
            $categoryQuestion->delete();
        }
    }
}
