<?php include("../vendor/autoload.php"); ?>

<?php
$gump = new GUMP("fr");

// set validation rules
$gump->validation_rules([
    'civilite'    => 'required|contains,Monsieur;Madame',
    'nom'         => 'required|min_len,3|max_len,10',
    'prenom'      => 'required|min_len,3|max_len,10',
    'age'         => 'required|integer',
    'mail'       => 'required|valid_email'
]);


// on success: returns array with same input structure, but after filters have run
// on error: returns false
$valid_data = $gump->run(array_map("trim",$_POST));

//SI IL N'Y A PAS D'ERREUR
if (!$gump->errors()) {
    $valid_data;   
    header("location: connexion.php");
}

?>


<?php include("mise-en-page/header.php"); ?>


<h1>Inscription</h1>
<hr>
    <form method="POST">
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
                <button type="submit" class="btn btn-primary" name="send">Envoyer</button>
            </div>
        </div>
    </form>


    <?php 
    if(isset($_POST['send']) && $gump->get_errors_array()){
        echo "<div class=\"alert alert-danger mt-3\">";
            echo "<ul>";
            foreach($gump->get_errors_array() as $value){
                echo "<li>{$value}</li>";
            }
            echo "</ul>";
        echo "</div>";
    }
    ?>


<?php include("mise-en-page/footer.php");?>
