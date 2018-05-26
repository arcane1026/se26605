<form method = "post" action = "">
 
 <div>
 <label for = "col">Sort by &nbsp&nbsp&nbsp&nbsp</label>
 <select id="col"
     name="col">
 
<option value = "id">ID</option>
<option value = "corp">Corp</option>
<option value = "email">Email</option>
<option value = "incorp_dt">incorp_dt</option>
<option value = "phone">phone</option>
<option value = "zipcode">ZipCode</option>
<option value = "owner">Owner</option>

 
 </select>

 
    <input type="radio" id="upordown"
     name="upordown" value="asc">
    <label for="Ascending">Ascending</label>

    <input type="radio" id="upordown"
     name="upordown" value="desc">
    <label for="Descending">Descending</label>
	
	
	<button type="submit" name="action" value="Sort" class="btn btn-success">Sort</button>
	
	<button type="submit" name="action" value="Reset" class="btn btn-warning">Reset</button>
	</div>
	</form>
	<form method = "post" action = "">
	<div>
	&nbsp&nbsp&nbsp&nbsp
	</div>
	<div>
	
	
	 <label for = "col2">Search By</label>
	 
	<select id="col2"
     name="col2">
 
<option value = "id">ID</option>
<option value = "corp">Corp</option>
<option value = "email">Email</option>
<option value = "incorp_dt">incorp_dt</option>
<option value = "phone">phone</option>
<option value = "zipcode">ZipCode</option>
<option value = "owner">Owner</option>

 
 </select>
 <input type="text" name = "termsearch" id = "termsearch"  placeholder="Search....">
 <div>
	&nbsp&nbsp&nbsp&nbsp
	</div>
	

 
   
	
	<button type="submit" name="action" value="Search" id = "Search" class="btn btn-success">Search</button>
	
	<button type="submit" name="action" value="Reset" class="btn btn-warning">Reset</button>
	 
</div>
</form>