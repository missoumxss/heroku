<?php

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
