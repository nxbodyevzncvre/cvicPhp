<!DOCTYPE html>


<?php
require_once 'classes/QnA.php';
use otazkyodpovede\QnA;

$theme = isset($_GET['theme']) && $_GET['theme'] === 'dark' ? 'dark' : 'light';

$qna = new QnA();
$qnaData = $qna->getAllQuestionsAndAnswers();



?>


<html lang="sk" class="<?php echo $theme; ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja stránka</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/accordion.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="<?php echo $theme; ?>">
<?php include_once 'parts/nav.php'?>

  <main class="<?php echo $theme; ?>">
      <section class="banner <?php echo $theme; ?>">
        <div class="container">
          <h1>Q&A</h1>
        </div>
      </section>
      <section class="container <?php echo $theme; ?>">
        <div class="row">
          <div class="col-100 text-center">
            <p class="<?php echo $theme; ?>"><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui. Mollit deserunt culpa incididunt laborum commodo in culpa.</em></strong></p>
          </div>
        </div>
      </section>
      <section class="container <?php echo $theme; ?>">
        <?php
        foreach ($qnaData as $row) {
          echo '<div class="accordion ' . $theme . '">
            <div class="question">' . htmlspecialchars($row['otazka']) . '</div>
            <div class="answer">' . htmlspecialchars($row['odpoved']) . '</div>
          </div>';
        }
        ?>
      </section>
    </main>
  <?php include_once 'parts/footer.php'; ?>

<script src="js/accordion.js"></script>
<script src="js/menu.js"></script>
</body>
</html>