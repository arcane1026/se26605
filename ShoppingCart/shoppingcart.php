<?php


session_start();

$prodID = array();

//session_destroy();

//checking to see if our add to cart form has been submitted 

if(filter_input(INPUT_POST, 'addtocart'))
{
	
	if(isset($_SESSION['shoppingcart'] ))
	{
		//keeping track of the amount of products in our cart
				$count = count($_SESSION['shoppingcart']);
				
				//associative array to match array keys to correct product ids
				$prodID = array_column($_SESSION['shoppingcart'], 'id');
				
				
				//checking if product with this id already exists in the array 
		if (!in_array(filter_input(INPUT_GET, 'id'), $prodID)){
					
					$_SESSION['shoppingcart'][$count] = array
		
		(
		'id' => filter_input(INPUT_GET, 'id'),
		'name' => filter_input(INPUT_POST, 'name'),
		'price' => filter_input(INPUT_POST, 'price'),
		'quantity' => filter_input(INPUT_POST, 'quantity')
		);
					
				}
				
	
		
	
	
	//next else is for if product is already in the shopping cart
	else{
		 for ($x = 0; $x < count($prodID); $x++){
			 if ($prodID[$x] == filter_input(INPUT_GET, 'id')){
				 //adding additional copies of same productid
				 $_SESSION['shoppingcart'][$x]['quantity'] += filter_input(INPUT_POST, 'quantity');
			 }
		 }
	}
	}
	
	
	
	//code for if shopping cart dosent exist yet
	else
	{//putting 
		$_SESSION['shoppingcart'][0] = array
		
		(
		'id' => filter_input(INPUT_GET, 'id'),
		'name' => filter_input(INPUT_POST, 'name'),
		'price' => filter_input(INPUT_POST, 'price'),
		'quantity' => filter_input(INPUT_POST, 'quantity')
		
		);
	}
	
}
//this is our case for removing an item from the cart. we need to loop trhough all products until we find the matching id, then remove it 
//then reset array keys to make sense again
if(filter_input(INPUT_GET, 'action') == 'delete'){
    
    foreach($_SESSION['shoppingcart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            
            unset($_SESSION['shoppingcart'][$key]);
        }
    }
    
    $_SESSION['shoppingcart'] = array_values($_SESSION['shoppingcart']);
}


//function pre_r($array){
	//echo '<pre>';
	//print_r($array);
	//echo '</pre>';
//}
//pre_r($_SESSION);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="shoppingcart.css"/>
    </head>
			<body>
				<div class ="container">
					<?php
					try{ //creating andestablishing connection
					$con = mysqli_connect('localhost','karma1026','123qwaAA_','phpclassspring2018');
					
						}
						catch(PDOException $e){
							exit("There was a problem connecting to the database");
						}

					$sql = 'SELECT * FROM products ORDER by id ASC';

					$result = mysqli_query($con, $sql);

			if ($result):
						if(mysqli_num_rows($result)>0):
							while($product = mysqli_fetch_assoc($result)):
							//the following is bootstrap code to make our website responsive when the window size or resolution changes.
							//this code will also inject our product id into URL to access correct products
							//we are also including hidden php fields so we can easily access that data later. 
							//we will also be including our add to cart button in this section of our code. 
								?>
								<div class = "col-sm-4 col-md-3"> 
									<form method = "post" action = "shoppingcart.php?action=add&id=<?php echo $product['id']; ?>">
										<div class = "products">
											<img src = "<?php echo $product['image']; ?>" class = "img-responsive" />
											<h3 class = "text-info"> <?php echo $product['name']?> </h3>
											<h3 style = "color: orange">$ <?php echo $product['price']; ?></h3>
											<input type = "text" name = "quantity" class="form-control" value = "1" />
											<input type = "hidden" name = "name" value = "<?php echo $product['name'];  ?>" />
											<input type = "hidden" name = "price" value = "<?php echo $product['price'];  ?>" />
											<input type = "submit" style = "margin-top: 5px" name = "addtocart" class = "btn btn-info" value = "Add Item To Cart"/ >
											
											
											
										</div>
									</form>
								</div>
								<?php
								
							endwhile;
							
						endif;
						
					endif;
						
					?>
					 <div style="clear:both"></div>  
        <br />  
        <div class="table-responsive">  
        <table class="table">  
            <tr><th colspan="5"><h3>Your Order</h3></th></tr>   
        <tr>  
             <th width="40%">Product Name</th>  
             <th width="10%">Quantity</th>  
             <th width="20%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php   
        if(!empty($_SESSION['shoppingcart'])):  
            
             $total = 0;  
        
             foreach($_SESSION['shoppingcart'] as $key => $product): 
        ?>  
        <tr>  
           <td><?php echo $product['name']; ?></td>  
           <td><?php echo $product['quantity']; ?></td>  
           <td>$ <?php echo $product['price']; ?></td>  
           <td>$ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
           <td>
               <a href="shoppingcart.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn-danger">Remove</div>
               </a>
           </td>  
        </tr>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);  
             endforeach;  
        ?>  
        <tr>  
             <td colspan="3" align="right">Total</td>  
             <td align="right">$ <?php echo number_format($total, 2); ?></td>  
             <td></td>  
        </tr>  
        <tr>
            <!-- Show checkout button only if the shopping cart is not empty -->
            <td colspan="5">
             <?php 
                if (isset($_SESSION['shoppingcart'])):
                if (count($_SESSION['shoppingcart']) > 0):
             ?>
                <a href="#" class="button">Checkout</a>
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  
        </table>  
         </div>
				</div>
				
			</body>
</html>