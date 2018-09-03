<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 3/09/2018
 * Time: 15:46
 */

class MenuManager
{
    // PDO connection
    private $db;
    // all sections in an associative array
    private $datas;

    public function __construct(PDO $connect)
    {
        $this->db = $connect;
        $this->setDatas($this->listMenu());
    }

    // return all items from "menu" in an associative array
    private function listMenu(): array
    {
        $req = $this->db->query("SELECT * FROM menu;");

        // not result
        if(!$req->rowCount()){
            // return empty table
            return [];
        }else{
            // return associative array
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
    }


    public function getDatas(): array
    {
        return $this->datas;
    }


    private function setDatas($datas): void
    {
        $this->datas = $datas;
    }



}