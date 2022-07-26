
<?php 
    include("../vendor/autoload.php");

    session_start();

    $gump = new GUMP('fr');

    $gump -> validation_rules([
        'pass' => 'required|min_len,4|max_len,10',
        'mail'=> 'required|valid_email'
    ]);

    $valid_data= $gump-> run(array_map("trim",$_POST));

    if (!$gump->errors()) {
        $valid_data;
        header("location: home.php");
    }

?>

<?php include("mise-en-page/header.php"); ?>

    <h1>Connexion</h1>

    <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" name="send">Se connecter</button>
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