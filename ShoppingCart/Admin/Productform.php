<div id=ProductForm>
<?php
//var_dump($product);

$id = "";

if ($product['id']>0){
	$id = "?id=" . $product['id'];
}
?>

<form action='Adminindex.php' method='post'>
	<label for='product'>Product: </label>
	<input type='text' name='product' value= "<?php echo $product['name']; ?>" /><br />
	<label for='price'>Price: </label>
	<input type='text' name='price' value="<?php echo $product['price']; ?>" /><br />
	
	
	<input type="hidden" name="id" value="<?php echo $product['id']; ?>"/>
	<input type='submit' id="button" name='action' value="Back to View" />
	<input type='submit' name='action' value="<?php echo $value;?>"/>
</form>
</div>