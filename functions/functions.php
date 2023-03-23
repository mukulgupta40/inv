
<script>

function openHello(p1) {
	
	var view_more_button=p1;
	var view_more_btn1=p1*2001;
	var view_more_btn2=p1*2002;

    document.getElementById(view_more_button).style.display = 'block';
	
	
	document.getElementById(view_more_btn1).style.display = 'none';
	document.getElementById(view_more_btn2).style.display = 'block';
	
}
function closeHello(p1) {
	var view_more_button=p1;
	var view_more_btn1=p1*2001;
	var view_more_btn2=p1*2002;
    document.getElementById(view_more_button).style.display = 'none';
	
	
	
	document.getElementById(view_more_btn1).style.display = 'block';
	document.getElementById(view_more_btn2).style.display = 'none';
}

</script>






<?php

// this is a connection
$con = mysqli_connect("localhost","root","","invoice");
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
$get_pro="select * from products order by RAND() LIMIT 0,15";

$run_pro =mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){
	
	$pro_id=$row_pro['product_id'];
	$pro_cat=$row_pro['product_cat'];
	$pro_brand=$row_pro['product_brand'];
		$pro_title=$row_pro['product_title'];
		$pro_price=$row_pro['product_price'];
	$pro_image=$row_pro['product_image'];
			$pro_camera=$row_pro['product_camera'];
		$pro_ram=$row_pro['product_ram'];
		$pro_memory=$row_pro['product_memory'];
	$pro_screensize=$row_pro['product_screensize'];
	$pro_battery=$row_pro['product_battery'];
	$pro_amazon=$row_pro['amazon'];
	$pro_amazon_link=$row_pro['amazon_link'];
	$pro_flipkart=$row_pro['flipkart'];
	$pro_flipkart_link=$row_pro['flipkart_link'];
	$pro_infibeam=$row_pro['infibeam'];
	$pro_infibeam_link=$row_pro['infibeam_link'];
	$pro_snapdeal=$row_pro['snapdeal'];
	$pro_snapdeal_link=$row_pro['snapdeal_link'];
	$pro_paytm=$row_pro['paytm'];
	$pro_paytm_link=$row_pro['paytm_link'];
	$pro_gadgets360=$row_pro['gadgets360'];
	$pro_gadgets360_link=$row_pro['gadgets360_link'];
	$pro_croma=$row_pro['croma'];
	$pro_croma_link=$row_pro['croma_link'];
	$pro_tatacliq=$row_pro['tatacliq'];
	$pro_tatacliq_link=$row_pro['tatacliq_link'];
	$pro_shopclues=$row_pro['shopclues'];
	$pro_shopclues_link=$row_pro['shopclues_link'];
	
	$pro_price=$row_pro['best'];
	$pro_name=$row_pro['best_name'];
	$pro_link=$row_pro['best_link'];
	
//for view more button
    $view_more_button = $pro_id;
    $view_more_btn1 = $pro_id*2001;
    $view_more_btn2 = $pro_id*2002;


	
// the main box that is the product box is under class product-image-wrapper
echo "
<div class='product-image-wrapper'>                    
<div class='productinfo text-center'>

<div class='product_image'>
<a href='pic.php?pro_id=$pro_id' >
<img src='admin_area/product_images/$pro_image' style='width:15% ;min-width:70px;max-height:200px;margin-top:20px ' /></a>
	 </div>
                    
<table class='product_information'>
<tr><td><h2 >$pro_title</h2></td></tr>	
<tr><td><p style='float:left;'><b style='float:left;'>Camera:</b>$pro_camera</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Ram:</b>$pro_ram</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Memory:</b>$pro_memory</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Screensize:</b>$pro_screensize</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Battery:</b>$pro_battery</p></td></tr>

</table>



<table class='product_sites'>
<br>
	";
if($pro_amazon > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>amazon:</b>Currently N.A</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_amazon_link' target='_blank'><p style='float:left;'><b style='float:left;'>amazon:</b>Rs $pro_amazon</p></a></td></tr>";}

if($pro_flipkart > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>filpkart:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_flipkart_link' target='_blank'><p style='float:left;'><b style='float:left;'>filpkart:</b>Rs $pro_flipkart</p></a></td></tr>";}

if($pro_snapdeal > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>snapdeal:</b>Currently N.A</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_snapdeal_link' target='_blank'><p style='float:left;'><b style='float:left;'>snapdeal:</b>Rs $pro_snapdeal</p></a></td></tr>";}

if($pro_paytm > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>paytm:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_paytm_link' target='_blank'><p style='float:left;'><b style='float:left;'>paytm:</b>Rs $pro_paytm</p></a></td></tr>";}

if($pro_shopclues > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>shopclues:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_shopclues_link' target='_blank'><p style='float:left;'><b style='float:left;'>shopclues:</b>Rs $pro_shopclues</p></a></td></tr>";}

echo "

<tr><td><span class='more' id=$view_more_btn1><a onclick='openHello($pro_id)' href='javascript:void(0);'>Show more</a></span></td></tr>
 
<tbody class='less-more' id=$view_more_button>
";


if($pro_tatacliq > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>tatacliq:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_tatacliq_link' target='_blank'><p style='float:left;'><b style='float:left;'>tatacliq:</b>Rs $pro_tatacliq</p></a></td></tr>";}

if($pro_gadgets360 > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>gadgets360:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_gadgets360_link' target='_blank'><p style='float:left;'><b style='float:left;'>gadgets360:</b>Rs $pro_gadgets360</p></a></td></tr>";}

if($pro_infibeam > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>infibeam:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_infibeam_link' target='_blank'><p style='float:left;'><b style='float:left;'>infibeam:</b>Rs $pro_infibeam</p></a></td></tr>";}

if($pro_croma > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>croma:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_croma_link' target='_blank'><p style='float:left;'><b style='float:left;'>croma:</b>Rs $pro_croma</p></a></td></tr>";}

echo "
         
</tbody>


<tr><td><span class='less' id=$view_more_btn2><a onclick='closeHello($pro_id)' href='javascript:void(0);'>Show less</a></span></td></tr>



</table>



<table class='view_deal_information'>

<a href='$pro_link' target='_blank' ><button class='button_view_deal'>View Deal</button></a>
<tr><td><a href=''><h7>$pro_name</h7></a></td></tr>
<tr><td><a href=''><h6>Best Price: Rs $pro_price</h6></a></td></tr>

</table>
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
	$pro_brand_camera=$row_brand_pro['product_camera'];
		$pro_brand_ram=$row_brand_pro['product_ram'];
		$pro_brand_memory=$row_brand_pro['product_memory'];
	$pro_brand_screensize=$row_brand_pro['product_screensize'];
	$pro_brand_battery=$row_brand_pro['product_battery'];
	$pro_brand_amazon=$row_brand_pro['amazon'];
	$pro_brand_amazon_link=$row_brand_pro['amazon_link'];
	$pro_brand_flipkart=$row_brand_pro['flipkart'];
	$pro_brand_flipkart_link=$row_brand_pro['flipkart_link'];
	$pro_brand_infibeam=$row_brand_pro['infibeam'];
	$pro_brand_infibeam_link=$row_brand_pro['infibeam_link'];
	$pro_brand_snapdeal=$row_brand_pro['snapdeal'];
	$pro_brand_snapdeal_link=$row_brand_pro['snapdeal_link'];
	$pro_brand_paytm=$row_brand_pro['paytm'];
	$pro_brand_paytm_link=$row_brand_pro['paytm_link'];
	$pro_brand_gadgets360=$row_brand_pro['gadgets360'];
	$pro_brand_gadgets360_link=$row_brand_pro['gadgets360_link'];
	$pro_brand_croma=$row_brand_pro['croma'];
	$pro_brand_croma_link=$row_brand_pro['croma_link'];
	$pro_brand_tatacliq=$row_brand_pro['tatacliq'];
	$pro_brand_tatacliq_link=$row_brand_pro['tatacliq_link'];
	$pro_brand_shopclues=$row_brand_pro['shopclues'];
	$pro_brand_shopclues_link=$row_brand_pro['shopclues_link'];

		
	$pro_brand_price=$row_brand_pro['best'];
	$pro_brand_name=$row_brand_pro['best_name'];
	$pro_brand_link=$row_brand_pro['best_link'];
	
	
//for view more button
    $view_more_button = $pro_brand_id;
    $view_more_btn1 = $pro_brand_id*2001;
    $view_more_btn2 = $pro_brand_id*2002;
	
echo "
<div class='product-image-wrapper'>                    
<div class='productinfo text-center'>

<div class='product_image'>
<a href='pic.php?pro_id=$pro_brand_id' >
<img src='admin_area/product_images/$pro_brand_image' style='width:15% ;min-width:70px;max-height:200px;margin-top:20px'  /></a>
	 </div>
                    
<table class='product_information'>
<tr><td><h2>$pro_brand_title</h2></td></tr>	
<tr><td><p style='float:left;'><b style='float:left;'>Camera:</b>$pro_brand_camera</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Ram</b>:$pro_brand_ram</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Memory</b>:$pro_brand_memory</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Screensize</b>:$pro_brand_screensize</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Battery</b>:$pro_brand_battery</p></td></tr>

</table>
<table class='product_sites'>
<br>
	";
if($pro_brand_amazon > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>amazon:</b>Currently N.A</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_brand_amazon_link' target='_blank'><p style='float:left;'><b style='float:left;'>amazon:</b>Rs $pro_brand_amazon</p></a></td></tr>";}

if($pro_brand_flipkart > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>filpkart:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_brand_flipkart_link' target='_blank'><p style='float:left;'><b style='float:left;'>filpkart:</b>Rs $pro_brand_flipkart</p></a></td></tr>";}

if($pro_brand_snapdeal > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>snapdeal:</b>Currently N.A</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_brand_snapdeal_link' target='_blank'><p style='float:left;'><b style='float:left;'>snapdeal:</b>Rs $pro_brand_snapdeal</p></a></td></tr>";}

if($pro_brand_paytm > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>paytm:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_brand_paytm_link' target='_blank'><p style='float:left;'><b style='float:left;'>paytm:</b>Rs $pro_brand_paytm</p></a></td></tr>";}

if($pro_brand_shopclues){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>shopclues:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_brand_shopclues_link' target='_blank'><p style='float:left;'><b style='float:left;'>shopclues:</b>Rs $pro_brand_shopclues</p></a></td></tr>";}

echo "

<tr><td><span class='more' id=$view_more_btn1><a onclick='openHello($pro_brand_id)' href='javascript:void(0);'>Show more</a></span></td></tr>
 
<tbody class='less-more' id=$view_more_button>
";

if($pro_brand_tatacliq > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>tatacliq:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_brand_tatacliq_link' target='_blank'><p style='float:left;'><b style='float:left;'>tatacliq:</b>Rs $pro_brand_tatacliq</p></a></td></tr>";}

if($pro_brand_gadgets360 > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>gadgets360:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_brand_gadgets360_link' target='_blank'><p style='float:left;'><b style='float:left;'>gadgets360:</b>Rs $pro_brand_gadgets360</p></a></td></tr>";}

if($pro_brand_infibeam > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>infibeam:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_brand_infibeam_link' target='_blank'><p style='float:left;'><b style='float:left;'>infibeam:</b>Rs $pro_brand_infibeam</p></a></td></tr>";}

if($pro_brand_croma > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>croma:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_brand_croma_link' target='_blank'><p style='float:left;'><b style='float:left;'>croma:</b>Rs $pro_brand_croma</p></a></td></tr>";}

echo "
        
</tbody>


<tr><td><span class='less' id=$view_more_btn2><a onclick='closeHello($pro_brand_id)' href='javascript:void(0);'>Show less</a></span></td></tr>


</table>

<table class='view_deal_information'>

<a href='$pro_brand_link' target='_blank' ><button class='button_view_deal'>View Deal</button></a>
<tr><td><a href=''><h7>$pro_brand_name</h7></a></td></tr>
<tr><td><a href=''><h6>Best Price: Rs $pro_brand_price</h6></a></td></tr>

</table>
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
	$pro_cat_camera=$row_cat_pro['product_camera'];
		$pro_cat_ram=$row_cat_pro['product_ram'];
			$pro_cat_memory=$row_cat_pro['product_memory'];
	$pro_cat_screensize=$row_cat_pro['product_screensize'];
	$pro_cat_battery=$row_cat_pro['product_battery'];
	$pro_cat_amazon=$row_cat_pro['amazon'];
	$pro_cat_amazon_link=$row_cat_pro['amazon_link'];
	$pro_cat_flipkart=$row_cat_pro['flipkart'];
	$pro_cat_flipkart_link=$row_cat_pro['flipkart_link'];
	$pro_cat_infibeam=$row_cat_pro['infibeam'];
	$pro_cat_infibeam_link=$row_cat_pro['infibeam_link'];
	$pro_cat_snapdeal=$row_cat_pro['snapdeal'];
	$pro_cat_snapdeal_link=$row_cat_pro['snapdeal_link'];
	$pro_cat_paytm=$row_cat_pro['paytm'];
	$pro_cat_paytm_link=$row_cat_pro['paytm_link'];
	$pro_cat_gadgets360=$row_cat_pro['gadgets360'];
	$pro_cat_gadgets360_link=$row_cat_pro['gadgets360_link'];
	$pro_cat_croma=$row_cat_pro['croma'];
	$pro_cat_croma_link=$row_cat_pro['croma_link'];
	$pro_cat_tatacliq=$row_cat_pro['tatacliq'];
	$pro_cat_tatacliq_link=$row_cat_pro['tatacliq_link'];
	$pro_cat_shopclues=$row_cat_pro['shopclues'];
	$pro_cat_shopclues_link=$row_cat_pro['shopclues_link'];

		
	$pro_cat_price=$row_cat_pro['best'];
	$pro_cat_name=$row_cat_pro['best_name'];
	$pro_cat_link=$row_cat_pro['best_link'];
	
	
//for view more button
    $view_more_button = $pro_cat_id;
    $view_more_btn1 = $pro_cat_id*2001;
    $view_more_btn2 = $pro_cat_id*2002;
	
echo "
<div class='product-image-wrapper'>                    
<div class='productinfo text-center'>

<div class='product_image'>
<a href='pic.php?pro_id=$pro_cat_id' >
<img src='admin_area/product_images/$pro_cat_image' style='width:15% ;min-width:70px;max-height:200px;margin-top:20px' ' /></a>
	 </div>
                    
<table class='product_information'>
<tr><td><h2>$pro_cat_title</h2></td></tr>	
<tr><td><p style='float:left;'><b style='float:left;'>Camera:</b>$pro_cat_camera</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Ram</b>:$pro_cat_ram</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Memory</b>:$pro_cat_memory</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Screensize</b>:$pro_cat_screensize</p></td></tr>
<tr><td><p style='float:left;'><b style='float:left;'>Battery</b>:$pro_cat_battery</p></td></tr>

</table>
<table class='product_sites'>
<br>
";
if($pro_cat_amazon > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>amazon:</b>Currently N.A</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_cat_amazon_link' target='_blank'><p style='float:left;'><b style='float:left;'>amazon:</b>Rs $pro_cat_amazon</p></a></td></tr>";}

if($pro_cat_flipkart > 500000){echo "<tr><td><a href='k'><p style='float:left;'><b style='float:left;'>filpkart:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_cat_flipkart_link' target='_blank'><p style='float:left;'><b style='float:left;'>filpkart:</b>Rs $pro_cat_flipkart</p></a></td></tr>";}

if($pro_cat_snapdeal > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>snapdeal:</b>Currently N.A</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_cat_snapdeal_link' target='_blank'><p style='float:left;'><b style='float:left;'>snapdeal:</b>Rs $pro_cat_snapdeal</p></a></td></tr>";}

if($pro_cat_paytm > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>paytm:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_cat_paytm_link' target='_blank'><p style='float:left;'><b style='float:left;'>paytm:</b>Rs $pro_cat_paytm</p></a></td></tr>";}

if($pro_cat_shopclues){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>shopclues:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_cat_shopclues_link' target='_blank'><p style='float:left;'><b style='float:left;'>shopclues:</b>Rs $pro_cat_shopclues</p></a></td></tr>";}

echo "


<tr><td><span class='more' id=$view_more_btn1><a onclick='openHello($pro_cat_id)' href='javascript:void(0);'>Show more</a></span></td></tr>
 
<tbody class='less-more' id=$view_more_button>
";
if($pro_cat_tatacliq > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>tatacliq:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_cat_tatacliq_link' target='_blank'><p style='float:left;'><b style='float:left;'>tatacliq:</b>Rs $pro_cat_tatacliq</p></a></td></tr>";}

if($pro_cat_gadgets360 > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>gadgets360:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_cat_gadgets360_link' target='_blank'><p style='float:left;'><b style='float:left;'>gadgets360:</b>Rs $pro_cat_gadgets360</p></a></td></tr>";}

if($pro_cat_infibeam > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>infibeam:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_cat_infibeam_link'target='_blank'><p style='float:left;'><b style='float:left;'>infibeam:</b>Rs $pro_cat_infibeam</p></a></td></tr>";}

if($pro_cat_croma > 500000){echo "<tr><td><a href=''><p style='float:left;'><b style='float:left;'>croma:</b>Currently N.A.</p></a></td></tr>";}
else{echo"<tr><td><a href='$pro_cat_croma_link' target='_blank'><p style='float:left;'><b style='float:left;'>croma:</b>Rs $pro_cat_croma</p></a></td></tr>";}

echo "
   
</tbody>


<tr><td><span class='less' id=$view_more_btn2><a onclick='closeHello($pro_cat_id)' href='javascript:void(0);'>Show less</a></span></td></tr>




</table>

<table class='view_deal_information'>

<a href='$pro_cat_link' target='_blank' ><button class='button_view_deal'>View Deal</button></a>
<tr><td><a href=''><h7>$pro_cat_name</h7></a></td></tr>
<tr><td><a href=''><h6>Best Price: Rs $pro_cat_price</h6></a></td></tr>

</table>
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

