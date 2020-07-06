

    <?php 
        if( isset($_GET['action']) ) {
        	if( $_GET['action'] == "error" ) {
        		echo "<div class='notification'><div class='wdth'><div class='alert alert-error'>Some error, try again.. </div></div></div>";
        		?>
        		<script>setTimeout(function() {
        		    $('#mydiv').fadeOut('fast');
        		}, 1000); // <-- time in milliseconds</script>
        		<?php
        	}
        	if( $_GET['action'] == "success" ) {
        		echo "<div class='notification'><div class='wdth'><div class='alert alert-success'>Saved successfully.. </div></div></div>";
        		?>
        		<script>
        			setTimeout(function() {
        		    	$('.notification').fadeOut();
        			}, 5000); 
        		</script>
        		<?php
        	}
        } //
    ?>



  
    <!-- Modal 7 (Ajax Modal)-->
	<div class="PopupParent" id="PopupParent"  style="background: rgba(0, 0, 0, 0.3); display: none;  position:  fixed; top: 0;width:  100%;height:  100%;z-index:  99999;">
	    <div class="wdth" style="width:40%; margin-top:60px;background:  white;padding: 20px 20px; height: 450px;  border-radius:  5px;">
		
		<button type="button" onclick="ClosePopup();" style="position: absolute; margin-top: -37px; margin-left: 500px; border: 0;border-radius: 50%;font-size: 21px;width: 30px;height: 30px; z-index: 99999;" class='buttonColor' >&times;</button>
	    <div class="modal-content" style="">
            <div class="modal-body" id="contentReceived">
                Loading... 
            </div>
         </div>
			
	    </div>
	</div>

    <script>
    	    function ClosePopup()
    		{
    
    			document.getElementById("PopupParent").style.display="none";
    
    		} 
    		
    		
            
            
    </script>
    
    

  
  
  
</body>
</html>









