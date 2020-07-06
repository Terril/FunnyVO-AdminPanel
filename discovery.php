<?php 
require_once("config.php"); 
if( isset($_SESSION['id']))
{ 
	
	if( isset($_GET['action']) ) { //log

    	if( $_GET['action'] == "edit_discovery_section" ) { //login user
    
    		 $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    	     $section_name=$_POST['section_name'];
    	    
    	    $headers = array(
				"Accept: application/json",
				"Content-Type: application/json",
				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
			);

			$data = array(
				"id" => $id,
				"section_name" => $section_name
			);
            $ch = curl_init( $baseurl.'discovery_sections_edit' );

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$return = curl_exec($ch);

			$json_data = json_decode($return, true);

			$curl_error = curl_error($ch);
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// 			echo json_encode($data);
// 			print_r($return);
// 			die();
			
			curl_close($ch);

			if($json_data['code'] == 201){
				echo "<script>window.location='dashboard.php?p=discovery&action=error'</script>";
			} 
			else 
			{	
			
				echo "<script>window.location='dashboard.php?p=discovery&action=success'</script>";

			}
    
    	} //login user = end
        else
        if( $_GET['action'] == "Add_Discovery_section" ) { //login user
    
    		 $section_name=$_POST['section_name'];
    	    
    	    $headers = array(
				"Accept: application/json",
				"Content-Type: application/json",
				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
			);

			$data = array(
				"section_name" => $section_name
			);
            $ch = curl_init( $baseurl.'add_discovery_Section' );

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$return = curl_exec($ch);

			$json_data = json_decode($return, true);

			$curl_error = curl_error($ch);
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// 			echo json_encode($data);
// 			print_r($return);
// 			die();
			
			curl_close($ch);

			if($json_data['code'] == 201){
				echo "<script>window.location='dashboard.php?p=discovery&action=error'</script>";
			} 
			else 
			{	
			
				echo "<script>window.location='dashboard.php?p=discovery&action=success'</script>";

			}
    
    	}
    	else
    	if( $_GET['action'] == "delete_Discovery_section" ) { //login user
    
    		 $id=$_GET['id'];
    	    
    	    $headers = array(
				"Accept: application/json",
				"Content-Type: application/json",
				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
			);

			$data = array(
				"id" => $id
			);
            $ch = curl_init( $baseurl.'delete_discovery_Section' );

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$return = curl_exec($ch);

			$json_data = json_decode($return, true);

			$curl_error = curl_error($ch);
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// 			echo json_encode($data);
// 			print_r($return);
// 			die();
			
			curl_close($ch);

			if($json_data['code'] == 201){
				echo "<script>window.location='dashboard.php?p=discovery&action=error'</script>";
			} 
			else 
			{	
			
				echo "<script>window.location='dashboard.php?p=discovery&action=success'</script>";

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

	
	<h2 class="title left">Discovery Sections</h2>
	
	<div class="right" style="padding: 10px 0;">
        <button style="background:  #C82D32; color:  white; padding:  8px 8px; border:  0px; border-radius:  3px;" onclick="AddDiscovery('1');">Add Discovery Section</button>
    </div>
	<div class="clear"></div>
	<?php 
		
		$headers = array(
			"Accept: application/json",
			"Content-Type: application/json"
		);

		$data = array(
			//"user_id" => $user_id
		);

		$ch = curl_init( $baseurl.'all_discovery_sections' );
       
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$return = curl_exec($ch);

		$json_data = json_decode($return, true);
	   // var_dump($return);

		$curl_error = curl_error($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        //echo count($json_data['msg']);
        //print_r($json_data);
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
	                <th>Name</th>
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
							echo $val['id']; 
						?>
					</td>
					<td style="line-height: 20px;">
						<?php 
							echo $val['section_name'];
						?>		
					</td>
					
					
				    <td>
						<?php 
							echo $val['created']; 
						?>
					</td>
					<td>
					    <div class="more">
                            <button id="more-btn" class="more-btn">
                                <span class="more-dot"></span>
                                <span class="more-dot"></span>
                                <span class="more-dot"></span>
                            </button>
                            <div class="more-menu">
                                <div class="more-menu-caret">
                                    <div class="more-menu-caret-outer"></div>
                                    <div class="more-menu-caret-inner"></div>
                                </div>
                                <ul class="more-menu-items" tabindex="-1" role="menu" aria-labelledby="more-btn" aria-hidden="true">
                                    <li class="more-menu-item" role="presentation" onclick="editDiscovery('<?php echo $val['id'];?>');">
                                        <button type="button" class="more-menu-btn" role="menuitem">Edit</button>
                                    </li>
                                    <a href="dashboard.php?p=discovery&action=delete_Discovery_section&id=<?php echo $val['id'];?>" style="color: red;text-decoration: none;">
                                        <li class="more-menu-item" role="presentation">
                                            <button type="button" class="more-menu-btn" role="menuitem">Delete</button>
                                        </li>
                                    </a>
                                </ul>
                            </div>
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
		
		function editDiscovery(id)
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
		    xmlhttp.open("GET","ajex-events.php?action=editDiscovery&id="+id);
		    xmlhttp.send();
		}
	    
	    function AddDiscovery()
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
		    xmlhttp.open("GET","ajex-events.php?action=AddDiscovery");
		    xmlhttp.send();
	    }
		
	</script>



<?php } else {
	
	@header("Location: index.php");
    echo "<script>window.location='index.php'</script>";
    die;
    
} ?>