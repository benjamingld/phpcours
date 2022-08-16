<?php include("../configuration/config.global.php"); ?>

<?php include("../controller/verification.php"); ?>

<?php include("../layout/header.php"); ?>


<h1>Création de compte utilisateur</h1>
<hr>
    <form method="post">
        <div class="form-group row offset-sm-2 mt-3">
            <div class="col-sm-5">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="civilite" id="" value="Monsieur"> Monsieur
                </label>
            </div>
            <div class="col-sm-5">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="civilite" id="" value="Madame" > Madame
                </label>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom"  placeholder="Nom"  autocomplete="true">
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="prenom"  placeholder="Prénom" >
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="age"  placeholder="age" >
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="mail"  placeholder="E-mail" >
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary" name="soumettre">Soumettre</button>
            </div>
        </div>
    </form>
    <?php 
    if(isset($_POST['soumettre']) && $gump->get_errors_array()){
        echo "<div class=\"alert alert-danger mt-3\">";
            echo "<ul>";
            foreach($gump->get_errors_array() as $value){
                echo "<li>{$value}</li>";
            }
            echo "</ul>";
        echo "</div>";
    }
    ?>


<?php include("../layout/footer.php");?>


