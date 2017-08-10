<?php

use batsg\migrations\BaseMigrationCreateTable;

/**
 * Handles the creation of table `question`.
 */
class m170809_145933_create_question_table extends BaseMigrationCreateTable
{
    /**
     * @var string
     */
    protected $table = 'question';
    
    /**
     * {@inheritDoc}
     * @see \batsg\migrations\BaseMigrationCreateTable::createDbTable()
     */
    protected function createDbTable()
    {
        $this->createTableWithExtraFields($this->table, [
            'id' => $this->primaryKey(),
            'question' => [$this->text()->notNull(), '質問'],
            'remarks' => [$this->text(), '備考'],
        ]);
        
        $this->addComments($this->table, '質問');
    }
}
