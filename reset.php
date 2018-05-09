<?php

setcookie('BPLI', '', (time()-2592000), '/', '.'.get_domain(), 0);

echo "'BPLI', '', time()-2592000, '/', '.'.get_domain(), 0"
    $reset = FALSE;

    if(@$_GET['a'] == 'password-code' && @$_POST['email'] == @$_POST['vemail']) {

        if(file_exists(@$_SERVER['MVH_ROOT']."/globals.php")){
            include_once($_SERVER['MVH_ROOT']."/globals.php");
        }

        include(dirname(__FILE__) . '/../../include/php/functions.php');
        $bp = new PasswordMember($_POST['email']);
        $bp->generateReset(true, $GLOBALS['BlogName'], 'http://'.resolve_blog_server($GLOBALS['BlogID']).'/reset/');
        exit;

    }

    if(@$_GET['a'] == 'password-reset') {
        if(file_exists(@$_SERVER['MVH_ROOT']."/globals.php")){
            include_once($_SERVER['MVH_ROOT']."/globals.php");
        }

        if(strlen($_POST['resetpw'])<8 && $_POST['resetpw'] != $_POST['resetpw1']) {
            exit;
        }

	    include(dirname(__FILE__) . '/../../include/php/functions.php');
        $bp = new PasswordMember($_POST['resetemail']);
        if ($bp->checkReset($_POST['resetcode'])) {
            $newpass = $bp->update($_POST['resetpw']);
            setcookie('BPLI', '', (time()-2592000), '/', '.'.get_domain(), 0);
            echo '1';
            return;
        } else {
            echo '0';
            return;
        }
        exit;
    }

    if(isset($_GET['reset']) && $_GET['reset'] != '') {
        $reset = true;
    }

    $code = '';
    $email = '';

    if (isset($_GET['reset'])) {
        $code = urldecode($_GET['reset']);
        $email = urldecode($_GET['email']);
    }
?>

