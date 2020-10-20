
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	//$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
	$energy=$_POST['energy'];
	$fat=$_POST['fat'];
	$protein=$_POST['protein'];
	$fiber=$_POST['fiber'];
	$carbs=$_POST['carbs'];
	$vitaminaqty=$_POST['vitaminaqty'];
	$vitaminadv=$_POST['vitaminadv'];
	$vitamincqty=$_POST['vitamincqty'];
	$vitamincdv=$_POST['vitamincdv'];
	$vitaminkqty=$_POST['vitaminkqty'];
	$vitaminkdv=$_POST['vitaminkdv'];
	$thiaminb1qty=$_POST['thiaminb1qty'];
	$thiaminb1dv=$_POST['thiaminb1dv'];
	$riboflavinb2qty=$_POST['riboflavinb2qty'];
	$riboflavinb2dv=$_POST['riboflavinb2dv'];
	$niacinb3qty=$_POST['niacinb3qty'];
	$niacinb3dv=$_POST['niacinb3dv'];
	$vitaminb6qty=$_POST['vitaminb6qty'];
	$vitaminb6dv=$_POST['vitaminb6dv'];
	$calciumqty=$_POST['calciumqty'];
	$calciumdv=$_POST['calciumdv'];
	$ironqty=$_POST['ironqty'];
	$irondv=$_POST['irondv'];
	$magnesiumqty=$_POST['magnesiumqty'];
	$magnesiumdv=$_POST['magnesiumdv'];
	$manganeseqty=$_POST['manganeseqty'];
	$manganesedv=$_POST['manganesedv'];
	$phosphorusqty=$_POST['phosphorusqty'];
	$phosphorusdv=$_POST['phosphorusdv'];
	$potassiumqty=$_POST['potassiumqty'];
	$potassiumdv=$_POST['potassiumdv'];
	$sodiumqty=$_POST['sodiumqty'];
	$sodiumdv=$_POST['sodiumdv'];
	$zincqty=$_POST['zincqty'];
	$zincdv=$_POST['zincdv'];
	$pros=$_POST['pros'];
	$cons=$_POST['cons'];
	
$sql=mysqli_query($con,"update  products set category='$category',subCategory='$subcat',productName='$productname',productCompany='$productcompany',productPrice='$productprice',shippingCharge='$productscharge',productAvailability='$productavailability',productPriceBeforeDiscount='$productpricebd',energy='$energy',fat='$fat',fiber='$fiber',protein='$protein',carbs='$carbs',vitaminaqty='$vitaminaqty',vitaminadv='$vitaminadv',vitamincqty='$vitamincqty',vitamincdv='$vitamincdv',vitaminkqty='$vitaminkqty',vitaminkdv='$vitaminkdv',thiaminb1qty='$thiaminb1qty',thiaminb1dv='$thiaminb1dv',riboflavinb2qty='$riboflavinb2qty',riboflavinb2dv='$riboflavinb2dv',niacinb3qty='$niacinb3qty',niacinb3dv='$niacinb3dv',vitaminb6qty='$vitaminb6qty',vitaminb6dv='$vitaminb6dv',calciumqty='$calciumqty',calciumdv='$calciumdv',ironqty='$ironqty',irondv='$irondv',magnesiumqty='$magnesiumqty',magnesiumdv='$magnesiumdv',manganeseqty='$manganeseqty',manganesedv='$manganesedv',phosphorusqty='$phosphorusqty',phosphorusdv='$phosphorusdv',potassiumqty='$potassiumqty',potassiumdv='$potassiumdv',sodiumqty='$sodiumqty',sodiumdv='$sodiumdv',zincqty='$zincqty',zincdv='$zincdv',pros='$pros',cons='$cons' where id='$pid' ");
$_SESSION['msg']="Product Updated Successfully !!";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Edit Product</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Insert Product</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<?php 

