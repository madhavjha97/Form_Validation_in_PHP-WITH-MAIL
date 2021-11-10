<?php
$name_error="";
$email_error="";
$gender_error="";
$website_error="";
$comment_error="";
if (isset($_POST['submit'])){
    //Name Validation Code Start
    if (empty($_POST['name'])){
        $name_error="Name is Required";
    }else{
        $name=Test_User_Input($_POST['name']);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            $name_error="Only letters and white space allowed";
        }
    }
    //Name Validation Code End

    //Email Validation Code Start
    if (empty($_POST['email'])){
        $email_error="Email Id is Required";
    }else{
        $email=Test_User_Input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error="Invalid email format";
        }
    }
    //Email Validation Code End

    //Gender Validation Code Start
    if (empty($_POST['gender'])){
        $gender_error="Gender is Required";
    }else{
        $gender=Test_User_Input($_POST['gender']);
    }
    //Gender Validation Code End

    //Website Validation Code Start
    if (empty($_POST['website'])){
        $website_error="Website is Required";
    }else{
        $website=Test_User_Input($_POST['website']);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)){
            $website_error="Invalid URL";
        }
    }
    //Website Validation Code End

    //Comment Validation Code Start
    if (empty($_POST['comment'])){
        $comment_error="Comment is Required";
    }else{
        $comment=Test_User_Input($_POST['comment']);
    }
    //Comment Validation Code End
}
function Test_User_Input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        .Error_txt{
            color: red;
        }
    </style>
</head>
<body>
<div>
    <fieldset>
     <h2>Form_Validation_in_PHP</h2>

        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="name">Enter Your Name </label>
        <input type="text" name="name" id="name">
           <span class="Error_txt"> <?php echo $name_error; ?> </span>
        <br>

        <label for="email">Enter Your Email Id</label>
        <input type="email" name="email" id="email">
            <span class="Error_txt"> <?php echo $email_error; ?> </span>
        <br>

        <label>Gender</label>
        <input type="radio" name="gender" id="male" value="Male">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="Female" value="Female">
        <label for="Female">Female</label>
            <span class="Error_txt"> <?php echo $gender_error; ?> </span>
        <br>
        <label for="website">Website</label>
        <input name="website" type="url" id="website">
            <span class="Error_txt"> <?php echo $website_error; ?> </span>
        <br>
        <label for="comment">Comment</label><br>
        <textarea name="comment" id="comment"></textarea>
            <span class="Error_txt"> <?php echo $comment_error; ?> </span>
        <br>
        <button type="submit" name="submit" >Submit</button>
        </form>
    </fieldset>

    <fieldset>
        <legend>Your Information</legend>
        <?php
        if (!empty($_POST['name']) && !empty($email) && !empty($gender) && !empty($website) && !empty($comment)){
        echo "Name: " .ucwords($name);
        echo "<br>";

        echo  $email;
        echo "<br>";

            echo  $gender;
            echo "<br>";

            echo  $website;
            echo "<br>";

            echo  $comment;
            echo "<br>";
            $email="madhavjha96@gmail.com";
            $subject="Form Data";
            $body="Name: " .$_POST['name']. "Email id:" .$_POST['email'];
            if (mail($email,$subject,$body)){
                echo "Mai Sent Successfully!";
            }else{
                echo "Mail Not Sent";
            }
        }
        ?>
    </fieldset>
</div>
</body>
</html>
