
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
	$productimage1=$_FILES["productimage1"]["name"];
	$productimage2=$_FILES["productimage2"]["name"];
	$productimage3=$_FILES["productimage3"]["name"];
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
//for getting product id
$query=mysqli_query($con,"select max(id) as pid from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="productimages/$productid";
if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}

	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]);
$sql=mysqli_query($con,"insert into products(category,subCategory,productName,productCompany,productPrice,productDescription,shippingCharge,productAvailability,productImage1,productImage2,productImage3,productPriceBeforeDiscount,energy,fat,protein,fiber,carbs,vitaminaqty,vitaminadv,vitamincqty,vitamincdv,vitaminkqty,vitaminkdv,thiaminb1qty,thiaminb1dv,riboflavinb2qty,riboflavinb2dv,niacinb3qty,niacinb3dv,vitaminb6qty,vitaminb6dv,calciumqty,calciumdv,ironqty,irondv,magnesiumqty,magnesiumdv,manganeseqty,manganesedv,phosphorusqty,phosphorusdv,potassiumqty,potassiumdv,sodiumqty,sodiumdv,zincqty,zincdv,pros,cons) values('$category','$subcat','$productname','$productcompany','$productprice','$productdescription','$productscharge','$productavailability','$productimage1','$productimage2','$productimage3','$productpricebd','$energy','$fat','$protein','$fiber','$carbs','$vitaminaqty','$vitaminadv','$vitamincqty','$vitamincdv','$vitaminkqty','$vitaminkdv','$thiaminb1qty','$thiaminb1dv','$riboflavinb2qty','$riboflavinb2dv','$niacinb3qty','$niacinb3dv','$vitaminb6qty','$vitaminb6dv','$calciumqty','$calciumdv','$ironqty','$irondv','$magnesiumqty','$magnesiumdv','$manganeseqty','$manganesedv','$phosphorusqty','$phosphorusdv','$potassiumqty','$potassiumdv','$sodiumqty','$sodiumdv','$zincqty','$zincdv','$pros','$cons')");
$_SESSION['msg']="Product Inserted Successfully !!";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Product</title>
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