<html>
<head>
    <title>Reset Comment Password</title>
    <script type='text/javascript' src='http://o.aolcdn.com/os/aol/jquery-1.4.3.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var emailPattern = /[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/;

            $("#requestPw").submit(function() {
                $("#rpFeedbackDiv p").html("");
                $("#requestPw input:text").removeClass("focus");
                if(!$("#email").val()) {
                    $("#rpFeedbackDiv p").html("Your Email address shouldn't be blank.");
                    $("#rpFeedbackDiv").show();
                    $("#email").addClass("focus");

                    return false;
                } else if (!$("#email").val().match(emailPattern)) {
                    $("#rpFeedbackDiv p").html("The Email address does not appear valid.");
                    $("#email").addClass("focus");
                    $("#rpFeedbackDiv").show();

                    return false;
                } else if ($("#email").val()!=$("#vemail").val()) {
                    $("#rpFeedbackDiv p").html("The Email addresses should match.");
                    $("#requestPw input:text").addClass("focus");
                    $("#rpFeedbackDiv").show();

                    return false;
                }

                //  Successful stuff here.
                $('#requestSubmit').attr('disabled','disabled').val('Sending...');
                $.post('?a=password-code',  $('#requestPw').serialize() , function() {
                    $('#request').hide();
                    $('#codeDone').show();
                    $('#requestSubmit').attr('disabled','').val('Reset Password');
                });

                return false;
            });

            $("#resetPassword").submit(function() {
                var fields = ['#resetemail', '#resetcode', '#resetpw'];
                var labels = ['Your email address', 'Your reset code', 'Your new password'];

                $("#resetFeedbackDiv p").html("");
                var message = "";
                for(i=0; i<fields.length; i++) {
                    if(!$(fields[i]).val()) {
                        message += labels[i]+" shouldn't be blank.<br/>";
                        $(fields[i]).addClass("focus");
                    }
                }

                if($("#resetpw").val()!==$("#resetpw1").val()) {
                    $("#resetpw, #resetpw1").addClass("focus");
                    message += "Your new passwords should match.<br/>";
                }

                if($("#resetpw").val().length < 8) {
                    $("#resetpw, #resetpw1").addClass("focus");
                    message += "Your new password should be at least 8 characters.<br/>";
                }

                if(!$("#resetemail").val().match(emailPattern)) {
                    message += "Your email address does not appear to be valid.<br/>";
                }

                if(message.length) {
                    $("#resetFeedbackDiv p").html(message);
                    $("#resetFeedbackDiv").show();
                    return false;
                }

                //  Successful stuff here.
                $.post('?a=password-reset',  $('#resetPassword').serialize() , function(res) {
                    if(res == '1') {
                        $('#resetDone').show();
                        $('#reset').hide();
                    } else {
                        alert("I'm sorry, but the information you have provided is incorrect, or, the recovery code has already been used. Please check your recovery code and try again. If you feel this is an error, select the 'Recovery Code' option below to try again.");
                    }
                });

                return false;
            });
        });

    </script>

    <style type="text/css"> 
        body { font-family: Arial, helvetica, sans-serif; font-size: 10pt; margin: 0; padding: 0; background-color: #FEFEFE;}
        p { margin: 0.5em; vertical-align: middle; }
        input { color: #222; background: #eee; border: 1px solid #444; padding: 2px; }
        input.focus { background: #fdd; }
        button { color: #ccc; border: 2px solid #444; background: #222; }
        button:hover { color: #fff; border: 2px solid #777; }
        #requestPW label { width: 6em; }
        #resetPassword label { width: 10em; }
        label { float: left; text-align: right; margin-right: 0.5em; display: block; }
        #requestSubmit { margin-left: 8em; }
        #resetSubmit { margin-left: 10.5em; }
        #rpFeedbackDiv, #resetFeedbackDiv { display: none;  overflow: hidden;}
        #rpFeedbackDiv p, #resetFeedbackDiv p { padding: 5px; border: 2px solid red; color: #a33; background: #fee; float: left; }
        #header { background: #fff; padding: 5px; border-bottom: 1px dotted #333; }
        #request span { display: block; margin-left: 7.2em; margin-top: 2em; }
        #resetDone h2 { font-size: 18px; font-weight: normal; } 
    </style>

</head>
<body style="background-color: #EEE;">

    <div style="width: 320px; margin: 10 auto; padding: 10px; background-color: #FFF; border: 2px solid #000;">

        <div id="header"><img src="/media/feedlogo.gif" /></div>

        <div id="request" <? if ($reset) { echo ' style="display: none;" '; } ?>>
            <h2>Request Password Reset Code</h2>
            <div id="rpFeedbackDiv"><p></p></div>
            <form name="requestPw" id="requestPw">
                <p><label for="email">Email</label><input id="email" name="email" type="text" autocomplete="off" /></p>
                <p><label for="vemail">Verify Email</label><input id="vemail" name="vemail" type="text" autocomplete="off" /></p>

                <p><button type="submit" id="requestSubmit">Request Password Code</button></p>
            </form>

            <span><a href="" onclick="$('#reset').show();$('#request').hide(); return false;" >I already have a Code</a></span>
        </div>

        <div id="codeDone" style="display: none;">
            <h4>A code has been sent to your email. Once you have received it, you can reset your account <a href="#" onclick="$('#codeDone').hide();$('#reset').show();return false;";>here...</a></h4>
        </div>

        <div id="reset" <? if (!$reset) { echo ' style="display: none;" '; } ?>>
            <h2>Reset Password</h2>
            <div id="resetFeedbackDiv"><p></p></div>
            <form name="resetPassword" id="resetPassword">
                <p><label for="resetemail">Email</label><input id="resetemail" name="resetemail" type="text" value="<? echo $email?>" autocomplete="off" /></p>
                <p><label for="resetcode">Reset Code</label><input id="resetcode" name="resetcode" type="text" value="<? echo $code ?>" autocomplete="off" /></p>
                <p><label for="resetpw">New Password</label><input id="resetpw" name="resetpw" type="password" autocomplete="off" /></p>
                <p><label for="resetpw1">Verify New Password</label><input id="resetpw1" name="resetpw1" type="password" autocomplete="off" /></p>
                <p><button type="submit" id="resetSubmit">Reset Password</button></p>
            </form>

            <span><a href="" onclick="$('#reset').hide();$('#request').show(); return false;" >Request Another Code</a></span>
        </div>

        <div id="resetDone" style="display: none;">
            <h2>Your password has been reset.</h2>
        </div>

    </div>

</body>
</html>

