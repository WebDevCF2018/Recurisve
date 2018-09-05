<?php

/**
 * Created by PhpStorm.
 * User: webform
 * Date: 3/09/2018
 * Time: 15:46
 */
class MenuManagerB {

    // PDO connection
    private $db;
    // all sections in an associative array
    private $datas;
    // content in html for navigation
    private $menu = "";

    public function __construct(PDO $connect) {
        // connection
        $this->db = $connect;
        // get values from "menu"
        $this->setDatas($this->listMenu());
        // create ul li arbor
        $this->createMenu($this->getDatas());
    }

    // return all items from "menu" in an associative array
    private function listMenu(): array {
        $req = $this->db->query("SELECT * FROM menu;");

        // not result
        if (!$req->rowCount()) {
            // return empty table
            return [];
        } else {
            // return associative array
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    // recursive method
    private function createMenu($array,$parent_id = 0,$parents = array()) {


            foreach ($array as $element) {
                    $parents[] = $element['parentMenu'];
            }
        

        foreach($array as $element)
        {
            if($element['parentMenu']==$parent_id)
            {
                
                if(in_array($element['idMenu'],$parents))
                {
                    
                    
                    $this->setMenu('<li class="dropdown-item dropdown">');
                    $this->setMenu('<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$element['titleMenu'].' <span class="caret"></span></a> ');
                    
                }
                else {
                    $this->setMenu('<li class="">');
                    $this->setMenu('<a href=?id="'.$element['idMenu']. '">' . $element['titleMenu'] . '</a>');
                }
                if(in_array($element['idMenu'],$parents))
                {

                    $this->setMenu('<ul class="dropdown-menu">');

                    $this->setMenu($this->createMenu($array, $element['idMenu'], $parents));

                    $this->setMenu('</ul>');

                }
                $this->setMenu('</li>');
                
            }
        }
        //return $menu_html;

    }

    public function getDatas(): array {
        return $this->datas;
    }

    private function setDatas($datas): void {
        $this->datas = $datas;
    }

    public function getMenu(): string {
        return $this->menu;
    }

    public function setMenu($menu): void {
        // concatenation
        $this->menu .= $menu;
    }

}