<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
<?php } ?>
</select>
</div>
</div>

									
<div class="control-group">
<label class="control-label" for="basicinput">Sub Category</label>
<div class="controls">
<select   name="subcategory"  id="subcategory" class="span8 tip" required>
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text"    name="productName"  placeholder="Enter Product Name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Supplier</label>
<div class="controls">
<input type="text"    name="productCompany"  placeholder="Enter Supplier name" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Product Price Before Discount</label>
<div class="controls">
<input type="text"    name="productpricebd"  placeholder="Enter Product Price" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price After Discount(Selling Price)</label>
<div class="controls">
<input type="text"    name="productprice"  placeholder="Enter Product Price" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput"><h2>NUTRIENTS</h2></label>
<div class="controls">
<!--<input type="text"  name="energy"  placeholder="Enter energy value" rows="6" class="span8 tip">-->
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Energy</label>
<div class="controls">
<input type="text"  name="energy"  placeholder="Enter energy value" rows="6" class="span8 tip">.kcal
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Fat</label>
<div class="controls">
<input type="text"  name="fat"  placeholder="Enter fat value" rows="6" class="span8 tip">.g
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Protein</label>
<div class="controls">
<input type="text"  name="protein"  placeholder="Enter Protein value" rows="6" class="span8 tip">.g
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Fiber</label>
<div class="controls">
<input type="text"  name="fiber"  placeholder="Enter Fiber value" rows="6" class="span8 tip">.g
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Carbs</label>
<div class="controls">
<input type="text"  name="carbs"  placeholder="Enter carb value" rows="6" class="span8 tip">.g
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput"><h2>Vitamins</h2></label>
<div class="controls">
<!--<input type="text"  name="energy"  placeholder="Enter energy value" rows="6" class="span8 tip">-->
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin A Quantity</label>
<div class="controls">
<input type="text"  name="vitaminaqty"  placeholder="Enter Vitamin A quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin A %DV</label>
<div class="controls">
<input type="text"  name="vitaminadv"  placeholder="Enter Vitamin A %dv" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin C Quantity</label>
<div class="controls">
<input type="text"  name="vitamincqty"  placeholder="Enter Vitamin C quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin C %DV</label>
<div class="controls">
<input type="text"  name="vitamincdv"  placeholder="Enter Vitamin C %dv" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin K Quantity</label>
<div class="controls">
<input type="text"  name="vitaminkqty"  placeholder="Enter Vitamin K quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin K %DV</label>
<div class="controls">
<input type="text"  name="vitaminkdv"  placeholder="Enter Vitamin K %dv" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Thiamin B1 Quantity</label>
<div class="controls">
<input type="text"  name="thiaminb1qty"  placeholder="Enter Thiamin B1 quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Thiamin B1 %DV</label>
<div class="controls">
<input type="text"  name="thiaminb1dv"  placeholder="Enter Thiamin B1 %dv" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Riboflavin B2 Quantity</label>
<div class="controls">
<input type="text"  name="riboflavinb2qty"  placeholder="Enter Riboflavin B2 quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Riboflavin B2 %DV</label>
<div class="controls">
<input type="text"  name="riboflavinb2dv"  placeholder="Enter Riboflavin B2 %dv" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Niacin B3 Quantity</label>
<div class="controls">
<input type="text"  name="niacinb3qty"  placeholder="Enter Niacin B3 Quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Niacin B3 %DV</label>
<div class="controls">
<input type="text"  name="niacinb3dv"  placeholder="Enter Niacin B3 %dv" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin B6 Quantity</label>
<div class="controls">
<input type="text"  name="vitaminb6qty"  placeholder="Enter Vitamin B6 Quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Vitamin B6 %DV</label>
<div class="controls">
<input type="text"  name="vitaminb6dv"  placeholder="Enter Vitamin B6 %dv" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput"><h2>Minerals</h2></label>
<div class="controls">
<!--<input type="text"  name="energy"  placeholder="Enter energy value" rows="6" class="span8 tip">-->
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Calcium Quantity</label>
<div class="controls">
<input type="text"  name="calciumqty"  placeholder="Enter Calcium Quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Calcium DV</label>
<div class="controls">
<input type="text"  name="calciumdv"  placeholder="Enter Calcium DV" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Iron Quantity</label>
<div class="controls">
<input type="text"  name="ironqty"  placeholder="Enter Iron Quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Iron Dv</label>
<div class="controls">
<input type="text"  name="irondv"  placeholder="Enter Iron Dv" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Magnesium Quantity</label>
<div class="controls">
<input type="text"  name="magnesiumqty"  placeholder="Enter Magnesium Quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Magnesium DV</label>
<div class="controls">
<input type="text"  name="magnesiumdv"  placeholder="Enter Magnesium DV" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Manganese Quantity</label>
<div class="controls">
<input type="text"  name="manganeseqty"  placeholder="Enter Manganese Quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Manganese DV</label>
<div class="controls">
<input type="text"  name="manganesedv"  placeholder="Enter Manganese DV" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Phosphorus Quantity</label>
<div class="controls">
<input type="text"  name="phosphorusqty"  placeholder="Enter Phosphorus Quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Phosphorus DV</label>
<div class="controls">
<input type="text"  name="phosphorusdv"  placeholder="Enter Phosphorus DV" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Sodium Quantity</label>
<div class="controls">
<input type="text"  name="sodiumqty"  placeholder="Enter Sodium Quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Sodium DV</label>
<div class="controls">
<input type="text"  name="sodiumdv"  placeholder="Enter Sodium DV" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Zinc Quantity</label>
<div class="controls">
<input type="text"  name="zincqty"  placeholder="Enter Zink Quantity" rows="6" class="span8 tip">.mg
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Zinc DV</label>
<div class="controls">
<input type="text"  name="zincdv"  placeholder="Enter Zinc DV" rows="6" class="span8 tip">.%
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput"><h2>Pros:</h2></label>
<div class="controls">
<textarea type="textarea"  name="pros"  placeholder="Enter pros" rows="6" class="span8 tip">
</textarea>  
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput"><h2>Cons:</h2></label>
<div class="controls">
<textarea type="text"  name="cons"  placeholder="Enter cons" rows="6" class="span8 tip">
</textarea>  
</div>
</div>







<div class="control-group">
<label class="control-label" for="basicinput">Delivery Charge</label>
<div class="controls">
<input type="text"    name="productShippingcharge"  placeholder="Enter Product Shipping Charge" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Availability</label>
<div class="controls">
<select   name="productAvailability"  id="productAvailability" class="span8 tip" required>
<option value="">Select</option>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
</select>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image1</label>
<div class="controls">
<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Image2</label>
<div class="controls">
<input type="file" name="productimage2"  class="span8 tip" required>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image3</label>
<div class="controls">
<input type="file" name="productimage3"  class="span8 tip">
</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Insert</button>
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