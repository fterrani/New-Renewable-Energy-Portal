<?php

class AjaxInstallationsController extends AjaxController
{
    private $data = array();

    function __construct()
    {
        parent::__construct();

        $this->addHeader('Access-Control-Allow-Origin', '*');
    }

    function prerun()
    {
        try {
            $conn = Db::getInstance();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM address";
            $this->data = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    function getObject()
    {
        return $this->data;
    }
}