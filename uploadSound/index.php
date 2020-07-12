<!DOCTYPE html>
<html>

<head>
    <title>Upload Sound File</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="pop_style.css" />
</head>
<?php 

require_once '../config.php';
require_once 'aws.phar';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


function upload()
{
    $sound_name = $_POST['sound_name'];
    $description = $_POST['description'];
    $section_id = $_POST['section_id'];
    $soundtmpfile = $_FILES['fileToUpload']['tmp_name'];
    $soundfilename = $_FILES['fileToUpload']['name'];
    $sound_url = uploadFileOnS3('sounds/', $soundtmpfile, $soundfilename);
     

    if ($sound_name != "" && $description != "" && $section_id != "" && $sound_url != "") {
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
        );

        $data = array(
            "sound_name" => $sound_name,
            "description" => $description,
            "section" => $section_id,
            "sound_url" => $sound_url,
        );
        $ch = curl_init(BASE_URL.'storeAudioData' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

        $return = curl_exec($ch);

        $json_data = json_decode($return, true);

        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        echo "<script>window.location='".ADMIN_BASE_URL."dashboard.php?p=sounds&page=sound&action=success'</script>";
        
    } else {
        echo "<script>window.location='".ADMIN_BASE_URL."dashboard.php?p=sounds&page=sound&action=success'</script>";
    }
}
if (!empty($_POST["send"])) {
    // print("aksahk");
    // die;
    upload();
}

function uploadFileOnS3($folder, $tmpfile, $filename)
{

    $bucket = AWS_S3_BUCKET;
    $s3 = new S3Client([
        'version' => 'latest',
        'region' => AWS_S3_REGION,
        'credentials' => array(
            'key' => AWS_S3_KEY,
            'secret' => AWS_S3_SECRET
        )
    ]);

    try {
        // Upload data.
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key' => $folder . $filename,
            'SourceFile' => $tmpfile,
        ]);

        // Print the URL to the object.
        return $result['ObjectURL'];
    } catch (S3Exception $e) {
        echo $e->getMessage();
        die;
    }
}
?>
<body>
    <!-- <div id="contact-icon">
        <img src="./icon/icon-contact.png" alt="contact" height="50"
            width="50">
    </div> -->
    <!--Contact Form-->
    <div id="contact-pop">
        <form class="contact-form" action="" id="contact-form" method="post" enctype="multipart/form-data">
            <h1>Upload File</h1>
            <div>
                <div>
                    <label>Sound Name: </label><span id="userName-info" class="info"></span>
                </div>
                <div>
                    <input type="text" id="sound_name" name="sound_name" class="inputBox" />
                </div>
            </div>
            <div>
                <div>
                    <label>Description: </label><span id="userMessage-info" class="info"></span>
                </div>
                <div>
                    <textarea id="description" name="description" class="inputBox"></textarea>
                </div>
            </div>
            <div>
                <div>
                    <label>Sound File: </label><span id="userMessage-info" class="info"></span>
                </div>
                <div>
                    <input type="file" class="inputBox" name="fileToUpload" id="fileToUpload">
                </div>
            </div>
            <div>
                <div>
                    <label>Select Section: </label><span id="userName-info" class="info"></span>
                </div>
                <div>
                    <?php
                    $data=[];
                    $headers=[];
                    $ch = curl_init(BASE_URL.'admin_getSoundSection' );//curl_init('http://localhost/FunnyVO-API/API/index.php?p=admin_getSoundSection');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

                    $return = curl_exec($ch);

                    $json_data = json_decode($return, true);

                    $curl_error = curl_error($ch);
                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


                    if ($json_data['code'] == "200") {    ?>
                    <select name="section_id" size="1" class="inputBox">
                        <?php
                        foreach ($json_data['msg'] as $str => $val) { ?>
                        <option value="<?php echo $val['id']; ?>">
                            <?php echo $val['section_name']; ?>
                        </option>
                        <?php

                    }
                    ?>
                    </select>
                    <?php

                }
                ?>
                </div>
            </div>
            <input type="submit" id="send" name="send" value="Send" />
        </form>
    </div>
    

</body>

</html> 