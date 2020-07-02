<?php 


require_once("config.php"); 
require_once("header.php"); 

if(isset($_SESSION['id']))
{ 
      echo "<script>window.location='dashboard.php?p=users'</script>";
      //die;
} 

?>


<div class="section mini dashboardscreen1">

  <div class="wdth section mini" style="text-align:center;">
    
    <div class="col30 marginauto section mini " style="border: solid 1px #e7e7e7;padding: 30px 30px;background: white;box-shadow: 0px 0px 20px rgba(0,0,0,0.2);border-radius: 8px;">
      
      <div class="logo">
        <p><img src="<?php echo $app_picture; ?>" alt="logo" style="height: 100px;"/></p>
      </div>

      <h1 style="font-weight: 400; margin-bottom: 0px;">Welcome to <?php echo $app_name; ?></h1>
      <h4 style="font-weight: 400;">Login in. To see it in action.</h4>
      <br>
      <div class="form">
        <div class="col100">
          <div class="form">
            <form action="?login=ok" id="resetpass" method="post" novalidate="novalidate">
              <p><input placeholder="Email" name="email" id="email" type="text" ></p>
              <p><input placeholder="Password" name="pass" id="pass" type="password"></p>
              <p><input value="Login" type="submit" class="buttonColor"></p>
            </form>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>

</div>


<style>
    body
      {
        margin:0;
        padding:0;
        font-family: "Roboto","Helvetica Neue",Helvetica,Arial,sans-serif;
          font-size: 12px;
        font-weight: 300;
        background:#f8f8f8;
        }
        
</style>

      
<?php require_once("footer.php"); ?>







