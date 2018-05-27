<div id=CorpForm>
<?php
//var_dump($corp);

$id = "";

if ($corp['id']>0){
	$id = "?id=" . $corp['id'];
}
?>

<form action='index.php' method='post'>
	<label for='corp'>Corporation: </label>
	<input type='text' name='corp' value= "<?php echo $corp['corp']; ?>" /><br />
	<label for='email'>Email: </label>
	<input type='text' name='email' value="<?php echo $corp['email']; ?>" /><br />
	<input type='hidden' name='incorp_dt' value= "<?php echo $corp['incorp_dt']; ?>" /><br />
	<label for='zipcode'>Zip Code: </label>
	<input type='text' name='zipcode' value="<?php echo $corp['zipcode']; ?>" /><br />
	<label for='owner'>Owner: </label>
	<input type='text' name='owner' value="<?php echo $corp['owner']; ?>" /><br />
	<label for='phone'>Phone: </label>
	<input type='text' name='phone' value="<?php echo $corp['phone']; ?>" /><br />
	<input type="hidden" name="id" value="<?php echo $corp['id']; ?>"/>
	<input type='submit' id="button" name='action' value="Back to View" />
	<input type='submit' name='action' value="<?php echo $value;?>"/>
</form>
</div>