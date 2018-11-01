<?php

class AjaxStatsController extends AjaxController
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
            $c = Db::getInstance();
            $query = "SELECT * FROM consumption ORDER BY IdConsumption DESC LIMIT 0,1";
            $pieData = $c->query($query)->fetchAll(PDO::FETCH_ASSOC);

            $this->data['pie'] = $pieData[0];

            $query = "SELECT IdConsumption, (Nuclear + PV + Biogas + Aeolian + Hydraulic_Accu + Hydraulic_River + Thermal) AS 'Sum' FROM consumption ORDER BY IdConsumption ASC";
            $prodYearsData = $c->query($query)->fetchAll(PDO::FETCH_ASSOC);

            $this->data['prodYears'] = $prodYearsData;
        }
        catch(PDOException $e) {
            $this->data['error'] = $e->getMessage();
        }
    }

    function getObject()
    {
        return $this->data;
    }
}