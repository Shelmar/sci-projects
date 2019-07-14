<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PinGo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel='stylesheet' href='style.css'>

</head>
<body class="d-flex flex-column" bgcolor="#c0c0c0">
 <?php require "db.php"; ?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bd-navbar ">
      <a class="navbar-brand my-0 mr-md-auto" href="index.php">PinGo</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
         <a class="nav-link" href="index.php">Главная</a>
       </li> 
       <li class="nav-item">
        <a class="nav-link" href="how.php">Как работает?</a> 
      </li>
       <li class="nav-item">
        <a class="nav-link" href="about.php">О нас</a>
      </li>
      
      <?php if (isset($_SESSION['logged_user'])) : ?>
              
                
                  
                     <form action="logout.php">
                    <button class="logout btn btn-primary" type="submit">Выйти</button>
                   </form>
               
                  <u id="nick">Вы вошли как: 
                      <?php
                        echo $_SESSION['logged_user']->login;
                        ?>
                   </u>
                  
                  
              <?php else : ?>
               
              <form action="sign.php">
                  <button class="signin btn btn-primary" type="submit">Войти</button>
              </form>
                <form action="reg.php">
                    <button class="reg btn btn-outline-secondary" type="submit">Регистрация</button>
                </form>
              
              <?php  endif; ?>
         
      
      
           
       </ul>
      </div>
    
    
    </nav>
    
</header>
