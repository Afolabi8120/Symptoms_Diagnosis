<?php
    
    $pageTitle = "Diagnosis";
    require('core/validate/keyword.php');

    if(isset($_SESSION['user']) AND !empty($_SESSION['user'])){
        
        $getStudent = $globalclass->selectByOneColumn('email','tbluser',$_SESSION['user']);

    }else{
        $_SESSION['ErrorMessage'] = "You Need to Login First";
        header('location: login');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symptoms Diagnosis | Diagnosis</title>
    <link rel="stylesheet" href="assets/css/bot.css">
    <?php include('includes/header.php'); ?>
</head>
<body>
    <div class="wrapper">
        <div class="title">Symptoms Diagnosis System</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <img class="img-40 img-radius " style="height: 100%;width: 100%;border-radius: 50%;top: -1px;left: 1px;position: relative;" height="40" width="40" src="assets/images/1.png" alt="User-Profile-Image">
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I be of help to you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><img class="img-40 img-radius " style="height: 100%;width: 100%;border-radius: 50%;top: -1px;left: 1px;position: relative;" height="40" width="40" src="assets/images/1.png" alt="User-Profile-Image"></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
</body>
</html>


