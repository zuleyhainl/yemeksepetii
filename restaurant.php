<?php

session_start();
include 'config.php';
include "utils.php";

    if(!isset($_SESSION['name']))
    {  
        die('Direct access not permitted');
    }
    if(!isset($_SESSION['res_id']) && !isset($_POST['res_id']))
    {
        die('Direct access not permitted');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php
    
	header('Content-Type: text/html; charset=UTF-8');

    
    
    if(isset($_POST['res_id']))
    {
        //echo "zzzzzzzzzzzzzz";
        //if (hash_equals($_SESSION['token'], $_POST['token'])) {
        $res_id = $_POST["res_id"];  
        $_SESSION["res_id"] = $res_id;  
        /*}
        else{
            echo "Risk of CSRF attack";
        }*/
    }
    else
    {
        //echo "zzzzzzzzzzzzzz";
        //$res_id = $_GET["res_id"];
        $res_id = $_SESSION["res_id"];
    }

    
    


    $city_name = $_SESSION['city_name'];
    $user_name=$_SESSION['name'];
    
    

    
    
    //$con

    if (isset($_POST["add_hidden"])){
        if (!empty($_SESSION["cart"])){
            $basket_res_id = $_SESSION["basket_res_id"];
            if($basket_res_id == $res_id)
            {
                $item_array_id = array_column($_SESSION["cart"],"product_id");
                if (!in_array($_POST["menu_id_hidden"],$item_array_id)){
                    $count = count($_SESSION["cart"]);
                    $item_array = array(
                        'product_id' => $_POST["menu_id_hidden"],
                        'item_name' => $_POST["hidden_name"],
                        'product_price' => $_POST["hidden_price"],
                        'item_quantity' => $_POST["quantity"],
                    );
                    $_SESSION["cart"][$count] = $item_array;
                    echo '<script>window.location="restaurant.php" </script>';
                }else{
                    echo '<script>alert("Menü daha önce sepete eklenmiş")</script>';
                    echo '<script>window.location="restaurant.php"</script>';
                }
            }
            else
            {
                echo '<script>alert("Sepetinizde başka restorana ait ürünler var!")</script>';
                echo '<script>window.location="restaurant.php"</script>';
            }
            
        }else{
            $item_array = array(
                
                'product_id' => $_POST["menu_id_hidden"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["basket_res_id"] = $res_id;//bunu sadece ilk eklemede yapacak
            $_SESSION["cart"][0] = $item_array;

            $basket_res_id = $_SESSION["basket_res_id"];
            $query = "SELECT * FROM restaurants WHERE res_id='$basket_res_id'";
            $result = mysqli_query($conn, $query);

            if ($result->num_rows == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['basket_res_name']= $row['name'];
                $_SESSION['basket_res_address']= $row['address'];
            } else {
                echo "hata!";
            }
        }
    }

    if (isset($_POST["delete_hidden"])){
        //($_GET["action"] == "delete_menu"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_POST["menu_id_hidden"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Ürün kaldırılıyor")</script>';
                    echo '<script>window.location="list.php"</script>';
                    if(empty($_SESSION['cart']))//sepet tamamen boşaldıysa sepetteki restoran bilgisini de serbest bırak
                    {
                        unset($_SESSION['basket_res_id']);
                    }
                }
            }
        //}
    }

        //$last_sc_id = $_GET["card_id"];

        $restaurant_query = mysqli_query($conn,"select * from restaurants where res_id='$res_id'");
        $restaurant_menu_query = mysqli_query($conn,"select * from menu where res_id='$res_id'");
        $restaurant_comment_query = mysqli_query($conn,"select * from feedbacks where res_id='$res_id'");

        while($row=$restaurant_query->fetch_assoc())
		{
            $_SESSION['res_name'] = $row['name'];
		    $res_desc = $row['descriptions'];
            $res_img_path = $row['img_path'];
            $res_min_price = $row['min_price'];
            $res_s_time = $row['service_time'];
            $_SESSION['res_address'] = $row['address'];
        }
        $res_address = $_SESSION['res_address'];
        $res_name = $_SESSION['res_name'];


        /*while($row = mysqli_fetch_row($restaurant_query))
	    {
            $res_name = $row[1];
		    $res_desc = $row[2];
            $res_img_path = $row[3];
            $res_min_price = $row[6];
            $res_s_time = $row[7];
            $res_address = $row[9];
        }*/
        mysqli_close($conn);

?>

    <title>Document</title>


    <style type="text/css">
        body {
            background-color: #fff;
            font-size: 11px;
            font-family: Verdana,Geneva,sans-serif;
            color: #333;
            position: relative;
            height: 100%;
         
        }
        .top-state {
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
            max-width: 40px;
            width: 40px;
            height: 40px;
            border: 1px solid #d5d5d5;
            border-radius: 3px;
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
         .logo{
            max-width: 115px;
            max-height: 115px;
            min-height: 115px;
            min-width: 115px;
            padding: 3px;
            display: flex;
            object-fit: scale-down;
            margin: 0;
            width: 100%;
        }
        .point{
            border-radius: 2px;
            font-size: 10px;
            padding: 2px 5px;
            height: 44px;
            margin: 2px 0 0;
            background-color: #29cc81;
            background-clip: padding-box;
            color: #fff;
            font-weight: 700;
            min-width: 40px;
            font-family: Open Sans,sans-serif;
            text-align: center;
            display: inline-block;
        }
        .point-add{
            border-radius: 4px;
            font-size: 15px;
            padding: 2px 2px;
            height: 25px;
            background-color: #29cc81;
            background-clip: padding-box;
            color: #fff;
            font-weight: 700;
            min-width: 30px;
            font-family: Open Sans,sans-serif;
            text-align: center;
            display: inline-block;
        }

        .point-add:hover{
            opacity: 0.7;
        }
        .menu-name{
            display: block;
            color:black;
            text-decoration: none;
            font-size: 14px;
        
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
        input[type="text" name="quantity"]
        {
            font-size:10px;
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
  
        
                    

    </style>


</head>
<body>

    <nav class="navbar navbar-expand-md fixed-top py-2 z-depth-5" style="background-color:#fa0050;">   
        <div class="container">
          <a class="navbar-brand p-3" href="#"><img src="https://assets.yemeksepeti.com/images/ys-new-logo.svg"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
          
            <form class="d-flex" action="" method = "post">
              <input class="form-control me-2" type="text" value="<?php if(isset($_POST['rest_name'])){echo $_POST['rest_name'];}?>" id="rest_name" name="rest_name" placeholder="Restoran arayın.." aria-label="Search">
              <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
            </form>
          </div>
        </div>
    </nav>
   

    <div class="row mt-5">
        <div class="top-state"> 
            <div class="container"> 
                <div class="row"> 
                </div>
                <div class="row">   
                </div>
                <div class="row mt-5"> 
                    <div class="col-16-3" style="z-index: 1; --bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="#" style="color: #fa0050;font-size: 11px;"><?php echo $city_name;?></a></li>
                            <li class="breadcrumb-item active" style="color:black;" aria-current="page"><?php echo $res_name?></li>
                            <li class="breadcrumb-item "><a href="list.php" style="color: #fa0050;font-size: 11px;">Bir önceki sayfa</a></li>
                        </ol>
                    </div> 
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
                                <a class="basket_res_name"  href="restaurant.php" ><span> <?php
                                $basket_res_name = $_SESSION['basket_res_name'];
                                $basket_res_address = $_SESSION['basket_res_address'];
                                echo $basket_res_name?></span>,<span> <?php echo $basket_res_address ?></span></a>
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
                                <div class="col-auto">
                                    <span ><?php echo $value["item_quantity"]; ?></span>
                                </div>
                                <div class="col-auto">
                                    <span ><?php echo $value["product_price"]; ?></span>
                                </div>
                                <div class="col-auto">
                                    <span> <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?> TL</span>
                                </div>
                                <div class="col-auto">


                                    <form method="post" action="" name="delete_menu" id="delete_menu">
                                        <input type="hidden" name="menu_id_hidden" value="<?php echo $value["product_id"];?>">
                                        <input type="hidden" name="delete_hidden" value="delete">                       
                               
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
                                    <span class="fw-bold">Toplam</span>
                                </div>
                                <div class="col-auto">

                                    <span style="color:#fa0050;font-weight:600;"> <?php echo number_format($total, 2); ?> TL</span>

                            

                                </div>
                                
                                
                            </div>
                            <div class="row p-0 m-0 mt-2">

                                <button type="button" class="btn btn-success p-2 m-0" onclick="redirectToOrderPage()">Sepeti Onayla</button>
                            </div>
                            <script language="javascript"> 

                                function redirectToOrderPage(){
                                    window.location.href = "order.php";
                                }

                            </script>
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
                            <li><a class="dropdown-item" href="javascript:LogOut()">Çıkış Yap</a></li>
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

            <div class="col-md-8" style="max-width: 610px;">
                <div class="row border"> 
                    <div class="col-auto logo">
                            <img src="<?php echo $res_img_path?>" style="object-fit: scale-down;margin:0;padding:0;width: 100%;">                    
                    </div>
                    <div class="col-auto">
                        <div class="row">
                            <span class="pt-3 pb-3 fw-bold" style="font-size:14px;"><?php echo $res_name?>, <?php echo $res_address?></span>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="point">Hız <br><span class="fw-bold" style="font-size: 15px;">9,4</span></div>
                                <div class="point">Servis <br><span class="fw-bold" style="font-size: 15px;">8,6</span></div>
                                <div class="point">Lezzet<br><span class="fw-bold" style="font-size: 15px;">9,1</span></div>
                            </div>
                            <div class="col-auto">
                                <img src="https://www.yemeksepeti.com/assets/images/medium-min-price-icon.png" style="height: 16px;display: block;">
                                <span  class="fw-bold" style="display: block;">Min. Tutar</span>
                                <span  class="fw-bold" style="display: block;"><?php echo $res_min_price?> TL</span>
                            </div>
                            <div class="col-auto">
                                <img src="https://www.yemeksepeti.com/assets/images/medium-time-icon.png" style="height: 16px;display: block;">
                                <span class="fw-bold" style="display: block;">Servis</span>
                                <span class="fw-bold" style="display: block;"><?php echo $res_s_time?> dk.</span>
                             </div>
                           
                        </div>
                    </div>
                </div>
                <div class="row mt-4"> 
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: black;" id="menu-tab" data-toggle="tab" href="#menu" role="tab" aria-controls="menu" aria-selected="true">Menu</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: black;" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Bilgiler</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: black;" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Yorumlar</a>
                        </li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        
                        <div class="tab-pane active mt-3" id="menu" role="tabpanel" aria-labelledby="menu-tab">
                            
                            <div class="card menu-card">
                                <div class="card-header fw-bold fs-6">
                                  Menüler
                                </div>
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <?php  
                                                 if(mysqli_num_rows($restaurant_menu_query) > 0) {
                                                    foreach($restaurant_menu_query as $items) {

                                        ?>
                                                                            
                                                    <div class="col-auto mt-3" style="max-width: 190px;">
                                                        <form method="post" action="" name="add_menu">
                                                            <input type="hidden" name="menu_id_hidden" value="<?php echo $items["menu_id"];?>">
                                                            <input type="hidden" name="add_hidden" value="add">
                                                            <div class="menu" style="display:inline;">
                                                                <img src="<?php echo $items['img_path'];?>" style="height: 170px;display: block;">
                                                                <a  class="menu-name fw-bold pt-2" href="#menu"><?php echo $items['menu_name'];?></a>
                                                                <span  class="fw-bold" style="display: block;"><?php echo $items['description'];?></span>
                                                                <input type="text" name="quantity" class="form-control m-0" value="1" style="display:inline;max-width:35px;padding:1px 8px;font-size:14px;">
                                                                <input type="hidden" name="hidden_name" value="<?php echo $items["menu_name"]; ?>">
                                                                <input type="hidden" name="hidden_price" value="<?php echo $items["price"]; ?>">
                                                                <input type="submit" name="add" style="margin-top: 5px;border:none;" class="point-add mt-2" value="+">
                                                                <span class="fw-bold" style="color:#fa0050;font-size: 13px;"><?php echo $items['price'];?> TL</span>                                                      
                                                            </div>
                                                        </form>
                                                    </div>   

                                           <?php
                                                }
                                            }
    
                                            ?>
      
                                        

                                    </div>
                                        
                                </div>
                            </div>
                                    

                        </div>
                              

                        <div class="tab-pane" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="card menu-card mt-3">
                                <div class="card-header fs-6" style="color:#fa0050">
                                  Uyarılar & Bilgiler
                                </div>
                                <div class="card-body">
                                    <p><?php echo $res_desc?></p>
                                </div>
                            </div>

                            <div class="card menu-card">
                                <div class="card-header fs-6" style="color:#fa0050">
                                  Ödeme Şekilleri
                                </div>
                                <div class="card-body">
                                    <p> Online Kredi/Banka Kartı  Maximum Mobil ile Öde  Nakit  Kredi Kartı  Cüzdan</p>
                                </div>
                            </div>

                            <div class="card menu-card">
                                <div class="card-header fs-6" style="color:#fa0050">
                                  Bilgiler
                                </div>
                                <div class="card-body">
                                    <span style="display:block"> Kep Adresi: ---</span>
                                    <span style="display:block"> İşletme Adı: <span class="res_name"><?php echo $res_name?></span></span>
                                    <span style="display:block"> Vergi No / Mersis Numarası: ---</span>
                                </div>
                                <div class="card-footer">
                                    <span>Bu restoranın adres ve onaylanmış telefon bilgileri Yemeksepeti'nde bulunmaktadır.</span>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                            <div class="card menu-card mt-3">
                                <div class="card-header fw-bold fs-6">
                                    Restorana yapılan yorumlar
                                </div>

                                <?php

                                            if(mysqli_num_rows($restaurant_comment_query) > 0)
                                            {
                                                foreach($restaurant_comment_query as $items)
                                                {
                                ?>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-auto w-50">
                                                                <span>
                                                                    Hız: <span class="speed">10 |</span> Servis: <span class="service">10 |</span> Lezzet: <span class="flavor">10</span>
                                                                </span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <span>
                                                                    <span class="date" style="margin-right: 0;"><?php echo $items['feedback_date']?></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-1">
                                                            <div class="col-auto">
                                                                <i class="fa fa-user" style="font-size: 25px;"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="user-comment" style="display: block;"><?php echo $items['comment']?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr style="height: 0.01em;">
                                <?php           }
                                            }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include("footer.php")?>

                                                    
                                             


    <script language="javascript"> 

        function LogOut(){ 
            window.location.href = "Index.php";
            
            
        }

    </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>