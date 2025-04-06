<?php
    /*
    ** Define a couple of functions for
    ** starting and ending an HTML document
    */
    
    /*
    ** test for username/password
    */
    if( ( isset($_SERVER['PHP_AUTH_USER'] ) && ( $_SERVER['PHP_AUTH_USER'] == "085640332823" ) ) &&
      ( isset($_SERVER['PHP_AUTH_PW'] ) && ( $_SERVER['PHP_AUTH_PW'] == "admin" )) )
    {
        //startPage();

        //print("You have logged in successfully!<br>\n");
        $_SESSION['login'] = 1;
        $_SESSION['nama'] = 'Admin';
        $_SESSION['wa'] = '085640332823';
        $this->redirect('/');

        //endPage();
    }
    else
    {
        //Send headers to cause a browser to request
        //username and password from user
        header("WWW-Authenticate: " .
            "Basic realm=\"Admin's Protected Area\"");
        header("HTTP/1.0 401 Unauthorized");

        //Show failure text, which browsers usually
        //show only after several failed attempts
        print("This page is protected by HTTP " .
            "Authentication.<br>\n");
    }
?>