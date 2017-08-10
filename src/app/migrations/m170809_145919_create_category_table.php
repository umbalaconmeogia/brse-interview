<?php

use batsg\migrations\BaseMigrationCreateTable;

/**
 * Handles the creation of table `category`.
 */
class m170809_145919_create_category_table extends BaseMigrationCreateTable
{
    /**
     * @var string
     */
    protected $table = 'category';
    
    /**
     * {@inheritDoc}
     * @see \batsg\migrations\BaseMigrationCreateTable::createDbTable()
     */
    protected function createDbTable()
    {
        $this->createTableWithExtraFields($this->table, [
            'id' => $this->primaryKey(),
            'name' => [$this->string()->notNull(), 'カテゴリー名'],
        ]);
        
        $this->addComments($this->table, 'カテゴリー');
    }
}
