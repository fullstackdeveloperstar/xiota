<?php
//$_SESSION['user']=$_GET['user'];
//$_SESSION['password']=$_GET['password'];

// set defaults
$user = $_POST['user'];
$password = $_POST['password'];
// debug
//echo "<script type='text/javascript'>alert('$user');</script>";
//echo "<script type='text/javascript'>alert('$password');</script>";

// set filename to directory and file
// check os
if (DIRECTORY_SEPARATOR == '/')
{
        // unix, linux, mac
        $filename = 'UserData.txt';
}
else
{
        // windows
        $filename = 'c:\\wamp\\www\\UserData.txt';
}

// does it exist...if not...exit
if (!file_exists($filename)) {
    echo "The file $filename does not exist, failure and exiting....";
        exit(1);
}
// get all the lines in the file
$lines = file($filename, FILE_IGNORE_NEW_LINES);

// loop through all files
foreach ($lines as $line)
{
    // debug
    //echo "<script type='text/javascript'>alert('$line');</script>";
    //flush();
    //echo "hit";
    // break apart the line into 2 arguments ..i.e. arr[0] is login and arr[1] is password
    $arr = explode('|', $line);
    // is there a match
    //debug
    //echo "<script type='text/javascript'>alert('$arr[0].$arr[1]');</script>";
    //flush();

//    if (isset($_POST['user']) && isset($_POST['password']))
    if (($arr[0] == $user) && ($arr[1] == $password))
    {
        // yes - -this should go to the main page now
        // debug
        //echo "MATCH - user/pass correct<br/>";
        // navigate to new page
        header("Location:menu.html");
        exit(0);
    }
}

// redirect back to login as if failed
header("Location:index.php");

