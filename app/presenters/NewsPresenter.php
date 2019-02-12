<?php

namespace App\Presenters;

use App\Model\NewsManager;

final class NewsPresenter extends BasePresenter {

    private $newsManager;

    function __construct(NewsManager $newsManager) {
        $this->newsManager = $newsManager;
    }

    public function renderDefault() {
        $this->template->zpravy = $this->newsManager->readAll();
        $this->template->nadpis = 'Seznam zpráv';
    }

    public function renderView($id) {
        $this->template->zprava = $this->newsManager->readById($id);
    }

}
