<?php 
require_once("config.php"); 
if( isset($_SESSION['id']))
{ 
	
	if( isset($_GET['action']) ) { //log

    	if( $_GET['action'] == "addDiscovery" ) { //login user
    
    		 $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    	     $section_name=htmlspecialchars($_POST['section_name'], ENT_QUOTES);
    	    
    	    if($section_name!="") { 
    
    			$headers = array(
    				"Accept: application/json",
    				"Content-Type: application/json",
    				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
    			);
    
    			$data = array(
    				"id" => $id,
    				"section_name" => $section_name,
    			);
    
    			$ch = curl_init( $baseurl.'addVideointoDiscovry' );
    
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    
    			$return = curl_exec($ch);
    
    			$json_data = json_decode($return, true);
    
    			$curl_error = curl_error($ch);
    			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    			curl_close($ch);
    
    			if($json_data['code'] == 201){
    				echo "<script>window.location='dashboard.php?p=all_videos&action=error'</script>";
    			} 
    			else 
    			{	
    			
    				echo "<script>window.location='dashboard.php?p=all_videos&action=success'</script>";
    
    			}
    
    		} 
    		else 
    		{
    			echo "<script>window.location='dashboard.php?p=all_videos&action=error'</script>";
    		} 
    
    	} //login user = end
        else
        if( $_GET['action'] == "deleteVideo" ) { //login user
    
    		 $id=htmlspecialchars($_GET['id'], ENT_QUOTES);
    	    
    	    if($id!="") { 
    
    			$headers = array(
    				"Accept: application/json",
    				"Content-Type: application/json",
    				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
    			);
    
    			$data = array(
    				"id" => $id
    			);
    
    			$ch = curl_init( $baseurl.'DeleteVideo' );
    
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    
    			$return = curl_exec($ch);
    
    			$json_data = json_decode($return, true);
    
    			$curl_error = curl_error($ch);
    			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    			curl_close($ch);
    
    			if($json_data['code'] == 201){
    				echo "<script>window.location='dashboard.php?p=all_videos&action=error'</script>";
    			} 
    			else 
    			{	
    			
    				echo "<script>window.location='dashboard.php?p=all_videos&action=success'</script>";
    
    			}
    
    		} 
    		else 
    		{
    			echo "<script>window.location='dashboard.php?p=all_videos&action=error'</script>";
    		} 
    
    	}
        else
        if( $_GET['action'] == "add_in_slider" ) { //login user
    
    		 $Newsid=htmlspecialchars($_GET['id'], ENT_QUOTES);
    	    
    	    if($Newsid!="") { 
    
    			$headers = array(
    				"Accept: application/json",
    				"Content-Type: application/json",
    				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
    			);
    
    			$data = array(
    				"user_id" => @$_SESSION['id'],
    				"news_id" => $Newsid
    			);
    
    			$ch = curl_init( $baseurl.'addSliderNews' );
    
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    
    			$return = curl_exec($ch);
    
    			$json_data = json_decode($return, true);
    
    			$curl_error = curl_error($ch);
    			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    			curl_close($ch);
    
    			if($json_data['code'] == 201){
    				echo "<script>window.location='dashboard.php?p=all_news&action=error'</script>";
    			} 
    			else 
    			{	
    			
    				echo "<script>window.location='dashboard.php?p=all_news&action=success'</script>";
    
    			}
    
    		} 
    		else 
    		{
    			echo "<script>window.location='dashboard.php?p=all_news&action=error'</script>";
    		} 
    
    	}else
        if( $_GET['action'] == "send_notification_of_video" ) { //login user
	
			 $video_id=$_POST['video_id'];
			 $title=$_POST['title'];
			//  $body=$_POST['body'];
			 $fb_id=$_POST['fb_id'];
			 $type=$_POST['type'];

    	    $headers = array(
				"Accept: application/json",
				"Content-Type: application/json",
				"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
			);

			$data = array(
				"video_id" => $video_id,
				"title" => $title,
				"fb_id" => $fb_id,
				"type" => $type
			);
            $ch = curl_init( $baseurl.'send_notification' );

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

			$return = curl_exec($ch);

			$json_data = json_decode($return, true);

			$curl_error = curl_error($ch);
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close($ch);

			if($json_data['code'] == 201){
				echo "<script>window.location='dashboard.php?p=all_videos&action=error'</script>";
			} 
			else 
			{	
			
				echo "<script>window.location='dashboard.php?p=all_videos&action=success'</script>";

			}
    
    	}
    
    	
    	
    
    } //log = end
	?>

	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  	<!--<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
  	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
			var length_value = parseInt(sessionStorage.datatable_length_value);
            
		    $('#data1').DataTable({
				/* Disable initial sort */
				"aaSorting": [],
				"pageLength": length_value,
				"bProcessing": true,
         		"serverSide": true,
				"ajax":{
					url :"<?php echo $baseurl.'show_allVideos_ajax';?>", // json datasource
					type: "post",  // type of method  , by default would be get
					error: function(){  // error handling code
					$("#data1_processing").css("display","none");
					}
				},
				

                dom: 'Bfrtip',

                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "thum"
                    },
                    {
                        "data": "video"
                    },
                    {
                        "data": "username"
                    },
                    {
                        "data": "sound_name"
                    },
                    {
                        "data": "section_name"
                    },
                    {
                        "data": "created"
                    },
                    {
                        "data": "action"
                    },
                ]
			});
		} );
	</script>

	
	<h2 class="title left">All Videos</h2>
	
			<?php 

			echo "<table id='data1' class='display' style='width:100%''>
			<thead>
	            <tr>
					<th>ID</th>
					<th>Video Thumb</th>
	                <th>Download</th>
	                <th>Username</th>
	                <th>Sound Name</th>
	                <th>Discovery Section</th>
	                <th>Created</th>
	                <th>Action</th>
	            </tr>
	        </thead>
			<tbody id='myTable_row'>";

			echo "</tbody>
			<tfoot>
	            <tr>
	                <th>ID</th>
	                <th>Video Thumb</th>
	                <th>Download</th>
	                <th>Username</th>
	                <th>Sound Name</th>
	                <th>Discovery Section</th>
	                <th>Created</th>
	                <th>Action</th>
	            </tr>
	        </tfoot>
	        </table> <nav><ul class='pagination pagination-sm' id='myPager'></ul></nav>";
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
        
        function addDiscovery(data)
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
		    xmlhttp.open("GET","ajex-events.php?addDiscovery=ok&id="+data);
		    xmlhttp.send();
            
        }
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
	
		function send_notification_of_video(id)
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
		    xmlhttp.open("GET","ajex-events.php?action=send_notification_of_video&id="+id);
		    xmlhttp.send();
		}




	</script>



<?php } else {
	
	@header("Location: index.php");
    echo "<script>window.location='index.php'</script>";
    die;
    
} ?>