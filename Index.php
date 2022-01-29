<?php
	session_start();


    $helper = array_keys($_SESSION);
    foreach ($helper as $key){
		unset($_SESSION[$key]);
		
		
    }
	
	$_SESSION['token'] = bin2hex(random_bytes(24));
?>

<html>
<head>
	<title>Ana Sayfa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="login_style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//assets.yemeksepeti.com/styles/ysapp.css?v=9c6a0f08a127372293fd649011c8e6dc7127e983" rel="stylesheet"> 
</head>
<body class="sticky">
<header class="main">
	<div class="inner">
		<div class="container">
			<div class="row form-group">
				<div class="col-md-4 logoSection"> 
					<a href="Index.php" class="logo2"></a> 
				</div> 
				<!--<div class="col-sm-4 form">
					<select class="form-control" id="city" name="city" onchange="getDistricts(this.value)">
						<option value="City">İl</option>
						<?php include 'action.php'; echo $output;?>
					</select>
				</div>
				<div class="col-sm-4 form	">
					<select class="form-control" id="district">
						<option>İlçe</option>
					</select>
				</div>-->		
			</div>
			<div class="container ys-container ys-main ys-Login"> 
				<div class="row"> 
					<div class="col-md-16 "> 
						<div class="login"> 
							<div class="container"> 
								<div class="row"> 
									<div class="col-md-16"> 
										<div class="col-16-9"> 
											<div class="login-panel"> 
												<h3>Giriş Yap</h3> <br> 
												<form id="login-form" class="form-horizontal" role="form" action="login.php" method="post"> 
													<div class="form-group"> 
														<label for="inputEmail3">Kullanıcı Adı / E-Posta</label> 
														<div> 
															<input type="text" class="form-control" id="inputEmail3" name="UserName" value=""> 
														</div> 
													</div> 
													<div class="form-group"> 
														<label for="inputPassword3">Şifre</label> 
														<div> 
															<input type="password" class="form-control" id="inputPassword3" name="Password"> 
														</div> 
													</div> 
													<div class="form-group"> 
														<button type="submit" class="ys-btn ys-btn-primary ys-btn-lg ys-btn-block" disabled="disabled">ÜYE GİRİŞİ</button> 
													</div>
													<?php if (isset($_GET['error'])) { ?><p class="error"><?php echo $_GET['error']; ?></p><?php } ?>
													<input type="hidden" value="/siparis" name="Referrer"> 
													<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
												</form> 
											</div> 
										</div> 
										<div class="col-16-7 left-side"> 
											<h3>Üyeliğiniz yok mu?</h3> <br> 
											<div class="info-container"> 
												<div class="info-item">
													<div class="info-text" style="font-size:15px;"> 
														<b>Korkmayın! Çünkü biz hacklenmiyoruz</b> 
														<div>Sitemiz her türlü kötü amaçlı saldırıya karşı korunmaktadır.
														</div> 
													</div> 
												</div><br>
												<div class="info-item"> 
													<div class="info-icon">
														<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><g><g><path fill="#333" d="M18.42 22.953l.663.665 2.652-2.66-.663-.664zm3.305-4.648l-.662-.663-5.294 5.303.662.663zm-2.642.002l-.663-.665-2.65 2.66.662.664zM4.688 1.875h20.625c.52 0 .937-.42.937-.938A.936.936 0 0 0 25.312 0H4.688a.938.938 0 0 0 0 1.875zM7.5 23.438a.938.938 0 0 0 1.875 0 .923.923 0 0 0-.469-.795v-2.16a.923.923 0 0 0 .469-.795.938.938 0 0 0-1.875 0c0 .344.194.63.469.794v2.16a.927.927 0 0 0-.469.796zM24.584 8.857a.463.463 0 0 1-.626-.21l-1.875-3.75a.467.467 0 0 1 .208-.629.471.471 0 0 1 .63.21l1.875 3.75a.468.468 0 0 1-.212.629zm-3.741-.01a.463.463 0 0 1-.635-.184l-2.044-3.75a.468.468 0 0 1 .821-.45l2.044 3.75c.12.226.04.512-.186.635zm-5.374-.41a.469.469 0 1 1-.938 0v-3.75a.468.468 0 1 1 .938 0zm-3.798-3.54l-1.875 3.75a.473.473 0 0 1-.63.21.467.467 0 0 1-.209-.628l1.875-3.75a.47.47 0 0 1 .839.417zm-3.75 0l-1.875 3.75a.473.473 0 0 1-.63.21.467.467 0 0 1-.209-.628l1.875-3.75a.472.472 0 0 1 .629-.21.47.47 0 0 1 .21.627zM26.25 2.811H3.75L0 10.313h30zM10.303 15.806v12.319H4.687v-12.32a3.742 3.742 0 0 0 2.808-3.618 3.742 3.742 0 0 0 2.808 3.619zm8.447.132c2.073 0 3.75-1.68 3.75-3.75a3.743 3.743 0 0 0 2.813 3.618v12.319H11.25V15.937c2.073 0 3.75-1.679 3.75-3.75 0 2.071 1.68 3.75 3.75 3.75zM0 12.188a3.743 3.743 0 0 0 2.813 3.618v12.319H.937a.938.938 0 0 0 0 1.875h28.125c.52 0 .938-.42.938-.938a.936.936 0 0 0-.938-.937h-1.875v-12.32A3.743 3.743 0 0 0 30 12.188v-.937H0z"></path></g></g></svg>
													</div> 
													<div class="info-text"> 
														<b>Semtindeki Restoranlar Burada</b> 
														<div>Adresine gönderim yapan restoranları gör,özel promosyonlardan yararlan.
														</div> 
													</div> 
												</div> 
												<div class="info-item"> 
													<div class="info-icon">
														<svg xmlns="http://www.w3.org/2000/svg" width="30" height="33" viewBox="0 0 30 33"><g><g><path fill="#333" d="M26.415 20.996a2.66 2.66 0 0 0-2.684 2.426c-.006.059-.006.118-.006.176 0 .689.275 1.35.764 1.836.488.487 1.151.76 1.842.76h2.307a.887.887 0 0 1 .884.885v2.753a2.757 2.757 0 0 1-.808 1.958c-.52.52-1.225.811-1.96.811H3.541a2.773 2.773 0 0 1-1.963-.81 2.757 2.757 0 0 1-.809-1.959V14.968a5.28 5.28 0 0 1 3.175-4.832.302.302 0 0 1 .416.197c.027.093.053.186.086.278l.628 1.807a.296.296 0 0 1-.142.37 2.472 2.472 0 0 0-1.27 1.592.153.153 0 0 0 0 .036.153.153 0 0 0 .16.154h22.933c.736 0 1.441.292 1.96.811.52.52.811 1.223.81 1.957v2.77a.882.882 0 0 1-.884.885H26.41zm.008 0h-.008.008zm3.403-6.969a.26.26 0 0 1-.408.093 4.153 4.153 0 0 0-2.667-.966h-2.3a.29.29 0 0 1-.29-.287 2.788 2.788 0 0 1 2.231-2.787l-.865-2.497-.45-1.297a2.804 2.804 0 0 1-2.772-.162 2.79 2.79 0 0 1-1.21-1.765l-5.337 1.86-2.057.731-2.66.925c.361.764.357 1.649-.01 2.41a2.81 2.81 0 0 1-1.88 1.512l.449 1.297v.022H7.197a.372.372 0 0 1-.372-.253L5.663 9.518a2.349 2.349 0 0 1 1.449-2.973l5.783-2.007 2.068-.717L23.425.885a2.347 2.347 0 0 1 2.971 1.45l3.476 10.034c.188.54.17 1.132-.048 1.66zM16.564 8.46a2.793 2.793 0 0 1 3.566 1.05 2.768 2.768 0 0 1-.657 3.646h-3.428a2.77 2.77 0 0 1-.921-1.281 2.772 2.772 0 0 1 1.44-3.415z"></path></g></g></svg>
													</div> 
													<div class="info-text"> 
														<b>Dilediğin Gibi Öde</b> 
														<div>İster online, ister kapıda nakit ya da kredi kartıyla!
														</div> 
													</div> 
												</div> 
											</div> 
											<div class="ys-userDetails"> 
												<a href="sign_up.php" class="ys-btn ys-btn-primary ys-btn-lg ys-btn-block">ÜYE OL</a> 
											</div> 
										</div> 
									</div> 
								</div> 
							</div> 
						</div> 
					</div> 
				</div>
			</div>
		</div>
	</div>
</header>
<script>
/*
var xhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
			if(this.readyState==4 && this.status==200) {
				document.getElementById('city').innerHTML=this.responseText;
			}
		};
		xmlhttp.open("POST","action.php",true);
		xmlhttp.send();
*/
/*function isDisabled(UserName,Password){
	if(UserName=="" && Password==""){
		return "disabled";
	}
	
}*/
$("input[type='text'], input[type='password']").on("keyup", function(){
    if($("input[type='text']").val() != "" && $("input[type='password']").val() != "" ){
        $("button[type='submit']").removeAttr("disabled");
    }
});
function getDistricts(str) {
	if(str=="") {
		return;
	} else {
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if(this.readyState==4 && this.status==200) {
				document.getElementById('district').innerHTML=this.responseText;
			}
		};
		xmlhttp.open("POST","get_districts.php",true);
		xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xmlhttp.send("city="+str);
	}
}
/*$(document).ready(function() {
$('#city').on('change', function() {
var city = this.value;
$.ajax({
url: "get_districts.php",
type: "POST",
data: {
selected_city: city
},
cache: false,
success: function(districts){
$("#district").html(districts);
}
});
});    
});*/
</script>
</body>
</html>