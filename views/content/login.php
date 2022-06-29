<?php 
// check if login exist
// false = alihkan ke home
if( isset($_SESSION['user']) ){
    if ( $_SESSION['user']['login'] )
        header("Location: dashboard.php");
}

// login
if( isset($_POST['login']) ){
    $check = login($_POST['username'], $_POST['password']);
    if( $check !== null ){
        header("Location: dashboard.php");
    }

    $_SESSION['log_login'] = [
        "error" => true,
        "username" => $_POST['username'],
        "password" => $_POST['password'],
    ];
}
?>
<div class="wrp">
    <?= getNavbar(); ?>
    <div class="content center-align d-flex">
        <divc class="card login-form">
            <div class="card-body">
                <form method="post">
                    <h3>Login - PerpusAKU</h3>

                    <?php if( isset($_SESSION['log_login']) ) : ?>
                        <?php 
                            $username = $_SESSION['log_login']['username'];
                            $pass = $_SESSION['log_login']['password'];    
                        ?>
                        <?php if( $_SESSION['log_login']['error'] ) : ?>
                            <div class="msg text-danger">
                                Login gagal
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="input-form">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" <?= (isset($_SESSION['log_login']['error'])) ? "value='$username'" : "" ?>>
                    </div>
                    
                    <div class="input-form">
                        <label for="passowrd">Passowrd</label>
                        <input type="password" id="passowrd" name="password" <?= (isset($_SESSION['log_login']['error'])) ? "value='$pass'" : "" ?>>
                    </div>

                    <div class="input-submit">
                        <button type="submit" class="btn" name="login">Login</button>
                    </div>
                </form>
            </div>
        </divc>
    </div>
</div>