<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Category;
use app\models\Question;
use app\models\CategoryQuestion;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class InitDataController extends Controller
{
    /**
     * @var Category[]
     */
    private $categoryMapByName = [];
    
    /**
     * Syntax:
     *   ./yii init-data/category-and-question
     */
    public function actionCategoryAndQuestion()
    {
		$this->addCategories();
		$this->addQuestions();
    }
    
    private function addCategories()
    {
//         $categories = [
//             '自己紹介',
//             '志望',
//             'スキル',
//             '実績',
//             '趣味',
//             '日本',
//             '終わり',
//         ];
//         foreach ($categories as $category) {
//             $category = Category::findOneCreateNew(['name' => $category], TRUE);
//         }
    }
    
    /**
     * @param string $name
     * @return Category
     */
    private function getCategoryByName($name)
    {
        $category = NULL;
        if (isset($this->categoryMapByName[$name])) {
            $category = $this->categoryMapByName[$name];
        } else {
            $category = Category::findOneCreateNew(['name' => $name], TRUE);
            $this->categoryMapByName[$name] = $category;
        }
        return $category;
    }
    
    private function addQuestions()
    {
        $this->addQuestion('自己', 'まず、簡単に自己紹介をお願いします。', '1～2分程度でシンプルに自己紹介できることを望む。');
        $this->addQuestion('自己', '自己PRをしてください。');
        $this->addQuestion(['自己', '反射'], 'あなたの長所は何ですか？');
        $this->addQuestion(['自己', '反射'], '自分の短所は何ですか？');
        $this->addQuestion(['自己', '反射'], '苦手なことは何ですか？');
        $this->addQuestion(['自己', '反射'], '挫折・失敗経験について教えてくだ');
        $this->addQuestion(['自己', '反射', '日本'], '最近気になるニュースは何ですか？');
        $this->addQuestion(['自己', '反射'], '自分を動物に例えると？');
        $this->addQuestion(['自己', '反射'], '自分の性格について');
        $this->addQuestion(['スキル', '反射'], '資格について', 'ただ取得した資格を聞くではない。「どんな努力をして資格を取得したのか？」');
        $this->addQuestion(['自己', '志望'], '10年後の自分はどうなっていたい？');
        $this->addQuestion(['自己', '志望'], '5年後の自分はどうなっていたい？');
        $this->addQuestion(['自己', '反射'], '苦手な人はどんなタイプですか？');
        $this->addQuestion(['自己', '反射'], '尊敬する人はいますか？', '「なぜ尊敬するか？」「その人のどんな影響を受けたのか？」');
        $this->addQuestion(['自己', '志望'], 'あなたにとって仕事とは何ですか？');
        $this->addQuestion(['自己', '社会'], '時事問題についての質問');
        $this->addQuestion(['人間'], '好きな言葉・座右の銘（モットー）は何ですか？');
        $this->addQuestion(['志望'], '将来の夢は何ですか？');
        $this->addQuestion(['自己', 'スキル'], 'あなたの特技は何ですか？', '特技にどう取り組んできたのか？そこから何を学んだのか？');
        $this->addQuestion(['自己', '社会'], '最近読んだ本を教えて下さい');
        $this->addQuestion(['自己', '反射'], 'あなたは当社に向いていないと思うのですが…', '圧迫面接で、ネガティブな反応をされることがあります。冷静に対処できるか？');
        $this->addQuestion(['自己', '反射'], '働く上で大切なことは何ですか？');
        
        $this->addQuestion('反射', '他社の選考状況を教えてください。', '他の会社にも就活していると分かった時、これを聞く。');
        $this->addQuestion('志望', '志望動機を教えてください。');
        $this->addQuestion('志望', '入社後にやりたい仕事は？');
        $this->addQuestion('志望', '希望職種は何ですか？');
        $this->addQuestion(['志望'], '転勤・勤務地についての確認');
        $this->addQuestion(['趣味'], 'あなたの趣味は何ですか？');
        $this->addQuestion('日本', '日本で好きなものは何ですか？');
        $this->addQuestion('日本', '日本で嫌いなものは何ですか？');
        
        
        
        $this->addQuestion('終わり', '最後に何か質問はありますか？');
        $this->addQuestion('終わり', '最後に何か言いたいことはありますか？');
        
        
    }
    
    private function addQuestion($categories, $inquiry, $remarks = NULL)
    {
        // Assure $categories is an array.
        if (!is_array($categories)) {
            $categories = [$categories];
        }
        
        // Add question.
        $question = Question::findOne(['question' => $inquiry]);
        if (!$question) {
            $question = new Question([
                'question' => $inquiry,
                'remarks' => $remarks,
            ]);
            $question->saveThrowError();
        }
        
        // Connect categories and question.
        foreach ($categories as $categoryName) {
            $category = $this->getCategoryByName($categoryName);
            $categoryQuestion = CategoryQuestion::findOneCreateNew([
                'category_id' => $category->id,
                'question_id' => $question->id,
            ], TRUE);
        }
    }
	
}
