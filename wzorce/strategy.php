<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.05.16
 * Time: 14:02
 */
interface DisplayStrategy {
    public function generate($news);
}

class XHTMLStrategy implements DisplayStrategy {
    public function generate($news) {
        #generowanie kodu XHTML
    }
}

class RSSStrategy implements DisplayStrategy {
    public function generate($news) {
        #generowanie kodu RSS
    }
}

class WAPStrategy implements DisplayStrategy {
    public function generate($news) {
        #generowanie kodu dla komórek
    }
}

class NewsController {
    private $_newsModel, $_displayStrategy;

    public function __construct($displayMode) {
        switch($displayMode){
            case 'rss': $displayStrategy=new RSSStrategy(); break;
            case 'wap': $displayStrategy=new WAPStrategy(); break;
            default: $displayStrategy=new XHTMLStrategy();
        }
        $this->_displayStrategy= $displayStrategy; #strategia wyswietlajaca newsy
        $this->_newsModel= new NewsModel(); #jakiś tam model newsów - nieistotne
    }

    public function display() {
        echo $this->_displayStrategy->generate($this->_newsModel->getNews()); #przekazujemy strategii newsy z modelu newsModel i wyswietlamy wygenerowany przez strategie kod
    }
}

$news= new NewsController('xhtml');
$news->display();