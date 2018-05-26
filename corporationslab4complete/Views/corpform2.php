<div id=CorpForm>
<?php

?>

<form action='index.php'<?php echo $id; ?> method='post'>
	<label for='corp'>Corporation: </label>
	<input type='text' name='corp' /><br />
	<label for='email'>Email: </label>
	<input type='text' name='email' /><br />
	<input type='hidden' name='incorp_dt'  /><br />
	<label for='zipcode'>Zip Code: </label>
	<input type='text' name='zipcode'   /><br />
	<label for='owner'>Owner: </label>
	<input type='text' name='owner'   /><br />
	<label for='phone'>Phone: </label>
	<input type='text' name='phone'  /><br />
	<input type="hidden" name="id" />
	<input type='submit' id="button" name='action' value="Back to View" />
	<input type='submit' name='action' value="<?php echo $value;?>"/>
</form>
</div>