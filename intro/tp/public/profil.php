<?php include("../configuration/config.global.php"); ?>

<?php include("../controller/verification.php"); ?>


<?php include("../layout/header.php"); ?>


<h1>Profil</h1>
<p>INFO USER</p>

<div class="alert alert-primary" role="alert">
    <strong>Bonjour, <?=htmlspecialchars($_SESSION['mail'])?> <?=htmlspecialchars($_SESSION['pass'])?></strong>
</div>




<?php include("../layout/footer.php");?>
