<?php 
require_once("config.php"); 
if( isset($_SESSION['id']))
{ 
	
	if( isset($_GET['action']) ) { //log

    	if( $_GET['action'] == "category_name" ) { //login user
    
    		 $category_name = htmlspecialchars($_POST['category_name'], ENT_QUOTES);
    	    //$returnlink=htmlspecialchars($_POST['returnlink'], ENT_QUOTES);
    	    
    	     $attachment = file_get_contents($_FILES['attachment']['tmp_name']);
	    	 $attachment = base64_encode($attachment);
	    	 
	    	 
    	    if($category_name!="") { 
    
    			$headers = array(
    				"Accept: application/json",
    				"Content-Type: application/json",
    				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
    			);
    
    			$data = array(
    				"name" => $category_name,
    				"user_id" => @$_SESSION['id'],
    				"image" => array("file_data" => $attachment),
    			);
    
    			$ch = curl_init( $baseurl.'addCategory' );
    
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    			$return = curl_exec($ch);
    
    			$json_data = json_decode($return, true);
    
    			$curl_error = curl_error($ch);
    			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    			//echo $baseurl.'addCategory';
    			//print_r(json_encode($data));
    			//die();
    			
    			curl_close($ch);
    
    			if($json_data['code'] == 201){
    				echo "<script>window.location='dashboard.php?p=allCategory&action=error'</script>";
    			} 
    			else 
    			{	
    			
    				echo "<script>window.location='dashboard.php?p=allCategory&action=success'</script>";
    
    			}
    
    		} 
    		else 
    		{
    			echo "<script>window.location='dashboard.php?p=allCategory&action=error'</script>";
    		} 
    
    	} //login user = end
        else
        if( $_GET['action'] == "delete_category" ) { //login user
    
    		 $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    	    //$returnlink=htmlspecialchars($_POST['returnlink'], ENT_QUOTES);
    	    
    	     $attachment = file_get_contents($_FILES['attachment']['tmp_name']);
	    	 $attachment = base64_encode($attachment);
	    	 
	    	 
    	    if($id!="") { 
    
    			$headers = array(
    				"Accept: application/json",
    				"Content-Type: application/json",
    				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
    			);
    
    			$data = array(
    				"cat_id" => $id
    			);
    
    			$ch = curl_init( $baseurl.'deleteCategory' );
    
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    			$return = curl_exec($ch);
    
    			$json_data = json_decode($return, true);
    
    			$curl_error = curl_error($ch);
    			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    			//echo $json_data['code'];
    			//print_r(json_encode($data));
    			//die();
    			
    			curl_close($ch);
    
    			if($json_data['code'] == 201){
    				echo "<script>window.location='dashboard.php?p=allCategory&action=error'</script>";
    			} 
    			else 
    			{	
    			
    				echo "<script>window.location='dashboard.php?p=allCategory&action=success'</script>";
    
    			}
    
    		} 
    		else 
    		{
    			echo "<script>window.location='dashboard.php?p=allCategory&action=error'</script>";
    		} 
    
    	}
        else
        if( $_GET['action'] == "edit_category" ) { //login user
    
    		 $category_name = htmlspecialchars($_POST['category_name'], ENT_QUOTES);
    		 $cat_id = htmlspecialchars($_POST['cat_id'], ENT_QUOTES);
    	    
    	     $attachment = file_get_contents($_FILES['attachment']['tmp_name']);
	    	 $attachment = base64_encode($attachment);
	    	 
	    	 
    	    if($category_name!="") { 
    
    			$headers = array(
    				"Accept: application/json",
    				"Content-Type: application/json",
    				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
    			);
    
    			$data = array(
    				"cat_id" => $cat_id,
    				"name" => $category_name,
    				"user_id" => @$_SESSION['id'],
    				"image" => array("file_data" => $attachment),
    			);
    
    			$ch = curl_init( $baseurl.'editCategory' );
    
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    			$return = curl_exec($ch);
    
    			$json_data = json_decode($return, true);
    
    			$curl_error = curl_error($ch);
    			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    			//echo $baseurl.'addCategory';
    			//print_r(json_encode($data));
    			//die();
    			
    			curl_close($ch);
    
    			if($json_data['code'] == 201){
    				echo "<script>window.location='dashboard.php?p=allCategory&action=error'</script>";
    			} 
    			else 
    			{	
    			
    				echo "<script>window.location='dashboard.php?p=allCategory&action=success'</script>";
    
    			}
    
    		} 
    		else 
    		{
    			echo "<script>window.location='dashboard.php?p=allCategory&action=error'</script>";
    		} 
    
    	}
    	
    
    } //log = end
	?>

	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  	<!--<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
  	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('#data1').DataTable();
		} );
	</script>

	
	<h2 class="title left">All Categories</h2>
	
	<div class="right" style="padding: 10px 0;">
	    <a href="#" onclick="addCategory();">
            <button class='buttonColor' style="padding:  8px 8px; border:  0px; border-radius:  3px;">Add Category</button>
        </a>
    </div>
	
	<?php 
		
		$headers = array(
			"Accept: application/json",
			"Content-Type: application/json"
		);

		$data = array(
			//"user_id" => $user_id
		);

		$ch = curl_init( $baseurl.'showCategories' );
       
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$return = curl_exec($ch);

		$json_data = json_decode($return, true);
	    //var_dump($return);

		$curl_error = curl_error($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        //echo count($json_data['msg']);
        ///print_r($json_data);
		//echo $json_data['code'];
		//die;

		if($json_data['code'] != "200"){
			//echo "<div class='alert alert-danger'>Error in fetching order history, try again later..</div>";
			?>
			<div class="textcenter nothingelse">
				<img src="img/noorder.png" alt="" />
				<h3>No Record Found2</h3>
			</div>
			<?php

		} else {
			?>
			
			<?php 
			
			$rows = count($json_data['msg']);
			if( $rows == 0 ) {
				?>
				<div class="textcenter nothingelse">
					<img src="img/noorder.png" alt="" />
					<h3>No Record Found1</h3>
				</div>
				<?php
			}
			echo "<table id='data1' class='display' style='width:100%''>
			<thead>
	            <tr>
	                <th>ID</th>
	                <th>Image</th>
	                <th>Name</th>
	                <th>Owner</th>
	                <th>Created</th>
	                <th>Action</th>
	            </tr>
	        </thead>
			<tbody id='myTable_row'>";
			
			foreach( $json_data['msg'] as $str => $val ) {
				//var_dump($val);
				?>
				<tr style=" text-align: center;">
					<td>
						<?php 
							echo $val['Category']['id']; 
						?>
					</td>
					<td>
						<img src="<?php echo $img_baseurl.$val['Category']['thumb']; ?>" width="80px" height="80px" style="border-radius: 50%;">	
					</td>
					
					<td style="line-height: 20px;">
						<?php echo $val['Category']['name']; ?>		
					</td>
					<td>
						<?php 
							echo $val['User']['first_name']." ".$val['User']['last_name'];
						?>
					</td>
					
					<td>
						<?php 
							echo $val['Category']['created']; 
						?>
					</td>
					
					<td>
						<i onclick="myFunction('dropdown_<?php echo $val['Category']['id']; ?>')" class="fas fa-ellipsis-h" style="cursor: pointer;font-size: 18px;"></i>
						<div id="dropdown_<?php echo $val['Category']['id']; ?>" class="w3-dropdown-content w3-bar-block w3-border">
                          <span onClick="editCategory('<?php echo $val['Category']['id']; ?>')" class="w3-bar-item w3-button">
                            <i class="fas fa-edit"></i>&nbsp;
                            Edit
                          </span>
                          
                          <a href="?p=allCategory&action=delete_category&id=<?php echo $val['Category']['id']; ?>" class="w3-bar-item w3-button red">
                            <i class="fas fa-trash"></i>&nbsp;
                            Delete Category
                          </a>
                          
                        </div>
					</td>
					
					
					
				</tr>
				<?php
			}
			echo "</tbody>
			<tfoot>
	            <tr>
	                <th>ID</th>
	                <th>Name</th>
	                <th>Owner</th>
	                <th>Image</th>
	                <th>Created</th>
	                <th>Action</th>
	            </tr>
	        </tfoot>
	        </table> <nav><ul class='pagination pagination-sm' id='myPager'></ul></nav>";
			///
		}

		curl_close($ch);
	?>

	<script>
		
		
		function myFunction(data) 
		{
          var x = document.getElementById(data);
          if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
          } else { 
            x.className = x.className.replace(" w3-show", "");
          }
        }
        
		function addCategory()
		{	
			//alert(data1);
			document.getElementById("PopupParent").style.display="block";
		    document.getElementById("contentReceived").innerHTML="<div style='margin-top:150px;' align='center'><img src='img/loader.gif' width='150px'></div>";
		    var xmlhttp;
		    if(window.XMLHttpRequest)
		      {// code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp=new XMLHttpRequest();
		      }
		    else
		      {// code for IE6, IE5
		        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		      }
		      
		      xmlhttp.onreadystatechange=function()
		      {
		        if(xmlhttp.readyState==4 && xmlhttp.status==200)
		        {
		           // alert(xmlhttp.responseText);
		           document.getElementById('contentReceived').innerHTML=xmlhttp.responseText;
		        }
		      }
		    xmlhttp.open("GET","ajex-events.php?action=addCategory");
		    xmlhttp.send();
		}
		
		function editCategory(data)
		{	
			//alert(data1);
			document.getElementById("PopupParent").style.display="block";
		    document.getElementById("contentReceived").innerHTML="<div style='margin-top:150px;' align='center'><img src='img/loader.gif' width='150px'></div>";
		    var xmlhttp;
		    if(window.XMLHttpRequest)
		      {// code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp=new XMLHttpRequest();
		      }
		    else
		      {// code for IE6, IE5
		        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		      }
		      
		      xmlhttp.onreadystatechange=function()
		      {
		        if(xmlhttp.readyState==4 && xmlhttp.status==200)
		        {
		           // alert(xmlhttp.responseText);
		           document.getElementById('contentReceived').innerHTML=xmlhttp.responseText;
		        }
		      }
		    xmlhttp.open("GET","ajex-events.php?action=editCategory&id="+data);
		    xmlhttp.send();
		}
	
		
	</script>



<?php } else {
	
	@header("Location: index.php");
    echo "<script>window.location='index.php'</script>";
    die;
    
} ?>