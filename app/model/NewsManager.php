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
    
    public function readAll() {
        return $this->database->table('news')->fetchAll();
    }

    public function readById($id) {
        return $this->database->table('news')->get($id);
    }    
}
