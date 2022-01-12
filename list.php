<?php
		session_start();

        include "config.php";
                    
        if($conn->connect_error)
        {
            echo "connection_aborted";
        }
        //else echo "success";   
        
        if(isset($_SESSION["cart"]) && isset($_SESSION["basket_res_id"]))
        {
            $item_array = $_SESSION["cart"];
            $basket_res_id = $_SESSION["basket_res_id"];

            if(!empty($_SESSION['cart']))
            {

                $query = "SELECT * FROM restaurants WHERE res_id='$basket_res_id'";
                $result = mysqli_query($conn, $query);

                if ($result->num_rows == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['basket_res_name']= $row['name'];
                    $_SESSION['basket_res_address']= $row['address'];
                    $basket_res_name = $_SESSION['basket_res_name'];
                    $basket_res_address = $_SESSION['basket_res_address'];
                } else {
                    echo "hata!";
                }
            }
        }
        
        
        
        




        $user_name=$_SESSION['name'];
        $city_id=$_SESSION['city_id'];
		$city_id=str_replace("'","*****",$city_id);
        $query = "SELECT * FROM cities WHERE city_id='$city_id'";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['city_name']= $row['city'];
            $city_name = $_SESSION['city_name'];
          } else {
            echo "hata!";
          }
        
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <title>List</title>
    <style type="text/css">
        .top-state {
            background-color: #eff0f2;
            min-height: 100px;
            width: 100%;
            position: relative;
            overflow: hidden;
            background-position: 100%;
            background-attachment: fixed;
        }
        .top-state .top-image img, .top-state>img {
            position: absolute;
            right: 0;/*sağa yaslama*/
            top: -40px;/*yukarı yaslama*/
        }

        img {
            border: 0;
            vertical-align: middle;
        }

        body {
            background-color: #fff;
            font-size: 11px;
            font-family: Verdana,Geneva,sans-serif;
            color: #333;
            position: relative;
            height: 100%;
         
        }

        .container {
                width: 1009px;
        }

        .text {
            font-weight: 600;
            width: 100%; 
            text-align: center; 
            border-bottom: 1px solid #000; 
            line-height: 0.1em;
            margin: 10px 0 20px; 
        } 

        .text span { 
            background:#fff; 
            padding:0 10px; 
                
         }

        .point{
            border-radius: 2px;
            font-size: 10px;
            padding: 2px 5px;
            height: 18px;
            margin: 2px 0 0;
            background-color: #29cc81;
            background-clip: padding-box;
            color: #fff;
            font-weight: 700;
            min-width: 31px;
            font-family: Open Sans,sans-serif;
            text-align: center;
            display: inline-block;
        }
        .logo{
            max-width: 50px;
            max-height: 50px;
            min-height: 50px;
            min-width: 50px;
            padding: 3px;
            border: 1px solid #c5c5c5;
            border-radius: 5px;
            display: flex;
            object-fit: scale-down;
            margin: 0;
            width: 100%;
        }
        .ys-leftColumn{
            min-height: 550px;
        }
        .col-md-4{
            position: relative;
            min-height: 1px;
            padding-left: 6px;
            padding-right: 6px;
        }
  
   
        @media (min-width: 1px){
            .col-md-4 {
                
                float: left;
            }
        }

        .modul1_header{
            padding: 10px 11px;
            background-color: #fa0050;
            color: #fff;
            font-size: 12px;
            font-family: Open Sans,sans-serif;
            font-weight: 700;
            line-height: 15px;
        }
        .user_img{
            width: 40px;
            height: 40px;
            border: 1px solid #d5d5d5;
            border-radius: 3px;
        }
        .menu-name:hover{
            color:#fa0050;
        }
        .btn-userinfo:hover{
            opacity: 0.7;
        }
        .dropdown-item{
            font-size: 12px;
            font-weight: 600;
        }
        .res_name{
            font-size: 13px;
            color:black;
            font-weight: 600;
            text-decoration:none;
            color:#fa0050;
        }
        .res_name:hover{

            color:orange;

        }

        .basket_res_name, .basket_res_name:hover{
            color:orange;
            font-size:14px;
        }
        

        .btn-remove, .btn-remove span{
            text-decoration:none;
            color:#fa0050;
          
        }
        .btn-remove:hover span {
            color:orange;
            
        }


            

    </style>
        

