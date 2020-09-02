<?php
@require_once("config.php");


if (@$_GET['action'] == "addCategory") {


  ?>

  <h2 style="font-weight: 300;" align="center">Add Category</h2>

  <br><br>

  <form action="dashboard.php?p=allCategory&action=category_name" enctype="multipart/form-data" method="post" novalidate="novalidate">

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

} else
if (@$_GET['action'] == "editCategory") {

  $id = @$_GET['id'];

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
  );

  $data = array(
    "cat_id" => $id
  );

  $ch = curl_init($baseurl . 'showCategoryDetails');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $return = curl_exec($ch);

  $json_data = json_decode($return, true);
  //var_dump($return);

  $curl_error = curl_error($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  if (isset($_GET['id'])) {
    $imageurl = $img_baseurl . '/' . $json_data['msg']['Category']['thumb'];
  } else {
    $imageurl = "img/upload.png";
  }

  ?>

  <h2 style="font-weight: 300;" align="center">Edit Category</h2>

  <br><br>

  <form action="dashboard.php?p=allCategory&action=edit_category" enctype="multipart/form-data" method="post" novalidate="novalidate">
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

} else
if (@$_GET['action'] == "editDiscovery") {

  $id = @$_GET['id'];

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
  );

  $data = array(
    "id" => $id
  );

  $ch = curl_init($baseurl . 'all_discovery_sections');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $return = curl_exec($ch);

  $json_data = json_decode($return, true);
  //var_dump($return);

  $curl_error = curl_error($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


  ?>

  <h2 style="font-weight: 300;" align="center">Edit Section</h2>

  <br><br>

  <form action="dashboard.php?p=discovery&action=edit_discovery_section" enctype="multipart/form-data" method="post" novalidate="novalidate">
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

} else
if (@$_GET['action'] == "editSound") {
  $id = @$_GET['id'];


  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
  );

  $data = array(
    "id" => $id
  );

  $ch = curl_init($baseurl . 'all_sound_details');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $return = curl_exec($ch);

  $json_data = json_decode($return, true);
  //var_dump($return);

  $curl_error = curl_error($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


  ?>

  <h2 style="font-weight: 300;" align="center">Edit Sound</h2>

  <br><br>

  <form action="dashboard.php?p=sounds&action=edit_sound_details" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <input type="hidden" id='id' name="id" value="<?php echo $json_data['msg'][0]['id']; ?>">
    <p style="margin-bottom: 30px;">
      <input name="sound_name" required="" type="text" value="<?php echo $json_data['msg'][0]['sound_name']; ?>">
      <label alt="Sound Name " placeholder="Sound Name"></label>
    </p>
    <p style="margin-bottom: 30px;">
      <input name="description" required="" type="text" value="<?php echo $json_data['msg'][0]['description']; ?>">
      <label alt="Description " placeholder="Description"></label>
    </p>
    <p style="margin-bottom: 30px;">
      <input name="fileToUpload" id="fileToUpload" required="" type="file" value="<?php echo $json_data['msg'][0]['sound_url']; ?>">
      <label alt="Sound File" placeholder="Sound File"></label>
    </p>

    <p style="margin-bottom: 30px;">
      <?php
        $data = [];
        $headers = [];
        $ch = curl_init(BASE_URL . 'admin_getSoundSection'); //curl_init('http://localhost/FunnyVO-API/API/index.php?p=admin_getSoundSection');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $return = curl_exec($ch);

        $json_data_new = json_decode($return, true);

        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        ?>
      <select name="section" style="margin-bottom: 30px;">
        <?php
          if ($json_data_new['code'] == "200") { ?>
          <?php
              foreach ($json_data_new['msg'] as $str => $val) { ?>
            <option <?php if ($json_data['msg'][0]['section'] == $val['id']) { ?> selected="selected" <?php } ?> value='<?php echo $val['id']; ?>'>
              <?php echo $val['section_name']; ?>
            </option>
        <?php
            }
          } ?>
      </select>
      <label alt="Category Name" placeholder="Category Name"></label>


    </p>
    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>



<?php

} else
if (@$_GET['action'] == "AddDiscovery") {


  ?>

  <h2 style="font-weight: 300;" align="center">Add Discovery Section</h2>

  <br><br>

  <form action="dashboard.php?p=discovery&action=Add_Discovery_section" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <p style="margin-bottom: 30px;">
      <input name="section_name" required="" type="text">
      <label alt="Section Name" placeholder="Section Name"></label>
    </p>

    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['addSection'] == "ok") {

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

} else
if (@$_GET['editSection'] == "ok") {
  $id = $_GET['id'];

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
  );

  $data = array(
    "id" => $id
  );

  $ch = curl_init($baseurl . 'getSingleSectionDetails');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

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

} else
if (@$_GET['addDiscovery'] == "ok") {

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

          $data = array();
          $ch = curl_init($baseurl . 'all_discovery_sections');

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

          $return = curl_exec($ch);

          $json_data = json_decode($return, true);
          //var_dump($return);

          $curl_error = curl_error($ch);
          $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

          foreach ($json_data['msg'] as $str => $val) {
            ?>
          <option value="<?php echo $val['id']; ?>">
            <?php echo $val['section_name']; ?>
          </option>
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

} else
if (@$_GET['addSoundSection'] == "ok") {

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

} else
if (@$_GET['submitSound'] == "ok") {

  $sound_id = $_GET['sound_id'];
  $url = "http://" . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "/")) . "/uploadSound/upload/" . $sound_id . ".aac";
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
      <input name="tagss" required="" type="text">
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

          $ch = curl_init($baseurl . 'admin_getSoundSection');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

          $return = curl_exec($ch);

          $json_data = json_decode($return, true);

          $curl_error = curl_error($ch);
          $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


          foreach ($json_data['msg'] as $str => $val) {
            echo $secton_form = '<option value=' . $val['id'] . '>' . $val['section_name'] . '</option>';
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

} else
if (@$_GET['action'] == "AddCustom_Notification") {


  ?>

  <h2 style="font-weight: 300;" align="center">Add Custom Notification</h2>

  <br><br>

  <form action="dashboard.php?p=custom_notification&action=Add_Custom_Notification_section" enctype="multipart/form-data" method="post" novalidate="novalidate">

    <input name="type" required="" value="custom_image" type="hidden">

    <p style="margin-bottom: 30px;">
      <input name="title" required="" type="text">
      <label alt="Title" placeholder="Title"></label>
    </p>
    <p style="margin-bottom: 30px;">
      <textarea name="body" required="" rows="3"></textarea>
      <label alt="Description" placeholder="Description"></label>

    </p>

    <p style="margin-bottom: 30px;">
      <input name="image_url" id="image_url" required="" type="file">
      <label alt="Image File" placeholder="Image File"></label>
    </p>

    <p style="width: 100%;" class="left">
      <select multiple name="fb_id[]" class="cityies_selection" style="font-weight: 400;font-size: 12px;width: 100%;border: 1px solid #ccc;border-radius: 3px;color: #555;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" size="5" required>
        <!-- <option value="">Select Users</option> -->
        <option value="all">All Users</option>
        <option value="all_login">Logged IN Users</option>
        <?php
          $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
          );

          $data = array();
          $ch = curl_init($baseurl . 'get_user_list');

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

          $return = curl_exec($ch);

          $json_data = json_decode($return, true);
          // var_dump($return);

          $curl_error = curl_error($ch);
          $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

          foreach ($json_data['msg'] as $str => $val) {
            ?>
          <option value="<?php echo $val['fb_id']; ?>"><?php echo $val['first_name'] . ' ' . $val['last_name']; ?></option>
        <?php

          }
          ?>

      </select>
    </p>

    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['action'] == "editCustom_Notification") {

  $id = @$_GET['id'];

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
  );

  $data = array(
    "id" => $id
  );

  $ch = curl_init($baseurl . 'all_custom_notification_sections');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $return = curl_exec($ch);

  $json_data = json_decode($return, true);
  //var_dump($return);

  $curl_error = curl_error($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


  ?>

  <h2 style="font-weight: 300;" align="center">Edit Notification</h2>

  <br><br>

  <form action="dashboard.php?p=custom_notification&action=edit_custom_notification_section" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <input type="hidden" id='id' name="id" value="<?php echo $json_data['msg'][0]['id']; ?>">
    <p style="margin-bottom: 30px;">
      <input name="title" required="" type="text" value="<?php echo $json_data['msg'][0]['title']; ?>">
      <label alt="Section Name" placeholder="Section Name"></label>
    </p>
    <p style="margin-bottom: 30px;">
      <input name="body" required="" type="text" value="<?php echo $json_data['msg'][0]['body']; ?>">
      <label alt="Description" placeholder="Description"></label>
    </p>
    <p style="width: 100%;" class="left">
      <select name="video_id" class="cityies_selection" style="font-weight: 400;font-size: 12px;width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 3px;color: #555;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" required>
        <option value="">Select Video</option>
        <?php
          $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
          );

          $data = array();
          $ch = curl_init($baseurl . 'showAllVideosList');

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

          $return = curl_exec($ch);

          $json_data = json_decode($return, true);
          // var_dump($return);

          $curl_error = curl_error($ch);
          $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

          foreach ($json_data['msg'] as $str => $val) {
            if (isset($json_data['msg'][0]['video_id']) && $json_data['msg'][0]['video_id'] == $val['id']) {
              ?>
            <option value="<?php echo $val['id']; ?>" selected>
              <?php echo $val['video']; ?>
            </option>
          <?php
              } else { ?>
            <option value="<?php echo $val['id']; ?>">
              <?php echo $val['video']; ?>
            </option>

        <?php }
          }
          ?>
        <!-- <option value="0" style="color:white; background:maroon;">Remove This video from section</option> -->
      </select>
    </p>

    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['action'] == "sendCustom_Notification") {

  $id = @$_GET['id'];
  ?>

  <h2 style="font-weight: 300;" align="center">Send Custom Notification</h2>

  <br><br>

  <form action="dashboard.php?p=custom_notification&action=Send_Custom_notification_section" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <input type="hidden" id='custom_notification_id' name="custom_notification_id" value="<?php echo $id; ?>">
    <p style="width: 100%;" class="left">
      <select multiple name="fb_id[]" class="cityies_selection" style="font-weight: 400;font-size: 12px;width: 100%;border: 1px solid #ccc;border-radius: 3px;color: #555;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" size="5" required>
        <!-- <option value="">Select Users</option> -->
        <option value="all">All Users</option>
        <option value="all_login">Logged IN Users</option>
        <?php
          $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
          );

          $data = array();
          $ch = curl_init($baseurl . 'get_user_list');

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

          $return = curl_exec($ch);

          $json_data = json_decode($return, true);
          // var_dump($return);

          $curl_error = curl_error($ch);
          $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

          foreach ($json_data['msg'] as $str => $val) {
            ?>
          <option value="<?php echo $val['fb_id']; ?>"><?php echo $val['first_name'] . ' ' . $val['last_name']; ?></option>
        <?php

          }
          ?>

      </select>
    </p>
    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['action'] == "send_notification_of_video") {

  $id = @$_GET['id'];
  ?>

  <h2 style="font-weight: 300;" align="center">Send Custom Video Notification</h2>

  <br><br>

  <form action="dashboard.php?p=all_videos&action=send_notification_of_video" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <input type="hidden" id='video_id' name="video_id" value="<?php echo $id; ?>">
    <input type="hidden" id='type' name="type" value="custom_video">

    <p style="margin-bottom: 30px;">
      <input name="title" required="" type="text">
      <label alt="Title" placeholder="Title"></label>
    </p>

    <p style="width: 100%;" class="left">
      <select multiple name="fb_id[]" class="cityies_selection" style="font-weight: 400;font-size: 12px;width: 100%;border: 1px solid #ccc;border-radius: 3px;color: #555;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" size="5" required>
        <!-- <option value="">Select Users</option> -->
        <option value="all">All Users</option>
        <option value="all_login">Logged IN Users</option>
        <?php
          $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
          );

          $data = array();
          $ch = curl_init($baseurl . 'get_user_list');

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

          $return = curl_exec($ch);

          $json_data = json_decode($return, true);
          // var_dump($return);

          $curl_error = curl_error($ch);
          $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

          foreach ($json_data['msg'] as $str => $val) {
            ?>
          <option value="<?php echo $val['fb_id']; ?>"><?php echo $val['first_name'] . ' ' . $val['last_name']; ?></option>
        <?php

          }
          ?>

      </select>
    </p>
    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['action'] == "AddSetting") {


  ?>

  <h2 style="font-weight: 300;" align="center">Add Setting</h2>

  <br><br>

  <form action="dashboard.php?p=setting&action=Add_Setting" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <p style="margin-bottom: 30px;">
      <input name="setting_key" required="" type="text">
      <label alt="Setting Key" placeholder="Setting Key"></label>
    </p>
    <p style="margin-bottom: 30px;">
      <input name="setting_value" required="" type="text">
      <label alt="Setting Value" placeholder="Setting Value"></label>
    </p>

    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['action'] == "editSetting") {

  $id = @$_GET['id'];

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
  );

  $data = array(
    "id" => $id
  );

  $ch = curl_init($baseurl . 'all_setting');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $return = curl_exec($ch);

  $json_data = json_decode($return, true);
  //var_dump($return);

  $curl_error = curl_error($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


  ?>

  <h2 style="font-weight: 300;" align="center">Edit Section</h2>

  <br><br>

  <form action="dashboard.php?p=setting&action=edit_setting" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <input type="hidden" id='id' name="id" value="<?php echo $json_data['msg'][0]['id']; ?>">
    <p style="margin-bottom: 30px;">
      <input type="text" value="<?php echo $json_data['msg'][0]['setting_key']; ?>" readonly>
      <label alt="Setting Key" placeholder="Setting Key"></label>
    </p>
    <p style="margin-bottom: 30px;">
      <input name="setting_value" required="" type="text" value="<?php echo $json_data['msg'][0]['setting_value']; ?>">
      <label alt="Setting Value" placeholder="Setting Value"></label>
    </p>
    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['action'] == "AddSubFilter") {

  $id = @$_GET['filter_id'];

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
  );

  $data = array(
    "id" => $id
  );

  $ch = curl_init($baseurl . 'all_filter');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $return = curl_exec($ch);

  $json_data = json_decode($return, true);
  //var_dump($return);

  $curl_error = curl_error($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  ?>

  <h2 style="font-weight: 300;" align="center">Add Sub Image Filter</h2>

  <br><br>

  <form action="dashboard.php?p=sub_filter&filter_id=<?php echo $json_data['msg'][0]['id']; ?>&action=Add_SubFilter" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <input name="filter_id" id="filter_id" type="hidden" value="<?php echo $json_data['msg'][0]['id']; ?>">
    <p style="margin-bottom: 30px;">
      <input name="name" type="text" value="<?php echo $json_data['msg'][0]['name']; ?>" readonly>
      <label alt="Filter Name" placeholder="Filter Name"></label>
    </p>
    <p style="">
      <input name="image_url[]" id="image_url" required="" type="file" multiple>
      <label alt="Image File" placeholder="Image File"></label>
    </p>

    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['action'] == "editImageFilter") {

  $id = @$_GET['id'];

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
  );

  $data = array(
    "id" => $id
  );

  $ch = curl_init($baseurl . 'all_image_filter');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $return = curl_exec($ch);

  $json_data = json_decode($return, true);
  //var_dump($return);

  $curl_error = curl_error($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


  ?>

  <h2 style="font-weight: 300;" align="center">Edit Section</h2>

  <br><br>

  <form action="dashboard.php?p=image_filter&action=edit_image_filter" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <input type="hidden" id='id' name="id" value="<?php echo $json_data['msg'][0]['id']; ?>">
    <p style="margin-bottom: 30px;">
      <input type="text" value="<?php echo $json_data['msg'][0]['key']; ?>" readonly>
      <label alt="Key" placeholder="Key"></label>
    </p>
    <p style="margin-bottom: 30px;">
      <input name="value" required="" type="text" value="<?php echo $json_data['msg'][0]['value']; ?>">
      <label alt="Value" placeholder="Value"></label>
    </p>
    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['action'] == "AddFilter") {


  ?>

  <h2 style="font-weight: 300;" align="center">Add Filter</h2>

  <br><br>

  <form action="dashboard.php?p=filter&action=Add_Filter" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <p style="margin-bottom: 30px;">
      <input name="name" required="" type="text">
      <label alt="Name" placeholder="Name"></label>
    </p>
    <p style="margin-bottom: 30px;">
      <input name="description" required="" type="text">
      <label alt="Description" placeholder="Description"></label>
    </p>

    <p style="">
      <input name="main_image" id="main_image" required="" type="file">
      <label alt="Image File" placeholder="Image File"></label>
    </p>
    <p style="width: 100%;" class="left">
      <select name="status" class="cityies_selection" style="font-weight: 400;font-size: 12px;width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 3px;color: #555;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" required>
        <!-- <option value="">Select Users</option> -->
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>
    </p>

    <p style="width: 100%;" class="left">
      <p style="width: 100%;" class="left">Is GIF</p>
      <input type="radio" id="is_gif_yes" name="is_gif" value="1" required="" style="width:auto;">
      <label for="is_gif_yes">YES</label>
      <input type="radio" id="is_gif_no" name="is_gif" value="0" required="" style="width:auto;">
      <label for="is_gif_no">No</label>
    </p>

    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

} else
if (@$_GET['action'] == "editFilter") {

  $id = @$_GET['id'];

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
  );

  $data = array(
    "id" => $id
  );

  $ch = curl_init($baseurl . 'all_filter');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $return = curl_exec($ch);

  $json_data = json_decode($return, true);
  //var_dump($return);

  $curl_error = curl_error($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


  ?>

  <h2 style="font-weight: 300;" align="center">Edit Section</h2>

  <br><br>

  <form action="dashboard.php?p=filter&action=edit_filter" enctype="multipart/form-data" method="post" novalidate="novalidate">
    <input type="hidden" id='id' name="id" value="<?php echo $json_data['msg'][0]['id']; ?>">
    <p style="margin-bottom: 30px;">
      <input name="name" type="text" value="<?php echo $json_data['msg'][0]['name']; ?>" required="">
      <label alt="Name" placeholder="Name"></label>
    </p>
    <p style="margin-bottom: 30px;">
      <input name="description" type="text" value="<?php echo $json_data['msg'][0]['description']; ?>" required="">
      <label alt="Description" placeholder="Description"></label>
    </p>
    <p style="">
      <input name="main_image" required="" type="file" value="">
      <label alt="Image File" placeholder="Image File"></label>
    </p>
    <p style="">
      <img src="<?php echo $json_data['msg'][0]['main_image']; ?>" style="width: 60px;">
    </p>
    <p style="width: 100%;" class="left">
      <select name="status" class="cityies_selection" style="font-weight: 400;font-size: 12px;width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 3px;color: #555;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" required>
        <!-- <option value="">Select Users</option> -->
        <?php
          if (isset($json_data['msg'][0]['status']) && $json_data['msg'][0]['status'] == '1') {
            $active = "selected";
            $inactive = "";
          } else {
            $active = "";
            $inactive = "selected";
          }
          ?>
        <option value="1" <?php echo $active; ?>>Active</option>
        <option value="0" <?php echo $inactive; ?>>Inactive</option>
      </select>
    </p>
    <p style="width: 100%;" class="left">
      <p style="width: 100%;" class="left">Is GIF</p>
      <?php
        if (isset($json_data['msg'][0]['is_gif']) && $json_data['msg'][0]['is_gif'] == '1') {
          $yes_checked = "checked";
          $no_checked = "";
        } else {
          $yes_checked = "";
          $no_checked = "checked";
        }
        ?>
      <input type="radio" id="is_gif_yes" name="is_gif" value="1" required="" style="width:auto;" <?php echo $yes_checked; ?>>
      <label for="is_gif_yes">YES</label>
      <input type="radio" id="is_gif_no" name="is_gif" value="0" required="" style="width:auto;" <?php echo $no_checked; ?>>
      <label for="is_gif_no">No</label>
    </p>
    <p style="width: 100%;" class="right">
      <input value="Send Now" class="buttoncolor" style="border: 0px;" type="submit">
    </p>
  </form>


<?php

}





?>