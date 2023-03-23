<?php
// this is a connection
$con = mysqli_connect("localhost","root","","ecommerce");

//getting the brands
function getbrand(){

global $con;
$get_brand = "select * from brands";

$run_brand = mysqli_query($con,$get_brand);

while($row_brand=mysqli_fetch_array($run_brand)){
	
	$brand_id=$row_brand['brand_id'];
	$brand_title=$row_brand['brand_title'];
	
	echo "<li><a href='my1_new.php?brand=$brand_id'>$brand_title</a></li>" ;}
}

//getting the catgories
function getcategories(){

global $con;                                                         //always con :its important
$get_cat = "select * from categories";

$run_cat = mysqli_query($con,$get_cat);

while($row_cat=mysqli_fetch_array($run_cat)){
	
	$cat_id=$row_cat['cat_id'];
	$cat_title=$row_cat['cat_title'];
	
	echo "<li><a href='my1_new.php?cat=$cat_id'>$cat_title</a></li>" ;}
}

function getPro(){
	
	if(!isset($_GET['cat'])){
		
	if(!isset($_GET['brand'])){	

global $con;
$get_pro="select * from products order by RAND() LIMIT 0,9";

$run_pro =mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){
	
	$pro_id=$row_pro['product_id'];
	$pro_cat=$row_pro['product_cat'];
	$pro_brand=$row_pro['product_brand'];
		$pro_title=$row_pro['product_title'];
		$pro_price=$row_pro['product_price'];
	$pro_image=$row_pro['product_image'];
	


echo "
<div class='col-sm-4'>
<div class='product-image-wrapper'>
<div class='productinfo text-center'>
<img src='admin_area/product_images/$pro_image' width='180px' height='180px' />
<h2>$pro_title</h2>
<p>$pro_price</p>
<a href='view_deals.php?pro_id=$pro_id' class='btn btn-default add-to-cart'><button>View Deals</button></a>
</div>
</div>
</div>
";

}              //close while loop
 
}              //close brand            
}             //close category
}             //close getPro


function getBrandPro(){                                   //for brands
	 
	if(isset($_GET['brand'])){
	
	$brand_id=$_GET['brand'];
	
global $con;
$get_brand_pro="select * from products where product_brand='$brand_id' ";

$run_brand_pro =mysqli_query($con,$get_brand_pro);

$count_cats=mysqli_num_rows($run_brand_pro);
if($count_cats==0)
{
	echo "<h2 >NO RESULTS FOUND!</h2>";
}


while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
	
	$pro_brand_id=$row_brand_pro['product_id'];
	$pro_brand_cat=$row_brand_pro['product_cat'];
	$pro_brand_brand=$row_brand_pro['product_brand'];
		$pro_brand_title=$row_brand_pro['product_title'];
		$pro_brand_price=$row_brand_pro['product_price'];
	$pro_brand_image=$row_brand_pro['product_image'];
	


echo "
<div class='col-sm-4'>
<div class='product-image-wrapper'>
<div class='productinfo text-center'>
<img src='admin_area/product_images/$pro_brand_image' width='180px' height='180px' />
<h2>$pro_brand_title</h2>
<p>$pro_brand_price</p>
<a href='view_deals.php?pro_id=$pro_brand_id' class='btn btn-default add-to-cart'><button>View Deals</button></a>
</div>
</div>
</div>
";

}              //close while loop
 
       
}             //close brand
}             //close getbrandPro

function getCatPro(){                                   //for categories
	 
	if(isset($_GET['cat'])){
	
	$cat_id=$_GET['cat'];
	
global $con;
$get_cat_pro="select * from products where product_cat='$cat_id' ";

$run_cat_pro =mysqli_query($con,$get_cat_pro);
$count_cats=mysqli_num_rows($run_cat_pro);
if($count_cats==0)
{
	echo "<h2 >NO RESULTS FOUND!</h2>";
}


while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
	$pro_cat_id=$row_cat_pro['product_id'];
	$pro_cat_cat=$row_cat_pro['product_cat'];
	$pro_cat_brand=$row_cat_pro['product_brand'];
		$pro_cat_title=$row_cat_pro['product_title'];
		$pro_cat_price=$row_cat_pro['product_price'];
	$pro_cat_image=$row_cat_pro['product_image'];
	

echo "
<div class='col-sm-4'>
<div class='product-image-wrapper'>
<div class='productinfo text-center'>
<img src='admin_area/product_images/$pro_cat_image' width='180px' height='180px' />
<h2>$pro_cat_title</h2>
<p>$pro_cat_price</p>
<a href='view_deals.php?pro_id=$pro_cat_id' class='btn btn-default add-to-cart'><button>View Deals</button></a>
</div>
</div>
</div>
";

}              //close while loop
 
       
}             //close category
}             //close getCatPro


function getIp() {

    $ip = $_SERVER['REMOTE_ADDR'];

 

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }

 

    return $ip;

}




?>