</head>

<body>
	

    <nav class="navbar navbar-expand-md static-top py-2 z-depth-5" style="background-color:#fa0050;">
        <div class="container">
          <a class="navbar-brand p-3" href="#"><img src="https://assets.yemeksepeti.com/images/ys-new-logo.svg"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
          
            <form class="d-flex" action="" method = "post">
				<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
				<input class="form-control me-2" type="text" value="<?php if(isset($_POST['rest_name'])){echo $_POST['rest_name'];}?>" id="rest_name" name="rest_name" placeholder="Restoran arayın.." aria-label="Search">
				<button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
            </form>
          </div>
        </div>
    </nav>
  



    <div class="top-state"> 
        <div class="top-image"> <img src="//cdn.yemeksepeti.com/App_Themes/SiteHeaders/Yemeksonuc.jpg"  style="top: -40px;"> </div> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-16-3" style="z-index: 1; --bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <h1 class="pt-3" style="font-size:24px;max-width: 740px; line-height: 31px;font-weight: 700;">
                    <?php
                    if(isset($_POST["rest_name"]))
                    {
                        $rest_nametemp = '"';
                        $rest_nametemp .= $_POST["rest_name"];
                        $rest_nametemp .= '"';
                        $rest_nametemp .= ' için sonuçlar';
                    }
                    else
                    {
                        $rest_nametemp = '';
                    }

                    ?>
                     <?php echo $rest_nametemp;?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="#" style="color: #fa0050;font-size: 11px;"><?php echo $city_name; ?> İlindeki Restoranlar </a></li>
                        <li class="breadcrumb-item active" style="color:black;" aria-current="page">Arama Sonuçları</li>
                      </ol>
                </div> 
            </div>
        </div> 
    </div>

    

    <div class="container">
        <div class="row">
            <div class="col-md-4" style="box-sizing: border-box;max-width: 330px;">

                <div class="card menu-card mt-3">
                    <div class="card-header fw-bold" style="background-color: #fa0050;color: white;font-size: 11px;">
                        <span>YEMEK SEPETİM</span>
                    </div>


                    <?php
                     if(!empty($_SESSION["cart"])){?>
                        <style>
                        .empty-basket{
                            display:none;
                        }
                        </style>
                        <div class="card-body fill-basket border p-0">
                            <div class="row m-0 pt-2 pb-2" style="background-color:#eff0f2;">
                                <a class="basket_res_name" style="" href="javascript:DoPost(<?php echo $items['res_id'];?>)" ><span> <?php echo $basket_res_name;?></span>, <span> <?php echo $basket_res_address; ?></span></a>
                            </div>   
                        </div>
                        <?php
                        $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value) {
                            ?>
                            <div class="row m-1 d-flex justify-content-between">
                                <div class="col-5" style="max-width:110px;">
                                    <span ><?php echo $value["item_name"]; ?></span>
                                </div>
                                <div class="col-auto" style="">
                                    <span ><?php echo $value["item_quantity"]; ?></span>
                                </div>
                                <div class="col-auto" style="">
                                    <span ><?php echo $value["product_price"]; ?></span>
                                </div>
                                <div class="col-auto">
                                    <span> <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?> TL</span>
                                </div>
                                <div class="col-auto" style="">
                                    <!--<span><a class="btn-remove" href="restaurant.php?action=delete&menu_id=<?php echo $value["product_id"]; ?>">
                                    <span class="fw-bold">x</span></a></span>-->
                                    <form method="post" action="Restaurant.php" name="delete_menu" id="delete_menu">
                                            <input type="hidden" name="menu_id_hidden" value="<?php echo $value["product_id"];?>">
                                            <input type="hidden" name="delete_hidden" value="delete">                       
                                        <!--<span><a class="btn-remove" href="javascript:delete()">
                                        <span class="fw-bold">x</span></a></span>-->
                                        <input type="submit" name="delete" style="margin-top: 5px;border:none;" class="btn-remove" value="x">
                                    </form>
                                </div>
                            </div>
                            
                                
                                    
                                
                            <?php
                            $total = $total + ($value["item_quantity"] * $value["product_price"]);
                        }
                            ?>
                            <div class="row d-flex mt-3 m-1" style="justify-content:space-between">
                                <div class="col-auto">
                                    <span class="fw-bold" style="">Toplam</span>
                                </div>
                                <div class="col-auto">
                                    <span style="color:#fa0050;font-weight:600;"> <?php echo number_format($total, 2); ?> TL</span>
                                </div>
                                
                                
                            </div>
                            <div class="row p-0 m-0 mt-2">
                                <button type="button" class="btn btn-success p-2 m-0">Sepete Ekle</button>
                            </div>
                            <?php
                        }
                        else
                        {  ?>
                            <div class="card-body empty-basket">
                                <i class="fa fa-shopping-basket p-1"  style="font-size:30px;color:grey;width:auto;float: left;margin-right: 0.5em;"></i>
                                <span class="fw-bold ">Sepetiniz henüz boş.</span>
                                
                            </div>  
                  <?php }
                    ?>     
                </div>

                <div class="card menu-card mt-3">
                    <div class="card-body userinfo" style="background-color: #eff0f2;">
                        <img class="user_img" style="float: left; margin-right: 0.7em;" src="https://profile.yemeksepeti.com/fb/2379/94EB0F6629D88D2DA5D40ED607C5217C.png">
                        <span class="user-name fw-bold" style="color: #fa0050; float: left;"><?php echo $user_name; ?></span>
                        <div class="dropdown" style="display: inline; float: right;">
                            <a class="btn btn-sm mt-1 btn-userinfo" style="color:black; font-weight:400;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-chevron-down"></i> 
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Bildirimlerim</a></li>
                            <li><a class="dropdown-item" href="#">Profilim</a></li>
                            <li><a class="dropdown-item" href="#">Sipairişlerim</a></li>
                            <li><a class="dropdown-item" href="#">Favorilerim</a></li>
                            <li><a class="dropdown-item" href="#">Adreslerim</a></li>
                            <li><a class="dropdown-item" href="#">Bilgilerim</a></li>
                            <li><a class="dropdown-item" href="MainPage.php">Çıkış Yap</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card menu-card mt-3">
                    <div class="card-body wallet">
                        <i class="bi bi-wallet2 p-0" style="color:#fa0050;float: left;margin-right: 0.2em; font-size: 24px;"></i>
                        <span class="user-name fw-bold p-2" style="float: left;">CÜZDAN</span>
                        <span class="fw-bold p-2" style="display: inline; float: right;color:#fa0050"> 0,00 TL
                        </span>
                    </div>
                </div>
            </div>

        


        
            <div class="col-md-8">

                <div class="top_info">
                    <div class="row pt-3" style="position: relative;"> 
                        <div class="d-flex justify-content-start">
                            <span style="margin-right: 3em;">Sıralama:</span> 
                            <div class="actions"> 
                                <button type="button" class="btn btn-outline-danger py-0" style="font-size: 15px;">İndirim</button> 
                                <button type="button" class="btn btn-outline-danger py-0">Alfabetik</button> 
                                <button type="button" class="btn btn-outline-danger py-0">Restoran Puanı</button> 
                            </div> 
                        </div>               
                    </div>
                    <div class="mt-3 mb-3"> 
                        <div class="text"><span>Seçmiş olduğunuz kriterlere uygun restoranlar listelenmiştir. </span></div>
                    </div>
                </div>


                <?php
                
					function validate($data){
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
					}
                    //include "config.php";
                    $servername = "localhost";
                    $username = "root";
                    $password ="";
                    $dbname = "yemeksepetidb";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    if($conn->connect_error)
                    {
                        echo "connection_aborted";
                    }
                    //else echo "success";

                    
                    
                    if(isset($_POST["rest_name"]))
                    {
						if (hash_equals($_SESSION['token'], $_POST['token'])) {
							$rest_nametemp = validate($_POST['rest_name']);
							$rest_nametemp=str_replace("'","*****",$rest_nametemp);
							$query = "SELECT * FROM restaurants WHERE name LIKE '%$rest_nametemp%'";
						}
						else{
							echo "Risk of CSRF attack";
						}
                    }
					else
					{
                        $city_id = validate($city_id);
						$city_id=str_replace("'","*****",$city_id);
						//$city_id=$_SESSION['city_id'];
						$query="SELECT * FROM restaurants WHERE city_id='$city_id'";
                        
						//$restaurants = $conn->query($city_res_query);
					}
                    $query_run = mysqli_query($conn, $query);
					
                
                    
                ?>


                <?php
                    if(mysqli_num_rows($query_run) > 0)
                    {
						foreach($query_run as $items)
						{ 
                ?>


                <div class="list-items">
                    <div class="row d-flex">
                        <div class="col-2 logo">
                            <img src="<?php echo $items['img_path'];?> " style="object-fit: scale-down;margin:0;width: 100%;">                    
                        </div>
                        <div class="col-10 resinfo">
                                <div class="row">
                                    <div class="col-1"><!--puan gösterilen kısım-->
                                        <div class="point">10</div>
                                    </div>

                                    <div class="col-9 resinfo">
                                       
                                        <a class="res_name" href="javascript:DoPost(<?php echo $items['res_id'];?>)"> <?php echo $items['name'];?>, <?php echo $items['address'];?></a>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="d-flex justify-content-start pt-2">   
                                    <div class="" style="display:inline;float:left;margin-right:0.9em;">
                                    <img src="https://www.yemeksepeti.com/assets/images/medium-min-price-icon.png" style="height: 16px;">
                                    <span><?php echo $items['min_price'];?> TL</span>
                                    </div>
                                    <div class="" style="display:inline;float:left;margin-right:0.9em;">
                                    <img src="https://www.yemeksepeti.com/assets/images/medium-time-icon.png" style="height: 16px;">
                                    <span><?php echo $items['service_time'];?> dk.</span>
                                    </div>
                                    <div class="" style="display:inline;float:left;margin-right:0.9em;">
                                    <img src="https://www.yemeksepeti.com/assets/images/medium-delivery-icon.png" style="height: 16px;">
                                        <span>0,00 TL</span>
                                    </div>
                                    <div class="col-1 d-inline">
                                    <img src="https://cdn.yemeksepeti.com/Labels/Restaurant/cc_genel.gif" style="height: 16px;">
                                </div>

                                </div>
                                <hr style="margin-top: 7px;">  
                            </div> 
                        </div>
                    </div>
                </div>



                <?php
                    }
                    }
                    
                    else
                    {
                ?>
                <style>.top_info { display:none;}</style>
                <div class="mt-3 mb-3"> 
                    <div class="text"><span>Aradığınız kriterlere göre sonuç bulunamadı.Filtreleri kaldırarak yeniden arayabilirsiniz. </span></div>
                </div>
                    

                <?php
                    }
                
                ?>
            </div>
        </div>
    </div>





    
    <script language="javascript"> 

        function DoPost(res){
            $.post("restaurant.php", { res_id: res } );  //Your values here..
            window.location.href = "restaurant.php";
        }

    </script>


    

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
    </body>
</html>    

