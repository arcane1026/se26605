<?php
//php extension but for now this is gonna be straight up html
//php doesnt have anything to do with an id
?>
<form method='post' action='index.php'>
<label for='corp'>Corp: </label>
	<input type='text' name='corp' value='' /><br />
<label for='email'>email: </label>
	<input type='text' name='email' value='' /><br />
<label for='zipcode'>zipcode: </label>
	<input type='text' name='zipcode' value='' /><br />
<label for='owner'>owner: </label>
	<input type='text' name='owner' value='' /><br />
<label for='phone'>phone: </label>
	<input type='text' name='phone' value='' /><br />
	
<input type='submit' name='action' value='Save' />
<input type='submit' name='action' value='View' />
</form>
