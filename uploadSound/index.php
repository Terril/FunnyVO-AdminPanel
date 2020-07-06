<?php
require_once("../config.php"); 



if(@$_GET['submit_video']=="ok")
{   
    $alltitles=@$_POST['title'];
    $alltags=@$_POST['tagss'];
    $allurl=@$_POST['url'];
    $allSection=@$_POST['section_name'];
    if($alltitles!="" && $alltags!="" && $allurl!="")
    {
        @require_once("../config.php");
        $length = count($alltitles);
        for ($i = 0; $i < $length; $i++) 
        {
    
            $headers = array(
    			"Accept: application/json",
    			"Content-Type: application/json"
    		);
    
    		$data = array(
    			"fileUrl" => $allurl[$i],
    			"sound_name" => $alltitles[$i],
    			"description" => $alltags[$i],
    			"section_name" => $allSection[$i]
    		);
    
    		$ch = curl_init( $baseurl.'admin_uploadSound' );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    		$return = curl_exec($ch);
    
    		$json_data = json_decode($return, true);
    		
    		$curl_error = curl_error($ch);
    		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            
            //echo count($json_data['msg']);
            //print_r($json_data);
    		//echo $json_data['code'];
    		//die;
            
        	if($length==$i+1)
    		{
    		   echo "<script>window.location='index.php'</script>";
    		}
        }
    }
}


            $headers = array(
    			"Accept: application/json",
    			"Content-Type: application/json"
    		);
    
    		$data = array(
    			"fileUrl" => $allurl[$i],
    			"sound_name" => $alltitles[$i],
    			"description" => $alltags[$i]
    		);
    
    		$ch = curl_init( $baseurl.'admin_getSoundSection' );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    		$return = curl_exec($ch);
    
    		$json_data = json_decode($return, true);
    		
    		$curl_error = curl_error($ch);
    		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            
            $secton_form="";
            foreach( $json_data['msg'] as $str => $val ) 
            {
                $secton_form.='<option value='.$val['section_name'].'>'.$val['section_name'].'</option>';
            }
            
            $secton_form;
            

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>

/* Container */
body{
	margin:0px; 
	padding: 0px;
	font-family: Arial;
}
.container {
	display: block;
	width: 600px;
	background: #F9D48A;
	border-radius: 6px;
	line-height: normal;
	margin: 20px auto;
	border: dashed #1F2021;

}

.container1{

    display: block;
    width: 600px;
    background: #fafbfd;
    border-radius: 6px;
    line-height: normal;
    margin:20px auto;
    padding: 40px 0px;
}
.container2
{
    display: block;
    width: 600px;
    margin:0px auto;
}
.button{
   border: 0px;
   background-color: deepskyblue;
   color: white;
   padding: 5px 15px;
   margin-left: 10px;
}


.uploadedBox
{
    background: #F9D48A;
	border-radius: 6px;
	border: dashed #1F2021;
	padding: 20px;
}

.uploadedBox input ,.uploadedBox select
{
    font-size: 12px; 
    width: 100%; 
    padding: 8px; 
    border: 1px solid #d4d4d4;
    margin-bottom:10px;
}


</style>

<script>


        function deleteImge(idd)
		{   
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
		           //alert(xmlhttp.responseText);
		        }
		      }
		    xmlhttp.open("GET","delete.php?file_name="+idd);
		    xmlhttp.send();  
		    document.getElementById(idd).innerHTML = '';
		    document.getElementById(idd).style.display = "none";
		}
		
		
            $(document).ready(function(){

                //$("#but_upload").click(function(){
                $('#file').change(function(){

            	console.log($('#file')[0].files); 
            	var fileCount = $('#file')[0].files.length;
        
                
                $("#previewBox").show(); 
            	for (i = 0; i < fileCount; i++) {
        			
        			//console.log($('#file')[0].files[i]['size']); 
        
        		    var fd = new FormData();
        	        var files = $('#file')[0].files[i];
        	        fd.append('file',files);
                    
        	        $.ajax({
        	            url: 'upload.php',
        	            type: 'post',
        	            data: fd,
        	            contentType: false,
        	            processData: false,
        	            success: function(response){
        	                if(response != 0)
        	                {
        	                	var myarr = response.split(".");
        	                	//$("#previews").append('<div id='+myarr[0]+' class="uploadedBox"><div><audio controls="controls" style="border-radius: 10px; width: 100%;"><source src="upload/'+response+'" type="audio/mp4" /></audio></div><div style="margin-top:20px;"><input type="text" name="title[]" placeholder="Sound Name" required><input type="text" name="tagss[]" placeholder="Description" required><input type="text" name="url[]" value=<?php echo $sound_baseurl; ?>'+response+' required></div><div><select name="section_name[]" required><option value="">Select Section</option><?php echo $secton_form; ?></select></div><div style="padding:10px 0; font-size:12px;">'+response+' &nbsp; | &nbsp;<span style="color:red;" onclick=deleteImge("'+myarr[0]+'")>Delete</span></div></div>'); // Display image element
        	                    $("#previews").append('<div id='+myarr[0]+' class="uploadedBox"><div><audio controls="controls" style="border-radius: 10px; width: 100%;"><source src="upload/'+response+'" type="audio/mp4" /></audio></div><div style="padding:10px 0; font-size:12px;">'+response+' &nbsp; | &nbsp;<span style="color:red;" onclick=deleteImge("'+myarr[0]+'")>Delete</span></div></div>');
        	                    //$("#img").attr("src",response); 
        	                    //$(".preview img").show(); // Display image element
        
        	                }
        	                else
        	                {
        	                    alert('Upload only AAC');
        	                }
        	            },
        	        });


		}

		
		

        // var fd = new FormData();
        // var files = $('#file')[0].files[0];
        // fd.append('file',files);

        // $.ajax({
        //     url: 'upload.php',
        //     type: 'post',
        //     data: fd,
        //     contentType: false,
        //     processData: false,
        //     success: function(response){
        //         if(response != 0){
                	
        //         	//$("#previews").append(response); // Display image element

        //             $("#img").attr("src",response); 
        //             $(".preview img").show(); // Display image element
        //         }else{
        //             alert('file not uploaded');
        //         }
        //     },
        // });

    });
});
</script>


<div class="container">

	<label for="file" style="line-height: 75px;">
	    
	    <form method="post" action="" enctype="multipart/form-data" id="myform">
	        <div class='preview' align="center" style="margin-top: 40px;">
	            <img src="upload.png" width="100" height="100">
	            <h2 style="color: #80808099; font-weight: 300; margin:0px; font-family: Arial;">Upload Sound (.AAC)</h2>
	        </div>
	        <div >
	            <input type="file" id="file" name="file[]" multiple style="display: none;" />
	        </div>
	    </form>

	</label>    

</div>

<div class="container1" id="previews"></div>

<!--<form action="?submit_video=ok" method="post" id="previewBox" style="display: none;">-->
<!--    <input type="hidden" name="category" value="<?php echo @$_GET['category'] ?>">-->
<!--    <div class="container1" id="previews"></div>-->
<!--    <div class="container2"><input type="submit" value="Submit" style="border: 0;padding: 15px 20px;width: 100%;background:#84D2C0;color: white;font-size: 14px;border-radius: 5px;"></div>-->
<!--</form>-->

<br><br><br><br><br><br>
<div align="center">
<b>Note:</b>
convert mp3 file into AAC file and then upload
<br>
<a href="https://convertio.co/mp3-aac/">Convert MP3 to AAC</a>

</div>


