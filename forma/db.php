<?php 
	require "libs/rb-mysql.php";
	 R::setup( 'mysql:host=localhost;dbname=users',
        'root', '' );
	 session_start();
 ?>