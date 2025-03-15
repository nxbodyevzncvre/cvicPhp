<?php
function validateMenuType(string $type): bool {
    $menuTypes = ['header', 'footer'];
    return in_array($type, $menuTypes);
}

function getMenuData(string $type): array {
    $menu = [];
    if (validateMenuType($type)) {
        $json = file_get_contents('menu.json');
        $data = json_decode($json, true);
        if (isset($data[$type])) {
            $menu = $data[$type];
        }
    }
    return $menu;
}

function printMenu(array $menu) {
    foreach ($menu as $menuItem) {
        echo '<li><a href="' . $menuItem['path'] . '">' . $menuItem['name'] . '</a></li>';
    }
}



function preparePortfolio( int $numberOfRows = 2, int $numberOfCols = 4): array{
    $portfolio = [];
    $colIndex = 1;
    for ($i = 1; $i <= $numberOfRows; $i++){
        for($j = 1; $j <= $numberOfCols; $j++){
            $portfolio[$i][$j] = $colIndex;
            $colIndex++;
        }
    }

    return $portfolio;

};

function finishPortfolio(){
    $portfolio = preparePortfolio();
    foreach($portfolio as $row => $col){
        echo '<div class = "row">';
        foreach($col as $index){
            echo '<div class = "col-25 portfolio text-white text-center" id ="portfolio-'.$index.'">
            Web Stranka '.$index.'
            </div>';
        }
       echo '</div>';
    }
};


function printQuickLinks(array $menu) {
    foreach ($menu as $menuItem) {
        echo '<p><a href="' . $menuItem['path'] . '">' . $menuItem['name'] . '</a></p>';
    }
}

