<?php

class Model
{
    function __construct()
    {

        $this->db = mysqli_connect('krzysztofsikora24.pl', 'krzysztofcba', 'bazacba12', 'krzysztofsikora24_pl');
        if (mysqli_connect_errno()) {
            echo "Błąd połączenia z bazą danych: " . mysqli_connect_error();
        }
    }

    public function getData()
    {
        $query = $this->db->query("SELECT * from `users`");
        $query = $query->fetch_assoc();
        $id = $query['userID'];
        return $id;
    }
}

class View
{
    public function parseTemplate($templateToRender, $dateFromModel)
    {
        // przekazujemy szablon i wypełniamy go przekazanymi danymi.
        $dataToView = file_get_contents($templateToRender);
        $dataToView = str_replace("[zmienna]", $dateFromModel, $dataToView);
        return $dataToView;
    }
}

class Controller
{
    private $_view, $_model;

    public function __construct()
    {

    }

    public function index()
    {

        $this->_model = new Model();
        // tworzymy obiekt modelu.

        $this->_view = new View();
        // tworzymy obiekt widoku.

        $template = "templates/template.html";
        echo $this->_view->parseTemplate($template, $this->_model->getData());
        //przekazujemy pobrane dane z bazy danych do szablonu html.

    }
}

$controller = new Controller();
$controller->index();

