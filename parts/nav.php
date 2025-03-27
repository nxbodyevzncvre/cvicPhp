<?php
include_once 'functions.php';
$menu = getMenuData("header");
$theme = isset($_GET['theme']) && $_GET['theme'] === 'dark' ? 'dark' : 'light';
?>
<header class="container main-header <?php echo $theme; ?>">
    <div class="logo-holder">
        <a href="index.php?theme=<?php echo $theme; ?>">
            <img src="img/logo.png" height="40" alt="Logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu">
            <?php foreach ($menu as $menuItem): ?>
                <li><a href="<?php echo $menuItem['path']; ?>?theme=<?php echo $theme; ?>"><?php echo $menuItem['name']; ?></a></li>
            <?php endforeach; ?>
            <li>
                <a href="?theme=<?php echo $theme === 'dark' ? 'light' : 'dark'; ?>" class="theme-toggle">
                    Switch to <?php echo $theme === 'dark' ? 'Light' : 'Dark'; ?> Theme
                </a>
            </li>
        </ul>
        <button class="hamburger" id="hamburger" aria-label="Menu">
            <i class="fa fa-bars"></i>
        </button>
    </nav>
</header>