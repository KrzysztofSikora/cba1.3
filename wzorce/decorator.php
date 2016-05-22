<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.05.16
 * Time: 14:01
 */

/**
 * Dekorator
 */
class ServiceDecorator implements Service {

    private $_decoratedService;
    /**
     * w konstruktorze dekorator przyjmuje obiekt dekorowany
     */
    public function __construct(Service $service){
        $this->_decoratedService=$service;
    }

    public function doAction($actionName, $actionParams){

        dodajDoStatystyk($actionName, $actionParams);#fikcyjna funkcja, która prowadzi statystyki
        $this->_decoratedService->doAction($actionName, $actionParams); #faktyczne wywołanie usługi

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

        $this->_service=new ServiceDecorator(new News); #tworzenie dekoratora, przyjumjącego usługę
        $this->_service->doAction($actionName, $actionParams); #wywołanie akcji - nic sie nie zmienia, mimo, że jest to dekorator

    }

}
