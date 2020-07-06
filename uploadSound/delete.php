<?php
    echo $file_name=@$_GET['file_name'].".aac";
    @unlink('upload/'.$file_name);
?>