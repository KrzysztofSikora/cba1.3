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
        #pobieranie i zwracanie wszystkich newsów
        foreach ($this->db->query("SELECT * FROM `news` LIMIT $limit OFFSET $offset") as $tabNews) {
            $id = $tabNews['id'];
            $title = $tabNews['title'];
            $data = $tabNews['data'];
            $content = $tabNews['content'];
            echo "$id <br /> $title <br/> $data <br /> $content <br />";

        }
    }

    function counter()
    {
        // zlicza ilość newsów w bazie
        $result = $this->db->query("SELECT count(id) FROM `news`");
        $result = mysqli_fetch_assoc($result);

        return $result['count(id)'];
    }

    function cutterMin($page)
    {
        // 1 -> 0;
        // 2 -> 5;
        // 3 -> 10
        // 4 -> 15;

        $page = $page - 1;

        // 0 -> 0
        // 1 -> 5
        // 2 -> 10
        // 3 -> 15
        // 4 -> 20

        $cutMin = $page * 5;


        return $cutMin;
    }

    function paginationAll($volume, $volOnPage)
    {
        // numeruje od ilość elementów, ile na stronie
        //10, 5
        //22, 11
        $tmp = $volume / $volOnPage;

        $numbPages = ceil($tmp);
        // zaokrąglam w górę po to zeby wyświetlić stronę z nie parzystej ilości elementów

        //echo "numPages: $numbPages";
        echo <<< ENT_DISALLOWED

<nav>
    <ul class="pagination">

ENT_DISALLOWED;
        for ($i = 1; $i <= $numbPages; $i++) {
//            echo "$i <br>";


            echo '<li><a href="' . '?page=' . $i . '">' . $i . '</a></li>';

        }
        echo <<< ENT_DISALLOWED

    </ul>
</nav>

ENT_DISALLOWED;

    }



        public function write($i) {
            if($i) {
                $query = $this->db->query("SELECT * from `news` WHERE `id` = $i");
                $query = $query->fetch_assoc();
                $id = $query['id'];
                $title = $query['title'];
                $data = $query['data'];
                $content = $query['content'];

                return array($id, $title, $data, $content);
            } else return array();
        }


}

class View {
    public function parseTemplate($templateName, $date) {


        $message = file_get_contents($templateName);
        $message = str_replace("[id]", $date[0], $message);
        $message = str_replace("[title]", $date[1], $message);
        $message = str_replace("[data]", $date[2], $message);
        $message = str_replace("[content]", $date[3], $message);
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

    public function index($page)
    {
        $this->_newsModel = new NewsModel();
        $this->_view = new View();
        $template = "templates/email_template.html";


        $range = $page  ;
        $range = $range + 2;

        for ($i = $range; $i < $range + 2; $i++) {
        echo $this->_view->parseTemplate($template, $this->_newsModel->write($i)); #przekazujemy pobrane newsy
    }

        $value = $this->_newsModel->counter(); // ilość wszystkich w bazie
        $this->_newsModel->paginationAll($value,2);

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

echo "Page: $page <br/>";
echo "GET: "; $_GET['page'];
echo  $_GET['page'];
echo "<br /> <br/>";

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else $page = 1;
$controller->index($page);

//controller