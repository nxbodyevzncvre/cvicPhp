<!DOCTYPE html>
<?php

$theme = isset($_GET['theme']) && $_GET['theme'] === 'dark' ? 'dark' : 'light';
?>
<html lang="sk" class="<?php echo $theme; ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja stránka</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="<?php echo $theme; ?>">
  <?php include_once 'parts/nav.php'?>

  <main class="<?php echo $theme; ?>">
    <section class="banner <?php echo $theme; ?>">
      <div class="container">
        <h1>Kontakt</h1>
      </div>
    </section>
    <section class="<?php echo $theme; ?>">
      <div class="container <?php echo $theme; ?>">
        <div class="col-100 text-center">
          <p class="<?php echo $theme; ?>"><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui. Mollit deserunt culpa incididunt laborum commodo in culpa.</em></strong></p>
        </div>
      </div>
    </section>
    <section class="container <?php echo $theme; ?>">
      <div class="row">
        <div class="col-50"> 
          <h3>Máte otázky?</h3>
          <p>Incididunt mollit quis eiusmod tempor voluptate duis eu enim amet excepteur cupidatat magna velit. </p> 
          <p>Velit id ad laborum velit commodo.</p>
          <p>Consectetur laborum aliqua nulla anim cupidatat consectetur est veniam cupidatat.</p>
        </div>
        <div class="col-50 text-right">
          <h3>Napíšte nám</h3>
          <form id="contact" class="<?php echo $theme; ?>" method="POST" action="db/database.php">
            <input type="text" placeholder="Vaše meno" id="meno" name="meno" class="<?php echo $theme; ?>" required><br>
            <input type="email" placeholder="Váš email" id="email" name="email" class="<?php echo $theme; ?>" required><br>
            <textarea placeholder="Vaša správa" id="sprava" name="sprava" class="<?php echo $theme; ?>"></textarea><br>
            <input type="checkbox" name="gdpr" id="gdpr" required>
            <label for="gdpr"> Súhlasím so spracovaním osobných údajov.</label><br>
            <input type="submit" value="Odoslať" class="<?php echo $theme; ?>">
          </form>
        </div>
      </div>
    </section>
  </main>
  <?php include_once 'parts/footer.php'; ?>

  <script src="js/menu.js"></script>
</body>
</html>