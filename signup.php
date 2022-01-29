<?php
	/*$email=$_POST['Email'];
	$uname=$_POST['UserName'];
	$password=$_POST['Password'];
	$password_again=$_POST['RepeatPassword'];
	$name=$_POST['FirstName'];
	$surname=$_POST['LastName'];
	$city=$_POST['AreaId'];
	
	echo $city;*/
session_start();
if (hash_equals($_SESSION['token'], $_POST['token'])) {
	include 'config.php';
	if (isset($_POST['Email']) && isset($_POST['UserName']) && isset($_POST['Password']) && isset($_POST['RepeatPassword']) && isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['AreaId'])) {

		function validate($data){
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
		$email = validate($_POST['Email']);
		$uname = validate($_POST['UserName']);
		$password = validate($_POST['Password']);
		$password_again = validate($_POST['RepeatPassword']);
		$name=validate($_POST['FirstName']);
		$surname=validate($_POST['LastName']);
		$city=validate($_POST['AreaId']);
		
		$email=str_replace("'","*****",$email);
		$uname=str_replace("'","*****",$uname);
		$password=str_replace("'","*****",$password);
		$password_again=str_replace("'","*****",$password_again);
		$name=str_replace("'","*****",$name);
		$surname=str_replace("'","*****",$surname);
		$city=str_replace("'","*****",$city);
		
		if (empty($email)) {
			header("Location: sign_up.php?error=Email gerekli");
			exit();
		}else if (empty($uname)) {
			header("Location: sign_up.php?error=Kullanıcı adı gerekli");
			exit();
		}else if(empty($password)){
			header("Location: sign_up.php?error=Şifre gerekli");
			exit();
		}else if(empty($password_again)){
			header("Location: sign_up.php?error=Tekrar şifresi gerekli");
			exit();
		}else if(empty($name)){
			header("Location: sign_up.php?error=Ad gerekli");
			exit();
		}else if(empty($surname)){
			header("Location: sign_up.php?error=Soyadı gerekli");
			exit();
		}else if($city == 'İl'){
			header("Location: sign_up.php?error=Şehir gerekli");
			exit();
		}
		$user_exist="SELECT * FROM users WHERE email='$email' or uname='$uname'";
		$user_exist_ar=mysqli_query($conn,$user_exist)or trigger_error(mysqli_error($conn)." ".$user_exist);
		if(mysqli_num_rows($user_exist_ar)>0)
		{
			header("Location: sign_up.php?error=Bu kullanıcı adı veya eposta başka bir kullaıcıya ait. Lütfen başka bir kullanıcı adı veya eposta ile tekrar deneyin.");
			exit();
		}else{
			if($password == $password_again){
				$city_sql="SELECT city_id FROM cities WHERE city='$city'";
				$city_id_ar=mysqli_query($conn,$city_sql)or trigger_error(mysqli_error($conn)." ".$city_sql);
				if(mysqli_num_rows($city_id_ar)==1){
					$city_id_row=mysqli_fetch_assoc($city_id_ar);
					$city_id=$city_id_row['city_id'];
					$sql = "INSERT INTO users (user_id, uname, name, surname, password, email, city_id) VALUES (NULL, '$uname', '$name', '$surname', '$password', '$email', '$city_id')";
					//$result = mysqli_query($conn, $sql);
					$user = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn)." ".$sql);
					//$user=$conn->query($sql);
					header("Location: Index.php");
					exit();	
				}
			}else{
				header("Location: sign_up.php?error=Şifre, tekrar şifre ile uyuşmuyor");
					exit();	
			}
			/*if(!$user){
				header("Location: MainPage.html?error=Query Error");
					//echo $user;
					exit();	
			}elseif(mysqli_num_rows($user) == 0){
					header("Location: MainPage.html?error=Incorect User name or password");
					//echo $user;
					exit();	
			}else{
				if (mysqli_num_rows($user) === 1) {
					$row = mysqli_fetch_assoc($user);
					if ($row['uname'] === $uname_email && $row['password'] === $password) {
						echo "Logged in!";
						$_SESSION['uname'] = $row['uname'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['user_id'] = $row['user_id'];
						header("Location:deee.html");
						exit();
					}else{
						header("Location: index.php?error=Incorect User name or password");
						exit();
					}
				}
				else{
					echo 1;
				}
			}*/
		}
	}
	else{
		header("Location: index.php");
		exit();
	}
}
else{
	echo "Risk of CSRF attack";
}
?>