$query=mysqli_query($con,"select products.*,category.categoryName as catname,category.id as cid,subcategory.subcategory as subcatname,subcategory.id as subcatid from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  


?>


<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="<?php echo htmlentities($row['cid']);?>"><?php echo htmlentities($row['catname']);?></option> 
<?php $query=mysqli_query($con,"select * from category");
while($rw=mysqli_fetch_array($query))
{
	if($row['catname']==$rw['categoryName'])
	{
		continue;
	}
	else{
	?>

<option value="<?php echo $rw['id'];?>"><?php echo $rw['categoryName'];?></option>
<?php }} ?>
</select>
</div>
</div>

									
<div class="control-group">
<label class="control-label" for="basicinput">Sub Category</label>
<div class="controls">

<select   name="subcategory"  id="subcategory" class="span8 tip" required>
<option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcatname']);?></option>
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text"    name="productName"  placeholder="Enter Product Name" value="<?php echo htmlentities($row['productName']);?>" class="span8 tip" >
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Supplier Name</label>
<div class="controls">
<input type="text"    name="productCompany"  placeholder="Enter Supplier Name" value="<?php echo htmlentities($row['productCompany']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Product Price Before Discount</label>
<div class="controls">
<input type="text"    name="productpricebd"  placeholder="Enter Product Price" value="<?php echo htmlentities($row['productPriceBeforeDiscount']);?>"  class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price</label>
<div class="controls">
<input type="text"    name="productprice"  placeholder="Enter Product Price" value="<?php echo htmlentities($row['productPrice']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput"><h2>NUTRIENTS</h2></label>
<div class="controls">
<!--<input type="text"  name="energy"  placeholder="Enter energy value" rows="6" class="span8 tip">-->
</textarea>  
</div>
<br/>
<br/>
<div class="control-group">
<!--<label class="control-label" for="basicinput">Energy</label>-->
<div class="controls">
<!--<input type="text"    name="energy"  placeholder="Enter Energy value" value="<?php //echo htmlentities($row['energy']);?>" class="span8 tip" required> --> 
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Energy</label>
<div class="controls">
<input type="text"    name="energy"  placeholder="Enter Energy value" value="<?php echo htmlentities($row['energy']);?>" class="span8 tip">.kcal
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Fat</label>
<div class="controls">
<input type="text"    name="fat"  placeholder="Enter fat value" value="<?php echo htmlentities($row['fat']);?>" class="span8 tip">.g
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Protein</label>
<div class="controls">
<input type="text"    name="protein"  placeholder="Enter Protein value" value="<?php echo htmlentities($row['protein']);?>" class="span8 tip">.g
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Fiber</label>
<div class="controls">
<input type="text"    name="fiber"  placeholder="Enter Fiber value" value="<?php echo htmlentities($row['fiber']);?>" class="span8 tip">.g
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Carbs</label>
<div class="controls">
<input type="text"    name="carbs"  placeholder="Enter Carbs value" value="<?php echo htmlentities($row['carbs']);?>" class="span8 tip">.g
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput"><h2>Vitamins</h2></label>
<div class="controls">
<!--<input type="text"  name="energy"  placeholder="Enter energy value" rows="6" class="span8 tip">-->
</textarea>  
</div>
<br/>
<br/>
<div class="control-group">
<!--<label class="control-label" for="basicinput">Vitamin A Quantity</label>-->
<div class="controls">
<!--<input type="text"    name="vitaminaqty"  placeholder="Enter Vitamin A quantity value" value="<?php echo htmlentities($row['vitaminaqty']);?>" class="span8 tip" required>.mg-->
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin A Quantity</label>
<div class="controls">
<input type="text"    name="vitaminaqty"  placeholder="Enter Vitamin A quantity value" value="<?php echo htmlentities($row['vitaminaqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin A DV</label>
<div class="controls">
<input type="text"    name="vitaminadv"  placeholder="Enter Vitamin A DV value" value="<?php echo htmlentities($row['vitaminadv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin C Quantity</label>
<div class="controls">
<input type="text"    name="vitamincqty"  placeholder="Enter Vitamin C quantity value" value="<?php echo htmlentities($row['vitamincqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin C DV</label>
<div class="controls">
<input type="text"    name="vitamincdv"  placeholder="Enter Vitamin C DV value" value="<?php echo htmlentities($row['vitamincdv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin K Quantity</label>
<div class="controls">
<input type="text"    name="vitaminkqty"  placeholder="Enter Vitamin K quantity value" value="<?php echo htmlentities($row['vitaminkqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin K DV</label>
<div class="controls">
<input type="text"    name="vitaminkdv"  placeholder="Enter Vitamin K DV value" value="<?php echo htmlentities($row['vitaminkdv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Thiamin B1 Quantity</label>
<div class="controls">
<input type="text"    name="thiaminb1qty"  placeholder="Enter Thiamin B1 quantity value" value="<?php echo htmlentities($row['thiaminb1qty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Thiamin B1 DV</label>
<div class="controls">
<input type="text"    name="thiaminb1dv"  placeholder="Enter Thiamin B1 DV value" value="<?php echo htmlentities($row['thiaminb1dv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Riboflavin B2 Quantity</label>
<div class="controls">
<input type="text"    name="riboflavinb2qty"  placeholder="Enter Riboflavin B2 Quantity value" value="<?php echo htmlentities($row['riboflavinb2qty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Riboflavin B2 DV</label>
<div class="controls">
<input type="text"    name="riboflavinb2dv"  placeholder="Enter Riboflavin B2 DV value" value="<?php echo htmlentities($row['riboflavinb2dv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Niacin B3 Quantity</label>
<div class="controls">
<input type="text"    name="niacinb3qty"  placeholder="Enter Niacin B3 Quantity value" value="<?php echo htmlentities($row['niacinb3qty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Niacin B3 DV</label>
<div class="controls">
<input type="text"    name="niacinb3dv"  placeholder="Enter Niacin B3 DV value" value="<?php echo htmlentities($row['niacinb3dv']);?>" class="span8 tip">.dv
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin B6 Quantity</label>
<div class="controls">
<input type="text"    name="vitaminb6qty"  placeholder="Enter Vitamin B6 Quantity value" value="<?php echo htmlentities($row['vitaminb6qty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin B6 DV</label>
<div class="controls">
<input type="text"    name="vitaminb6dv"  placeholder="Enter Vitamin B6 DV value" value="<?php echo htmlentities($row['vitaminb6dv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput"><h2>Minerals</h2></label>
<div class="controls">
<!--<input type="text"  name="energy"  placeholder="Enter energy value" rows="6" class="span8 tip">-->
</textarea>  
</div>
<br/>
<br/>
<div class="control-group">
<!--<label class="control-label" for="basicinput">Vitamin A Quantity</label>-->
<div class="controls">
<!--<input type="text"    name="vitaminaqty"  placeholder="Enter Vitamin A quantity value" value="<?php echo htmlentities($row['vitaminaqty']);?>" class="span8 tip" required>.mg-->
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Calcium Quantity</label>
<div class="controls">
<input type="text"    name="calciumqty"  placeholder="Enter Calcium Quantity value" value="<?php echo htmlentities($row['calciumqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Calcium DV</label>
<div class="controls">
<input type="text"    name="calciumdv"  placeholder="Enter Calcium DV value" value="<?php echo htmlentities($row['calciumdv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Iron Quantity</label>
<div class="controls">
<input type="text"    name="ironqty"  placeholder="Enter Iron Quantity value" value="<?php echo htmlentities($row['ironqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Iron DV</label>
<div class="controls">
<input type="text"    name="irondv"  placeholder="Enter Iron DV value" value="<?php echo htmlentities($row['irondv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Magnesium Quantity</label>
<div class="controls">
<input type="text"    name="magnesiumqty"  placeholder="Enter Magnesium Quantity value" value="<?php echo htmlentities($row['magnesiumqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Magnesium DV</label>
<div class="controls">
<input type="text"    name="magnesiumdv"  placeholder="Enter Magnesium DV value" value="<?php echo htmlentities($row['magnesiumdv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Manganese Quantity</label>
<div class="controls">
<input type="text"    name="manganeseqty"  placeholder="Enter Manganese Quantity value" value="<?php echo htmlentities($row['manganeseqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Manganese DV</label>
<div class="controls">
<input type="text"    name="manganesedv"  placeholder="Enter Manganese DV value" value="<?php echo htmlentities($row['manganesedv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Phosphorus Quantity</label>
<div class="controls">
<input type="text"    name="phosphorusqty"  placeholder="Enter phosphorus Quantity value" value="<?php echo htmlentities($row['phosphorusqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Phosphorus  DV</label>
<div class="controls">
<input type="text"    name="phosphorusdv"  placeholder="Enter Phosphorus DV value" value="<?php echo htmlentities($row['phosphorusdv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Potassium Quantity</label>
<div class="controls">
<input type="text"    name="potassiumqty"  placeholder="Enter Potassium Quantity value" value="<?php echo htmlentities($row['potassiumqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Potassium DV</label>
<div class="controls">
<input type="text"    name="potassiumdv"  placeholder="Enter Potassium DV value" value="<?php echo htmlentities($row['potassiumdv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Sodium Quantity</label>
<div class="controls">
<input type="text"    name="sodiumqty"  placeholder="Enter Sodium Quantity value" value="<?php echo htmlentities($row['sodiumqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Sodium DV</label>
<div class="controls">
<input type="text"    name="sodiumdv"  placeholder="Enter Sodium DV value" value="<?php echo htmlentities($row['sodiumdv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Zinc Quantity</label>
<div class="controls">
<input type="text"    name="zincqty"  placeholder="Enter Zinc Quantity value" value="<?php echo htmlentities($row['zincqty']);?>" class="span8 tip">.mg
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Zinc DV</label>
<div class="controls">
<input type="text"    name="zincdv"  placeholder="Enter Zinc DV value" value="<?php echo htmlentities($row['zincdv']);?>" class="span8 tip">.%
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Pros:</label>
<div class="controls">
<textarea  name="pros"  placeholder="Enter Product Pros" value="<?php echo htmlentities($row['pros']);?>" class="span8 tip"></textarea>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Cons:</label>
<div class="controls">
<textarea  name="cons"  placeholder="Enter Product Cons" value="<?php echo htmlentities($row['cons']);?>" class="span8 tip"></textarea>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Delivery Charge</label>
<div class="controls">
<input type="text"    name="productShippingcharge"  placeholder="Enter Product Shipping Charge" value="<?php echo htmlentities($row['shippingCharge']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Availability</label>
<div class="controls">
<select   name="productAvailability"  id="productAvailability" class="span8 tip" required>
<option value="<?php echo htmlentities($row['productAvailability']);?>"><?php echo htmlentities($row['productAvailability']);?></option>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
</select>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image1</label>
<div class="controls">
<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage1']);?>" width="200" height="100"> <a href="update-image1.php?id=<?php echo $row['id'];?>">Change Image</a>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Image2</label>
<div class="controls">
<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage2']);?>" width="200" height="100"> <a href="update-image2.php?id=<?php echo $row['id'];?>">Change Image</a>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image3</label>
<div class="controls">
<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage3']);?>" width="200" height="100"> <a href="update-image3.php?id=<?php echo $row['id'];?>">Change Image</a>
</div>
</div>
<?php } ?>
	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>