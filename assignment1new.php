<html>
 <head>
  <title>PHP Test</title>
 </head>
 <?php //this is a function to generate a random hexadecimal color
  function rand_color() {
		return '#' . str_pad(dechex(mt_rand(0, 16777215)), 6, (mt_rand(0, 9)));; //the first part is prefixing the randomly generated numbers with a '#'. the str_pad function pads a string value to a specified length
	//the first parameter in the str_pad function is the variable that will be padded. in this case "dechex(mt_rand(0, 16777215))" is  our string value to be padded (dechex is converting the randomly generated values to hexadecimal values
	//with the mt_rand min and max parameters setting the min and max values for the numbers that are to be converted to hexadecimal values) the 6 represents the desired length of the padding to be appended to the #. The (mt_rand(0, 9) parameter instructs 
	//the function to fill any empty spots that would occur if a number less than 6 digits is randomly generated with a random number 0-9 instead of the default white space, because the default added white space would result in an invalid color value. 
	//we could have simply used 0 or any other integer to fill this space, but using the rand function makes the generated colors a little closer to actually being random. 
}
?>
 <table>
 <tbody>
 
 <?php for($x=0; $x<10; $x++){ //this loop will run 10 times, making our table
 ?>
<tr>
		<?php for($i=0; $i<10; $i++){// this loop will run 10 times each time the previous loop runs, starting a new row each time. this will give us our 10x10 grid. ?> 
			<td style= "background-color:<?php $box1 = rand_color(); echo $box1 ?>;"> <?php echo $box1 ?><br/><span style="color:#ffffff;"><?php echo $box1 ?></span></td> <!- This line generates a cell for our 10x10 grid and as such will be repeated 100 times. after 
			the first 10 cells we will start a new row with the second loop. we generate a random hexadecimal value with the rand color function, and then assign it to our variable, box 1. now box1 will hold that same randomly generated value until we generate a new one and re assign it,
			which we will do at the start of the next cell. we need the box1 variable in order for the text of the hexadecimal value to be the same as the actual color. if we used rand_color everytime it would generte 2 other random values to display in the box, no good.
			If we didnt run the randcolor function at the start of the next cell, all of our cells would be the same color. So by running the randcolor function only at the start of a cell, then using the variable to echo the value twice for text we are able to 
			re use the same variable for every cell, otherwise we would need 100 variables and that would get really tiresome. ->
	  <?php	}?>
</tr>
 <?php } ?>
 


 </tbody>
 </table>
 
</html>