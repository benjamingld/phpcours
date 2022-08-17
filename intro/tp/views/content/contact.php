<h1>Formulaire de contact</h1>
<hr>
    <form method="post">
        <div class="form-group row mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom"  placeholder="Nom">
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="prenom"  placeholder="Prénom">
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="inputName" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="mail" class="form-control" name="mail"  placeholder="E-mail">
            </div>
        </div>
        <div class="form-group mt-3">
          <label for="">Votre demande</label>
          <textarea class="form-control" name="demande" id="" rows="3"></textarea>
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
        }else{
            echo "<div class=\"alert alert-success mt-3\">Demande envoyer</div>";
        }   
    }
    ?>