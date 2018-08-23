<?php 

$error = "";
$username = "";
$pass = "";


function clean_txt($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}
if(isset($_POST["submit"]))
{
    if(empty($_POST["usename"]))
    {
        $error.= '<p><label class="text-danger">Please Enter Your Name.<label/></p>';
    }
    else
    {
        $username = clean_text($_POST["username"]);
    }
    
    if(empty($_POST["pass"]))
    {
        $error.= '<p><label class="text-danger">Please Enter Your Password.<label/></p>';
    }
    else
    {
        $pass = clean_text($_POST["pass"]);
    }
    
    if($error == "")
    {
        $file_open = fopen("logindata.csv", "a");
        $no_row = count(file("logindata.csv"));
        if($no_row > 1)
        {
            $no_row = ($no_row -1) +1;
        }
        $form_data = array(
            'sr no'    => $no_row,
            'username' => $username,
            'password' => $pass
        );
        fputcsv($file_open,$form_data);
        $username = "";
        $password = "";
         
    }
    echo $error;
}

?>
