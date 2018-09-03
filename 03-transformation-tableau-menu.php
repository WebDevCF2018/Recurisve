<?php
/**
 * création d'un menu à partir d'un tableau
 */

class Menu
{
    // Attributs
    private $sortie = "";
    private $startLine = "<ul>";
    private $startRow = "<li>";
    private $endLine = "</ul>";
    private $endRow = "</li>";

    // public constructor
    public function __construct(array $tab)
    {
        $this->createMenu($tab);
    }

    // private method
    private function createMenu(array $tabs)
    {
        // first ul
        $this->setSortie($this->startLine);

        // loops
        foreach ($tabs as $key => $values) {
            // if the value is a array
            if (is_array($values)) {

                // recursive
                $this->createMenu($values);

            } else {
                // item <li></li>
                $this->setSortie($this->startRow . $values . $this->endRow);
            }
        }
        // last close ul
        $this->setSortie($this->endLine);
    }

    // public getter
    public function getSortie()
    {
        return $this->sortie;
    }

    // public setter
    public function setSortie(string $str)
    {
        // concatenation of sortie
        $this->sortie .= $str;
    }

}

$data = [
    "un",
    ["enfant de un"],
    "deux",
    [
        "trois",
        [
                "quatre",
                "cinq",
                ["six","sept"],
            ],
    ],
    "huit",
];

$pourmenu = new Menu($data);
$menu = $pourmenu->getSortie();

?>
<html>
<head>
    <title>Notre menu</title>
</head>
<body>
<h1>Menu</h1>
<div id="menu">
    <nav><?= $menu ?></nav>
</div>
<div id="content"></div>
</body>
</html>
