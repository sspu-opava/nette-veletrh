<?php

namespace App\Presenters;

use App\Model\NewsManager;
use Tracy\Debugger;
use Nette\Application\UI\Form;

final class NewsPresenter extends BasePresenter {

    private $newsManager;

    function __construct(NewsManager $newsManager) {
        $this->newsManager = $newsManager;
    }
    public function actionDelete($id){
        $data = $this->newsManager->delete($id);
        $this->flashMessage('Byla vymazána zpráva');
        $this->redirect('News:default');
    }    

    public function renderDefault($order='title') {
        $this->template->zpravy = $this->newsManager->readAll($order);
        $this->template->nadpis = 'Seznam zpráv';
        /*Debugger::dump($this->template->zpravy);*/
        Debugger::barDump($this->template->nadpis);
        Debugger::log('Pokus');        
    }

    public function renderView($id) {
        $this->template->zprava = $this->newsManager->readById($id);
    }
    
    public function renderCreate(){        
    }

    public function renderUpdate($id){
        $data = $this->newsManager->readById($id);
        $this['newsForm']->setDefaults($data->toArray());
    }    
    
    protected function createComponentNewsForm()
    {
        $form = new Form;
        $form->addText('title', 'Titulek:');
        $form->addTextArea('content', 'Obsah článku');
        $items = [
            'studium' => 'Studium',
            'práce' => 'Práce',
            'zábava' => 'Zábava'
        ];
        $form->addSelect('category', 'Rubriky:', $items);
        $form->addSubmit('submit', 'Potvrdit');
        $form->onSuccess[] = [$this, 'newsFormSucceeded'];
        return $form;
    }

    // volá se po úspěšném odeslání formuláře
    public function newsFormSucceeded(Form $form, $values)
    {
        $id = $this->getParameter('id');
        if ($id) {
            $this->newsManager->update($values, $id);
        } else {
            $this->newsManager->create($values);
        }
        $this->flashMessage('Byla uložena nová zpráva');
        $this->redirect('News:default');
    }    
}
