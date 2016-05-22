<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.05.16
 * Time: 14:11
 */

interface observer {
    public function update();
}

class CacheObserver implements observer {
    public function update() {
        #odświerza cache
    }
}

class RSSObserver implements observer {
    public function update() {
        #odświerza RSS
    }
}

class News {
    private $title, $content, $_observers;

    public function setTitle($title) {
        $this->title= $title;
    }
    public function setContent($content) {
        $this->content= $content;
    }

    /**
     * Dodaje obserwator do listy
     */
    public function addObserver(observer $observer) {
        $this->_observers[]= $observer;
    }

    /**
     * Powiadamia wszystkich obserwatorów
     */
    private function notify() {
        foreach ($this->_observers as $observer) $observer->update();
    }

    public function add() {
        #dodanie newsa
        $this->notify(); #powiadamia obserwatorów
    }

}

$news= new News();

$news->addObserver(new RSSObserver()); #dodajemy obserwator
$news->addObserver(new CacheObserver()); #dodajemy obserwator

$news->setTitle('Tytuł newsa');
$news->setContent('Treść newsa');
$news->add();