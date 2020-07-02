<?php
@require_once("config.php");


if(@$_GET['action']=="addCategory") 
{   
    
    
    ?>
        
        <h2 style="font-weight: 300;" align="center">Add Category</h2>
        
        <br><br>
       
       <form action="dashboard.php?p=allCategory&action=category_name"  enctype="multipart/form-data" method="post" novalidate="novalidate">
        
        <p style="margin-bottom: 30px;">
          <input name="category_name" required="" type="text">
          <label alt="Category Name" placeholder="Category Name"></label>
        </p>
        
        <div class="col100 left twocll">
			<label for="attachment" class="uploadbtn" style="background-color: #F9F9F9;">
			    <div style="background-image: url('img/upload.png');background-size: 15%;background-position: 50% 5px; height:80px; width:100%;background-repeat: no-repeat;"></div>
			    <h3>Select Image</h3>
				<input name="attachment" id="attachment" onchange="return Upload_image()" type="file">
			</label>
		</div>
		
        <p style="width: 100%;" class="right">
          <input value="Submit" class="buttoncolor" style="border: 0px;" type="submit">
        </p>
      </form>
       
           
    <?php

}
else
if(@$_GET['action']=="editCategory") 
{   
    
    $id = @$_GET['id'];
    
    $headers = array(
		"Accept: application/json",
		"Content-Type: application/json"
	);

	$data = array(
	    "cat_id" => $id
	);

	$ch = curl_init( $baseurl.'showCategoryDetails' );
   
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$return = curl_exec($ch);

	$json_data = json_decode($return, true);
    //var_dump($return);

	$curl_error = curl_error($ch);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	
	if(isset($_GET['id']))
    {
        $imageurl=$img_baseurl.'/'.$json_data['msg']['Category']['thumb'];
    }
    else
    {
        $imageurl="img/upload.png";
    }
    
    ?>
        
        <h2 style="font-weight: 300;" align="center">Edit Category</h2>
        
        <br><br>
       
       <form action="dashboard.php?p=allCategory&action=edit_category"  enctype="multipart/form-data" method="post" novalidate="novalidate">
        <input type="hidden" id='cat_id' name="cat_id" value="<?php echo $id; ?>">
        <p style="margin-bottom: 30px;">
          <input name="category_name" required="" type="text" value="<?php echo $json_data['msg']['Category']['name']; ?>">
          <label alt="Category Name" placeholder="Category Name"></label>
        </p>
        
        <div class="col100 left twocll">
			<label for="attachment" class="uploadbtn" style="background-color: #F9F9F9;">
			    <div style="background-image: url('<?php echo $imageurl; ?>');background-size: 23%;background-position: 50% 5px; height:80px; width:100%;background-repeat: no-repeat;"></div>
			    <h3>Select Image</h3>
				<input name="attachment" id="attachment" onchange="return Upload_image()" type="file">
			</label>
		</div>
		
        <p style="width: 100%;" class="right">
          <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
        </p>
      </form>
       
           
    <?php

}
else
if(@$_GET['action']=="editDiscovery") 
{   
    
    $id = @$_GET['id'];
    
    $headers = array(
		"Accept: application/json",
		"Content-Type: application/json"
	);

	$data = array(
	    "id" => $id
	);

	$ch = curl_init( $baseurl.'all_discovery_sections' );
   
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$return = curl_exec($ch);

	$json_data = json_decode($return, true);
    //var_dump($return);

	$curl_error = curl_error($ch);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	

    ?>
        
        <h2 style="font-weight: 300;" align="center">Edit Section</h2>
        
        <br><br>
       
       <form action="dashboard.php?p=discovery&action=edit_discovery_section"  enctype="multipart/form-data" method="post" novalidate="novalidate">
        <input type="hidden" id='id' name="id" value="<?php echo $json_data['msg'][0]['id']; ?>">
        <p style="margin-bottom: 30px;">
          <input name="section_name" required="" type="text" value="<?php echo $json_data['msg'][0]['section_name']; ?>">
          <label alt="Section Name" placeholder="Section Name"></label>
        </p>
      
        <p style="width: 100%;" class="right">
          <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
        </p>
      </form>
       
           
    <?php

}
else
if(@$_GET['action']=="AddDiscovery") 
{   
    
   
    ?>
        
        <h2 style="font-weight: 300;" align="center">Add Discovery Section</h2>
        
        <br><br>
       
       <form action="dashboard.php?p=discovery&action=Add_Discovery_section"  enctype="multipart/form-data" method="post" novalidate="novalidate">
        <p style="margin-bottom: 30px;">
          <input name="section_name" required="" type="text">
          <label alt="Section Name" placeholder="Section Name"></label>
        </p>
      
        <p style="width: 100%;" class="right">
          <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
        </p>
      </form>
       
           
    <?php

}
else
if(@$_GET['addSection']=="ok") 
{
    
    ?>
        
        <h2 style="font-weight: 300;" align="center">Add Section</h2>
        
        <br><br>
       
       <form action="dashboard.php?p=appSetting&action=add_section" method="post">
        <p style="width: 100%;" class="left">
          <input name="section_name" required="" type="text">
          <label alt="Section Name" placeholder="Section Name"></label>
        </p>
        
        <p style="width: 100%;" class="left">
          <input name="indexing" required="" type="text">
          <label alt="indexing" placeholder="indexing"></label>
        </p>
        
        <p style="width: 100%;" class="right">
          <input value="Submit Now" class="buttoncolor" style="border: 0px;" type="submit">
        </p>
      </form>
       
           
    <?php

}
else
if(@$_GET['editSection']=="ok") 
{
    $id=$_GET['id'];
    
    $headers = array(
    	"Accept: application/json",
    	"Content-Type: application/json"
    );
    
    $data = array(
    	"id" => $id
    );
    
    $ch = curl_init( $baseurl.'getSingleSectionDetails' );
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $return = curl_exec($ch);
    
    $json_data = json_decode($return, true);
    //var_dump($return);
    
    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
   
    ?>
        
        <h2 style="font-weight: 300;" align="center">Edit Section</h2>
        
        <br><br>
       
       <form action="dashboard.php?p=sounds&page=sections&action=editSection" method="post">
        <input name="id" type="hidden" value="<?php echo $id; ?>">   
        <p style="width: 100%;" class="left">
          <input name="section_name" required="" type="text" value="<?php echo $json_data['msg'][0]['section_name']; ?>">
          <label alt="Section Name" placeholder="Section Name"></label>
        </p>
        
        <p style="width: 100%;" class="right">
          <input value="Update Section" class="buttoncolor" style="border: 0px;" type="submit">
        </p>
      </form>
       
           
    <?php

}
else
if(@$_GET['addDiscovery']=="ok") 
{
    
    ?>
        
        <h2 style="font-weight: 300;" align="center">Add Into Discovery </h2>
        
        <br><br>
       
       <form action="dashboard.php?p=all_videos&action=addDiscovery" method="post">
        <input name="id" required="" value="<?php echo @$_GET['id']; ?>" type="hidden">
        
        <p style="width: 100%;" class="left">
            <select name="section_name" class="cityies_selection" style="font-weight: 400;font-size: 12px;width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 3px;color: #555;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" required>
                <option value="">Select Section</option>
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
            	    //var_dump($return);
            
            		$curl_error = curl_error($ch);
            		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            		
            		foreach( $json_data['msg'] as $str => $val ) 
            		{
            		    ?>
            		        <option value="<?php echo $val['id']; ?>"><?php echo $val['section_name']; ?></option>
            		    <?php
            		}
                ?>
                <option value="0" style="color:white; background:maroon;">Remove This video from section</option>
            </select>
        </p>
        
        <p style="width: 100%;" class="right">
          <input value="Submit Now" class="buttoncolor" style="border: 0px;" type="submit">
        </p>
      </form>
       
           
    <?php

}
else
if(@$_GET['addSoundSection']=="ok") 
{
    
    ?>
        
        <h2 style="font-weight: 300;" align="center">Add Sound Section </h2>
        
        <br><br>
       
       <form action="dashboard.php?p=sounds&page=sections&action=addSoundSection" method="post">
        
        <p style="width: 100%;" class="left">
          <input name="section_name" required="" type="text">
          <label alt="Section Name" placeholder="Section Name"></label>
        </p>
        
        <p style="width: 100%;" class="right">
          <input value="Submit Now" class="buttoncolor" style="border: 0px;" type="submit">
        </p>
      </form>
       
           
    <?php

}
else
if(@$_GET['submitSound']=="ok")
{
   
   $sound_id=$_GET['sound_id'];
   $url="http://".$_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "/"))."/uploadSound/upload/".$sound_id.".aac";
   ?>
        
        <h2 style="font-weight: 300;" align="center">Publish Sound </h2>
        
        <br><br>
       
       <form action="dashboard.php?p=sounds&page=soundGallary&action=submitSound" method="post" enctype="multipart/form-data">
        <input name="id" required="" value="<?php echo $sound_id; ?>" type="hidden">
        <input name="url" required="" value="<?php echo $url; ?>" type="hidden">
        
        <p style="width: 100%;" class="left">
          <input name="title" required="" type="text">
          <label alt="Sound Name" placeholder="Sound Name"></label>
        </p>
        
        <p style="width: 100%;" class="left">
          <input name="tagss" required="" type="text" >
          <label alt="Description" placeholder="Description"></label>
        </p>
        
        <p style="width: 100%;" class="left">
            <select name="section_name" class="cityies_selection" style="font-weight: 400;font-size: 12px;width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 3px;color: #555;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" required>
                <option value="">Select Sound Section</option>
                
                <?php
                        $headers = array(
                			"Accept: application/json",
                			"Content-Type: application/json"
                		);
                
                		$data = array();
                        
                		$ch = curl_init( $baseurl.'admin_getSoundSection' );
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                
                		$return = curl_exec($ch);
                
                		$json_data = json_decode($return, true);
                		
                		$curl_error = curl_error($ch);
                		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        
                        
                        foreach( $json_data['msg'] as $str => $val ) 
                        {   
                            echo $secton_form ='<option value='.$val['id'].'>'.$val['section_name'].'</option>';
                        }
                        
                ?>
                
            </select>
        </p>
        
        <p style="width: 100%;" class="left">
          <input name="image" id="uploadFile" type="file" onchange="return Upload_image_desktop()" required="required">
        </p>
        
        <p style="width: 100%;" class="right">
          <input value="Publish Now" class="buttoncolor" style="border: 0px;" type="submit">
        </p>
      </form>
       
       
    <?php
    
    
}





?>