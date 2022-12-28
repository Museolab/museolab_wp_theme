
<?php

get_header();
get_template_part( 'template-parts/content/content-single' );


?>
<? 

function registration_form() {
  
  //check if user in not log in
  if(!is_user_logged_in()) {

    // if registration is available
    $registration_enabled = get_option('users_can_register');

    if($registration_enabled) {
      $output = registration_fields();
    } else {
      $output = __('Vous ne pouvez pas vous inscrire');
    }
    return $output;
  }
}

// apply_filters( 'register', string $link );
// $link = apply_filters( 'register', $link );


// Filters the HTML link to the Registration or Admin page.
?>

<form action="userRegister.php" method="post" class="userRegister">
    <div class="formRegister">
      <label for="lastname">Votre nom: </label>
      <input type="text" name="lastname" id="lastname" required>
    </div>
    <div class="formRegister">
        <label for="firstname">Votre prénom: </label>
        <input type="text" name="firstname" id="firstname" required>
    </div>
    <div class="formRegister">
      <label for="email">Votre email: </label>
      <input type="email" name="email" id="email" required>
    </div>
    <div class="formRegister">
        <label for="pseudo">Votre pseudo: </label>
        <input type="text" name="pseudo" id="pseudo" required>
    </div>
    <div class="formRegister">
        <label for="password">Mot de passe: </label>
        <input type="password" name="password" id="password" required>
      </div>
    <div class="formRegister">
        <label for="workplace">Entreprise / Institution: </label>
        <input type="text" name="workplace" id="workplace">
    </div>
    <div class="formRegister">
      <input type="submit" value="Valider">
    </div>
</form>
<?php

function wp_create_user( $username, $password, $email) {
	$user_login = wp_slash( $username );
	$user_email = wp_slash( $email );
	$user_pass  = $password;

  //wp_insert_user is used when there's more datas to add than the 3 saw before
	$userdata = compact( 'user_login', 'user_email', 'user_pass' );
	return wp_insert_user( $userdata );
}
?>

<?php

// function new_user_with_metadata($firstname, $lastname,$workplace, $meta=array() )
// {  $meta =array(
//     $firstname = $_POST['firstname'];
//     $lastname = $_POST['lastname'];
//     $email = $_POST['email'];
//     $pseudo = $_POST['pseudo'];
//     $password = $_POST['password'];
//     $workplace = $_POST['workplace'];);

// );
// }
// Connection
$dataBase = new phpMyAdmin('localhost', 'root', 'userData');
if($dataBase->connect_error){
    echo "$dataBase->connect_error";
    die("Echec de la connection : ". $dataBase->connect_error);
} else {
    $sendData = $dataBase->prepare("insert into registration(firstname, lastname, email, pseudo, password, workplace) values(?, ?, ?, ?, ?, ?)");
    $sendData->bind_param("ssssss", $firstname, $lastname, $email, $pseudo, $password, $workplace);
    $executeData = $sendData->execute();
    echo $execval;
    echo "Inscription validée";
    $sendData->close();
    $dataBase->close();
}

// <!-- Hashage de mdp -->

$password_hash;

// <!-- Rediriger vers le compte / utilisateur une fois validé -->
// url('');

// This action hook allows you to access data for a new user 
// immediately after they are added to the database. The user id is passed to hook as an argument.
// do_action( 'user_register', int $user_id, array $userdata );

?>

<?php

get_footer();

?>