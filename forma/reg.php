<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel='stylesheet' href='style.css'>
	
</head>
<body>
	<?php 
		require "db.php";
		$data = $_POST;
		if(isset($data['do_signup'])){

			$errors = array();
			if (trim($data['login']) == '') {
				$errors[] = 'Введите логин!';
			}
			if (strlen($data['login']) > 15) {
				$errors[] = 'Логин слишком длинный!';
			}
			if ($data['password'] == '') {
				$errors[] = 'Введите пароль!';
			}
			if ($data['password_2'] != $data['password']) {
				$errors[] = 'Пароли не совпадают!';
			}
			if (R::count('users', "login = ?", array($data['login'])) > 0) {
				$errors[] = 'Пользователь с таким логином уже зарегистрирован!';
			}
			if (empty($errors)) {
				$user = R::dispense('users');
				$user->login = $data['login'];
				$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
				R::store($user);
				$_SESSION['logged_user'] = $user;
					header ('Location: index.php');
			}else{
				echo '<div id="errors" style="color: red;">'.array_shift($errors).'</div><hr>';
			}

		}
	 ?>
		
		<h1 class="labe">Регистрация</h1>
	<form class="regis row justify-content-center" method="POST">
  <div class="form-group">

    <label for="login" id="login">Логин:</label>
    <input type="text" name="login" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Ваш логин" value="<?php echo @$data['login']; ?>">
  <div class="form-group">
    <label for="password" id="password">Пароль:</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Ваш пароль" value="<?php echo @$data['password']; ?>">
    <label for="password" id="password">Введите пароль повторно:</label>
    <input type="password" name="password_2" class="form-control" id="password" placeholder="Ваш пароль">
  </div>
  	 <button type="submit" class="btn btn-primary" id="regin" name="do_signup" >Зарегистрироваться</button>
  	
</form>
	<form action="index.php" id="back">
  		<button type="submit" class="btn btn-outline-secondary btn-sm">На главную</button>
  	</form>
</body>
</html>