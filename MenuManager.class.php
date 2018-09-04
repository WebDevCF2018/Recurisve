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
    // content in html for navigation
    private $menu="";

    public function __construct(PDO $connect)
    {
        // connection
        $this->db = $connect;
        // get values from "menu"
        $this->setDatas($this->listMenu());
        // create ul li arbor
        $this->createMenu(0,0,$this->getDatas());
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

    // recursive method
    private function createMenu($parent,$level,$array){

        $previousLevel = 0;

        $this->setMenu("<ul>");

            if(empty($array)){
                $this->setMenu("<li>Vous n'avez pas de rubrique</li>");
            }else {

                foreach ($array as $value) {

                    // we're on the same level
                    if ($parent == $value['parentMenu']) {

                        // this is the first level
                        if ($value['parentMenu'] == 0 && $parent ==0) {

                            // open <li> tag
                            $this->setMenu("<li>");
                        }

                        // submenu was detected
                        if ($parent > $level) {
                            // open <ul> tag
                            $this->setMenu("<ul>");
                        }

                        // item was detected into submenu
                        if ($value['parentMenu'] != 0) {
                            // open <li> tag
                            $this->setMenu("<li>-");
                        }

                        // this is the first level
                        if ($value['parentMenu'] == 0) {
                            // content for first level
                            $this->setMenu("<a href='#'>".strtoupper($value['titleMenu'])."</a>");

                            // this isn't first level
                        }else{
                            $this->setMenu("<a href='#'>{$value['titleMenu']}</a>");
                        }


                    }
                }

            }



        $this->setMenu("</ul>");

    }


    public function getDatas(): array
    {
        return $this->datas;
    }


    private function setDatas($datas): void
    {
        $this->datas = $datas;
    }


    public function getMenu(): string
    {
        return $this->menu;
    }


    public function setMenu($menu): void
    {
        // concatenation
        $this->menu .= $menu;
    }




}