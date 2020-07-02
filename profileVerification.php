<?php 
require_once("config.php"); 
if( isset($_SESSION['id']))
{ 
	
	if( isset($_GET['action']) ) { //log

    	if( $_GET['action'] == "decline" || $_GET['action'] == "approve" ) { //login user
    
    		 $fb_id = htmlspecialchars($_GET['fb_id'], ENT_QUOTES);
    	     $action = htmlspecialchars($_GET['action'], ENT_QUOTES);
    	     if($fb_id!="") 
    	     { 
    
    			$headers = array(
    				"Accept: application/json",
    				"Content-Type: application/json",
    				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
    			);
    
    			$data = array(
    				"fb_id" => $fb_id,
    				"action"=>$action
    			);
                
                
    			$ch = curl_init( $baseurl.'updateVerificationStatus' );
    
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    			$return = curl_exec($ch);
    
    			$json_data = json_decode($return, true);
    
    			$curl_error = curl_error($ch);
    			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    			//echo $json_data['code'];
    			//print_r($json_data);
    			//die();
    			
    			curl_close($ch);
    
    			if($json_data['code'] == 201){
    				echo "<script>window.location='dashboard.php?p=profileVerification&action=error'</script>";
    			} 
    			else 
    			{	
    			
    				echo "<script>window.location='dashboard.php?p=profileVerification&action=success'</script>";
    
    			}
    
    		} 
    		else 
    		{
    			echo "<script>window.location='dashboard.php?p=profileVerification&action=error'</script>";
    		} 
    
    	} //login user = end
    
    
    	
    
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

	
	<h2 class="title left">All Verification Request</h2>
	
	
	<?php 
		
		$headers = array(
			"Accept: application/json",
			"Content-Type: application/json"
		);

		$data = array(
			//"user_id" => $user_id
		);

		$ch = curl_init( $baseurl.'allProfileVerification' );
       
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
			
			<?php

		} else {
			?>
			
			<?php 
			
			$rows = count($json_data['msg']);
			if( $rows == 0 ) {
				?>
				
				<?php
			}
			echo "<table id='data1' class='display' style='width:100%''>
			<thead>
	            <tr>
	                <th>ID</th>
	                <th>Name</th>
	                <th>Attachment</th>
	                <th>Username</th>
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
							echo $val['fb_id']; 
						?>
					</td>
					<td style="line-height: 20px;">
						<?php 
							echo $val['user_info']['first_name']." ".$val['user_info']['last_name'];
						?>		
					</td>
					<td>
						<img src="data:image/png;base64,<?php echo $val['attachment'];  ?>" style="width: 100px;">
					</td>
					<td>
						<?php echo $val['user_info']['username'];  ?>
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
                                    
                                    <a href="?p=profileVerification&action=approve&fb_id=<?php echo $val['fb_id']; ?>" style="color: red;text-decoration: none;">
                                        <li class="more-menu-item" role="presentation">
                                            <button type="button" class="more-menu-btn" role="menuitem">Approved</button>
                                        </li>
                                    </a>
                                    
                                    <a href="?p=profileVerification&action=decline&fb_id=<?php echo $val['fb_id']; ?>" style="color: red;text-decoration: none;">
                                        <li class="more-menu-item" role="presentation">
                                            <button type="button" class="more-menu-btn" role="menuitem">Decline</button>
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
	                <th>Attachment</th>
	                <th>Username</th>
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
		
		function addNewChat()
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
		    xmlhttp.open("GET","ajex-events.php?roomname=ok");
		    xmlhttp.send();
		}
	
		
	</script>



<?php } else {
	
	@header("Location: index.php");
    echo "<script>window.location='index.php'</script>";
    die;
    
} ?>