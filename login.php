<?php
    $title = 'Login';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);

        $result = $user->getUser($username, $new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or password is incorrect! Please try again!</div>';
        }
        else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['user_id'];
            header("Location: viewrecords.php");
        }
    }
?>

    <h1 class="text-center"><?php echo $title ?></h1>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <table class="table table-sm">
            <tr>
                <td><label for="username">Username:* </label></td>
                <td><input type="text" class="form-control" name="username" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    echo $_POST['username'];
                } ?>"></td>
            </tr>
            <tr>
                <td><label for="password">Password:* </label></td>
                <td><input type="password" class="form-control" name="password" id="password"></td>
            </tr>
        </table>
        <div class="d-grid gap-2 mx-auto">
            <input type="submit" value="Log in" class="btn btn-success">
        </div>
    </form>

<?php include_once 'includes/footer.php'; ?>