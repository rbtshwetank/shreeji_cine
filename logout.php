<?php
  session_start(); /* Starts the session */
  session_destroy(); /* Destroy started session */

  header("location:admin_login.php");  /* Redirect to login page */
  exit;
