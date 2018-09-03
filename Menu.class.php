<?php
/**
 * "menu" table mapping
 */

class Menu
{
    private $idMenu;
    private $titleMenu;
    private $parentMenu;

    public function __construct(array $menuDB)
    {
        $this->hydratation($menuDB);
    }

    private function hydratation(array $data){
        foreach($data as $key => $value){
            $newMethodName = "set".ucfirst($key);
            if(method_exists($this,$newMethodName)){
                $this->$newMethodName($value);
            }
        }
    }

    public function getIdMenu()
    {
        return $this->idMenu;
    }


    public function setIdMenu($idMenu)
    {
        $this->idMenu = (int) $idMenu;
    }


    public function getTitleMenu()
    {
        return $this->titleMenu;
    }


    public function setTitleMenu(string $titleMenu)
    {
        $this->titleMenu = htmlspecialchars(strip_tags(trim($titleMenu)),ENT_QUOTES);
    }


    public function getParentMenu()
    {
        return $this->parentMenu;
    }

    public function setParentMenu($parentMenu)
    {
        $this->parentMenu = (int) $parentMenu;
    }


}
/*
$a = new Menu(["idMenu"=>"1","titleMenu"=>'blabla',"parentMenu"=>"5"]);
var_dump($a);
*/