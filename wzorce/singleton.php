<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.05.16
 * Time: 13:56
 */
class Singleton {
    static $instance;
    private $value='value1';

    /**
     * Prywatny konstruktor - uniemożliwia normalne utworzenie obiektu tej klasy
     */
    private function __construct(){}

    /**
     * Prywatna metoda __clone - uniemozliwia utworzenie kopii obiektu
     */
    private function __clone(){}

    /**
     * Zwraca instancję obiektu i tworzy ja gdy istnieje taka potrzeba
     */
    static function instance(){
        if(empty(self::$instance)) self::$instance=new Singleton;
        return self::$instance;
    }

    public function setVariable($value){
        $this->variable=$value;
    }

    public function getVariable(){
        return $this->variable;
    }
}

$instance=Singleton::instance();
$instance->setVariable('value2');
echo $instance->getVariable();

echo '<br />';

$instance2=Singleton::instance();
echo $instance2->getVariable();