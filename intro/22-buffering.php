<?php
    ob_start();

    //tableau de 0 à 100 par pas de 10
    $list = range(0,100,10);
    ?>
    <ul class="list-group">
        <?php foreach($list as $number) : ?>
            <li class="list-group-item"><?=$number?></li>
        <?php endforeach; ?>
    </ul>

<?php
    $content = ob_get_clean();
    ob_start();
        echo "Ma page de mon site";
    $title = ob_get_clean();

    ob_start();
        echo "Mon site est trop cool";
    $desc = ob_get_clean();

?>

<!doctype html>
<html lang="en">
  <head>
    <title><?=$title?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$desc?>">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Jumbo heading</h1>
            <p class="lead">Jumbo helper text</p>
            <hr class="my-2">
            <p>More info</p>
            <p class="lead">
                <?=$content?>
            </p>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>