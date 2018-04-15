<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.05.16
 * Time: 14:39
 */

class Observer1 implements SplObserver {

    public function update(SplSubject $subject) {
        echo 'Aktualizacja Observer1';
    }

}

class Observer2 implements SplObserver {

    public function update(SplSubject $subject) {
        echo 'Aktualizacja Observer2';
    }

}

class Subject implements SplSubject {

    protected $observers = array();

    public function attach(SplObserver $observer) {
        $this->observers[spl_object_hash($observer)] = $observer;
    }

    public function detach(SplObserver $observer) {
        unset($this->observers[spl_object_hash($observer)]);
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

}

$subject = new Subject();
$observer1 = new Observer1();
$observer2 = new Observer2();

$subject->attach($observer1);
$subject->attach($observer2);
$subject->notify();

?>