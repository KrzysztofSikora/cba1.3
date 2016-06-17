<?php

interface XML {
    public function load_on_XML($xml);
    public function write();

}

interface Ini {
    public function load_on_Ini($ini);
    public function write();
}

interface CSV {
    public function load_on_CSV($csv);
    public function write();
}

interface Yaml {
    public function load_on_Yaml($yaml);
    public function write();
}

class Wczytywanie implements XML, Ini, CSV, Yaml {

    private $dokXML;
    private $dokIni;
    private $dokCSV;
    private $dokYaml;

    public function load_on_Xml($xml) {
        $this->dokXML = simplexml_load_file($xml) or die("Error: Cannot create object");

    }
    public function load_on_Ini($ini) {
        $this->dokIni = parse_ini_file($ini);
}
    public function load_on_CSV($csv_) {
        $csv = array();
        $file = fopen($csv_, 'r');

        while (($result = fgetcsv($file)) !== false)
        {
            $csv[] = $result;
        }

        fclose($file);

        $this->dokCSV = $csv;
    }
    public function load_on_Yaml($yaml) {
        include('./spyc-master/Spyc.php');

        $array = Spyc::YAMLLoad($yaml);
        $this -> dokYaml = $array;
    }
    public function write() {

        print_r($this->dokXML);

        print_r($this->dokIni);

        print_r($this->dokCSV);

        print_r($this->dokYaml);


    }
}

$o = new Wczytywanie();
$o->load_on_XML("./load_files/books.xml");
$o->load_on_Ini("./load_files/przyklad.ini");
$o->load_on_CSV("./load_files/przykladCSV.csv");
$o->load_on_Yaml("./load_files/sample.yaml");
$o->write()


?>