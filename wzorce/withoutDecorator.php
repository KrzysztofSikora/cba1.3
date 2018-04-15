<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.05.16
 * Time: 14:00
 */

/**
 * Interfejs usługi
 */
interface Service{
    /**
     * metoda doAction ma za zadanie wywołania danej akcji o zadanych parametrach
     * @param string $actionName   Nazwa akcji
     * @param array  $actionParams Parametry akcji
     */
    public function doAction($actionName, $actionParams);
}

/**
 * Usługa news - jak sama nazwa wskazuje służy do obsługi newsów
 */
class News implements Service{
    public function doAction($actionName, $actionParams){
        #robienie czegoś, np. wyswietlenie newsów, zaleznie od actionName i actionParams
    }
}

/**
 * Kontroler - kontroluje działanie aplikacji
 */
class Controller{
    private $_service;

    /**
     * Konstruktor przyjmuje parametry - jest to bardzo skrótowe podejście, zwykle konstruktor sam wybiera te parametry z danego requesta - np. z tablicy $_GET
     * @param string $actionName   Nazwa akcji
     * @param array  $actionParams Parametry akcji
     */
    public function __construct($actionName, $actionParams){

        $this->_service=new News; #tworzenie nowej usługi
        $this->_service->doAction($actionName, $actionParams); #wywołanie akcji

    }

}
