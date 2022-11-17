<?php
if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}
    $msg=false;
    $salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
    if(isset($_POST['pass']) && isset($_POST['pass'])){
        if (strlen($_POST['who'])<1 || strlen($_POST['pass'])<1){
            $msg="User name and password required";
        } 
        else{
            $current=hash('md5',$salt.$_POST['pass']);
            if($current==$stored_hash){
                header("Location: game.php?name=".urlencode($_POST['who']));
                return;
            }
            else $msg="Incorrect password";
        }
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PANAGIOTIS BALIS - Login Page</title>
    <style>
        p{color:red;}
    </style>
</head>
<body>
    <h1>Please Log In </h1>
    <?php
        if($msg!==false){
            echo("<p>".htmlentities($msg)."</p>\n");
        }
    ?>
    <div>
        <form method="POST">
        <label for="user">User Name</label>
        <input type="text" name="who" id="user"  size="20" value=""><br>
        <label for="pw">Password</label>
        <input type="text" name="pass" id="pw"  size="20" value=""><br>
        <input type="submit" value="Log In" id="button">
        <input type="submit" name="cancel" value="Cancel"><br>
        </form>
    </div>

</body>
</html>