<?php 
require_once("config.php"); 
if( isset($_SESSION['id']) ){ 


	        if( isset($_GET['updatepass']) ) {

				$old_password = strip_tags($_POST['oldpas']);
				$new_password = strip_tags($_POST['newpas']);
				$renewpas = strip_tags($_POST['renewpas']);

				if( !empty($old_password) && !empty($new_password) ) {

					if( $new_password == $renewpas ) { //validate new pass with re new pass
						
						
						$headers = array(
							"Accept: application/json",
							"Content-Type: application/json"
						);

						$data = array(
							"old_password" => $old_password,
							"new_password" => $new_password
						);
    
						$ch = curl_init( $baseurl.'changePassword' );
                       	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				
						$return = curl_exec($ch);
				
						$json_data = json_decode($return, true);
						//var_dump($return);
				
						$curl_error = curl_error($ch);
						$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

						//print_r($json_data);
						//die;

						if($json_data['code'] == 201){
							//echo "<div class='alert alert-danger'>Error in updating password, try again later..</div>";
							//@header("Location: dashboard.php?p=changepassword&action=error");
	   						echo "<script>window.location='dashboard.php?p=change_password&action=error'</script>";

						} else {
							//echo "<div class='alert alert-success'>Successfully password updated..</div>";
							//@header("Location: dashboard.php?p=changepassword&action=success");
	   						echo "<script>window.location='dashboard.php?p=change_password&action=success'</script>";
						}

						curl_close($ch);

					} //validate new pass with re new pass = end

				} else {
					//@header("Location: dashboard.php?p=changepassword&action=error");
	   				echo "<script>window.location='dashboard.php?p=change_password&action=error'</script>";
				} //

			}
			
			?>

<h2 class="title">Change Password</h2>
<div class="form">
	<div class="left col50">
		
		<div class="form">
			<form action="dashboard.php?p=change_password&updatepass=ok" id="changepass" method="post">
				<p style="margin-bottom: 30px;"><input type="password" id="oldpas" name="oldpas" required>
					<label alt="Old Password" placeholder="Old Password">
				</p>
				<p style="margin-bottom: 30px;"><input type="password" id="newpas" name="newpas" required> 
					<label alt="New Password" placeholder="New Password">
				</p>
				<p style="margin-bottom: 30px;"><input type="password"  id="renewpas" name="renewpas" required>
					<label alt="Re-type New Password" placeholder="Re-type New Password">
				</p>
				<p><input type="submit" value="Update Password" class="buttonColor"></p>
			
			</form>
		</div>
	</div>
	<div class="right col40">
		
	</div>
	<div class="clear"></div>
</div>

<?php } else {
	
	@header("Location: index.php");
    echo "<script>window.location='index.php'</script>";
    die;
    
} ?>