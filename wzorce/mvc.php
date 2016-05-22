<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.05.16
 * Time: 13:53
 */
class NewsModel {
    /**
     * Pobiera newsy z bazy danych
     * @param integer $limit  Limit zapytania
     * @param integer $offset Offset zapytania
     */

    function __construct()
    {
        $this->db = mysqli_connect('krzysztofsikora24.pl', 'krzysztofcba', 'bazacba12', 'krzysztofsikora24_pl');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function get($limit, $offset = '1')
    {
        #pobieranie i zwracanie użytkowników
        foreach ($this->db->query("SELECT * FROM `users` LIMIT $limit OFFSET $offset") as $tabUsers) {
            $name = $tabUsers['name'];
            echo "$name <br>";

        }
    }
        public function write() {
            $query = $this->db->query("SELECT * from `users`");
            $query = $query->fetch_assoc();
            $id = $query['userID'];
            return $id;
        }


}



class View {
    public function parseTemplate($templateName, $date) {
        #wczytujemy dany template i parsujemy go z użyciem danych przekazanych w parametrze


        $message = file_get_contents($templateName);
        $message = str_replace("[login]", $date, $message);
        return $message;
    }


}



class Controller {
    private $_view, $_newsModel;

    public function __construct() {
        #sprawdzamy czy istnieje metoda i wywołujemy ją jeżeli tak, inaczej domyslna metoda czyli index
//        if (method_exists($this, $_GET['akcja']))
//            $this-> $_GET['akcja'] ();
//        else
//            $this->index();
    }

    public function index() {
        $this->_newsModel= new NewsModel();
        $this->_view= new View();
        $template = "templates/email_template.html";
        echo $this->_view->parseTemplate($template, $this->_newsModel->write()); #przekazujemy pobrane newsy

    }
}


//$news= new NewsModel();
//$news->get(1);
//$id = $news->write();
//
//
//echo "<br>Model is working. <br>";
////// Model
//
//$template = "templates/email_template.html";
//$dane = $id;
//$view = new View();
//echo $view->parseTemplate($template, $dane);
/////// View

$controller = new Controller();

$controller->index();