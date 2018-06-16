<?php
$filename = 'Mode.txt';
// set defaults
if (isset($_POST['Master']))
{
    $master = $_POST['Master'];
    //echo "<script type='text/javascript'>alert('$master');</script>";
    file_put_contents($filename, $master);
    // navigate to new page
    header("Location:index.php");
}
if (isset($_POST['Remote']))
{
    $remote = $_POST['Remote'];
    echo "<script type='text/javascript'>alert('$remote');</script>";
    file_put_contents($filename, $remote);
    // navigate to new page
    header("Location:index.php");
}
// failsafe comment
echo "Mode set error, contact RACWorc support";
