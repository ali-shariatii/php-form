<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-form</title>
</head>
<body>
<?php
    $ErrMessg = "";
    $confMessg = "";
    $name = $email = $phone = $subject = $message = "";
    

    if($_SERVER["REQUEST_METHOD"] == "POST") {        
        if(empty($_POST['name'])){
            $ErrMesg = "Please fill all the required fields including at least one contact info.";
        } else {
            $name = test_input($_POST['name']);
        }

        if(empty($_POST['email'])) {
            if (empty($_POST['phone'])) {
            $ErrMesg = "Please fill all the required fields including at least one contact info.";
            } else {
                $phone = test_input($_POST['phone']);
                $email = test_input($_POST['email']);
            }
        }
        
        if(empty($_POST['subject'])){
            $ErrMesg = "Please fill all the required fields including at least one contact info.";
        } else {
            $name = test_input($_POST['subject']);
        }

        if(empty($_POST['message'])){
            $ErrMesg = "Please fill all the required fields including at least one contact info.";
        } else {
            $name = test_input($_POST['message']);
        }

        $mailTo = "info@alishariatii.com";
        $headers = "From: ".$email;
        $body = $name." has sent a message via your portfolio online form."."\n\n"."Sender's contact info:".".\n"."Email: ".$email.".\n"."Phone: ".$phone.".\n"."Message: ".$message;

        mail($mailTo, $subject, $body, $headers);

        $confMessg = "successful!";
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);  
        return $data;     
    }
    
?>
<span><?php echo $confMessg; ?></span>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="text" placeholder="Name*" name="name" value="<?php echo $name?>">
    <input type="email" placeholder="Email*" name="email" value="<?php echo $email?>">
    <input type="number" placeholder="Phone*" name="phone" value="<?php echo $phone?>">
    <input type="text" placeholder="Subject*" name="subject" value="<?php echo $subject?>">
    <textarea placeholder="Your message*" name="message" value="<?php echo $message?>"></textarea>
    <button type="submit" name="submit">SUBMIT</button><br><span><?php echo $ErrMessg; ?></span>
</form>
</body>
</html>