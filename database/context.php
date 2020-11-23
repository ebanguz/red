<?php

class context {
    public $db;
    private $Filehandler;

    function __construct($directory) {
        $this->Filehandler = new Jsonfhandler($directory, "configuration");
        $configuration     = $this->Filehandler->ReadConfiguration();
        $this->db          = new mysqli("127.0.0.1", "root", "", "red");
        if ($this->db->connect_error) {
            exit('Fallo la coneccion a la Base de Datos');

        }
    }

}

?>