
<?php

get_header();

?>

<?php
//custom url redirection

add_filter( 'register_url', 'change_my_register_url' );
function change_my_register_url( $url ) {
    if( is_admin() ) {
        return $url;
    }
    return "/user-login/";
}
?>

<h1>Login</h1>
    <form action="/login.php" method="post">
        <input type="text" name="password" placeholder="password">
        <button type="submit">ok</button>
    </form>

<?php

session_start();

if ($_POST) {

    if (isset($_POST['password'])) {

        if ($_POST['password'] == '123') {

            $_SESSION['authenticated'] = true;

            $url = '/userPost.php';
            header("Location: {$url}", 302);
            exit();
        }
    }
}

get_footer();
?>
<!-- La session en exemple -->
<!-- <?php

session_start();
$_SESSION['foo'] = 123; 
?>-->
