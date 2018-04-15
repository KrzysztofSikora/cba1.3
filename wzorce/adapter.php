<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.05.16
 * Time: 14:38
 */

interface Model {
    public function get($limit, $offset);
}

class News {
    public function pobierz($limit, $offset) {
        #pobiera dane
    }
}

class NewsAdapter implements Model {
    private $_adaptedObject;
    public function __cosntruct() {
        $this->_adapted= new News();
    }

    public function get($limit, $offset) {
        return $this->_adaptedObject->pobierz($limit, $offset);
    }
}