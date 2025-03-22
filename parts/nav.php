<?php
include_once 'functions.php';
$menu = getMenuData("header");
echo "<script>console.log(" . json_encode($menu) . ");</script>";

// echo $menu;

$theme = $_GET['theme'];


?>
 <header style = "background-color: <?php echo $theme === "dark" ? "grey" : "white"; ?>" class="container main-header">
    <div class="logo-holder">
        <a href="index.php">
            <img src="img/logo.png" height="40">
        </a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu">
            <?php printMenu($menu);?>

            <a href="<?php echo $theme === "dark" ? "?theme=light" : "?theme=dark"; ?>">Change theme</a>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>