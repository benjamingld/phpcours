<h1>Création de compte utilisateur</h1>
<hr>
    <form method="post">
        <div class="form-group row offset-sm-2 mt-3">
            <div class="col-sm-5">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="civilite" id="" value="1"> Monsieur
                </label>
            </div>
            <div class="col-sm-5">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="civilite" id="" value="2" > Madame
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
            <label for="inputName" class="col-sm-2 col-form-label">Date de naissance</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="naissance"  placeholder="Date de naissance" >
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email"  placeholder="E-mail" >
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password"  placeholder="mot de passe" >
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary" name="soumettre">Soumettre</button>
            </div>
        </div>
    </form>
    <?php 
    if(isset($_POST['soumettre'])){
        if($gump->get_errors_array()){
            echo "<div class=\"alert alert-danger mt-3\">";
            echo "<ul>";
            foreach($gump->get_errors_array() as $value){
                echo "<li>{$value}</li>";
            }
            echo "</ul>";
            echo "</div>";
        }else if($erreur){
            echo "<div class=\"alert alert-danger mt-3\">{$erreur}</div>";
        }else{
            echo "<div class=\"alert alert-success mt-3\">Inscription validé vous pouvez vous connecter</div>";
        }  
    }
    ?>