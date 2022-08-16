<?php include("../configuration/config.global.php"); ?>

<?php include("../controller/verification.php"); ?>

<?php include("../layout/header.php"); ?>


<h1>Connexion compte utilisateur</h1>
<hr>

    <form method="post">
        <div class="form-group row mt-3">
            <label for="mail" class="col-sm-2 col-form-label">E-mail : (test@test.fr)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="mail"  id="mail" placeholder="E-mail">
            </div>
        </div>
        <div class="form-group row  mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">Password (123456)</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="pass"  placeholder="Mot de passe">
            </div>
        </div>
        <div class="form-group row  mt-3">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary" name="connexion">Se connecter</button>
            </div>
        </div>
    </form>
    <?php 
    if(isset($_POST['connexion']) && ($gump->get_errors_array() || isset($erreur))){
        echo "<div class=\"alert alert-danger mt-3\">";
            if($gump->get_errors_array()) {
                echo "<ul>";
                foreach($gump->get_errors_array() as $value){
                    echo "<li>{$value}</li>";
                }
                echo "</ul>";
            }
            if(isset($erreur)){
                echo $erreur;
            }
        echo "</div>";
    }
    ?>


<?php include("../layout/footer.php");?>