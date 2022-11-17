<?php
if(!isset($_GET['name']) || strlen($_GET['name']) < 1 ){ //strlen=0 an string empty
    die("Name parameter missing");
}
if ( isset($_POST['logout'] ) ) {
    // Redirect the browser to login.php
    header("Location: index.php");
    return;
}
$human=isset($_POST["human"])? $_POST['human']+0 :-1; //0 rock 1 paper 2 scissors
$computer=rand(0,2);
$names=array('Rock','Paper','Scissors');
function check($computer,$human){
    if($computer==$human)
        return "Tie";
    elseif(($computer==0 && $human==1)||($computer==1 && $human==2)||($computer==2 && $human==0))
        return "You Win";
    else
        return "You Lose";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PANAGIOTIS BALIS RPS Game</title>
    <style>
    </style>
</head>
<body>
    <h1>Rock Paper Scissors</h1>
    <?php
        if ( isset($_REQUEST['name']) ) {
            echo "<p>Welcome: ";
            echo htmlentities($_REQUEST['name']);
            echo "</p>\n";
        }
    ?>
<form method="post">
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>
<pre>
<?php
if($human==-1){
    print "Please select a strategy and press Play.\n";
}
elseif($human==3){
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }

}
else
    print "Your Play="."$names[$human]"." Computer Play="."$names[$computer]"." Result=".check($computer,$human);
?>
</pre>

</body>
</html>
