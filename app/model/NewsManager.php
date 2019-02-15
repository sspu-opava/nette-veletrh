<?php

namespace App\Model;

use Nette;

/**
 * Users management.
 */
final class NewsManager {

    use Nette\SmartObject;

    const
            TABLE_NAME = 'news',
            COLUMN_ID = 'id',
            COLUMN_TITLE = 'title',
            COLUMN_CONTENT = 'content',
            COLUMN_PUBLISHED = 'published',
            COLUMN_CATEGORY = 'category';

    /** @var Nette\Database\Context */
    private $database;

    public function __construct(Nette\Database\Context $database) {
        $this->database = $database;
    }
    
    public function readAll($order) {
        return $this->database
                ->table('news')
                ->order($order)
                ->fetchAll();
    }

    public function readById($id) {
        return $this->database->table('news')->get($id);
    }  
    
    public function create($values) {
        $this->database->table('news')->insert($values);
    }

    public function update($values, $id) {
        $this->database->table('news')->get($id)->update($values);
    }
    
    public function delete($id) {
        $this->database->table('news')->get($id)->delete();
    }
    
}
