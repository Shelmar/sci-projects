<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>SignIn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel='stylesheet' href='style.css'>
	
</head>
<body>
	<?php 
		require "db.php";
		$data = $_POST;
		if (isset($data['do_login'])) {
			$errors = array();
			$user = R::findOne('users', 'login = ?', array($data['login']));

			if ($user) {
				if (password_verify($data['password'], $user->password)) {
					$_SESSION['logged_user'] = $user;
					header ('Location: index.php');
   					
				}else{
					$errors[] = 'Пароль введён неверно!';
				}
			}else{
				$errors[] = 'Пользователь с таким логином не найден!';
			}
			if (!empty($errors)) {
				echo '<div id="errors" style="color: red;">'.array_shift($errors).'</div><hr>';
			}
		}

	 ?>

	<h1 class="labe">Вход</h1>
	<form class="signing row justify-content-center" method="POST">
  <div class="form-group">

    <label for="login" id="login">Логин:</label>
    <input type="text" name="login" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Ваш логин" value="<?php echo @$data['login']; ?>">
  <div class="form-group">
    <label for="password" id="password">Пароль:</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Ваш пароль">
  </div>
  <button type="submit" name="do_login" class="btn btn-primary" id="signing">Войти</button>
  
	  	
</form>
<form action="index.php" id="back">
  		<button type="submit" class="btn btn-outline-secondary btn-sm">На главную</button>
  	</form>
  	
  		<a id="toreg" href="reg.php">Ещё не зарегистрированы?</a>
  	

</body>
</html>