<?php
    if(isset($message)) 
    {
        ?>
        <label style="margin-left: 120px; !important;"> <?php echo $message; ?></label>
        <!--Important không chỉ thay đổi thứ tự ưu tiên giữa CSS cục bộ, CSS nội tuyến, CSS ngoại tuyến, mà còn thay đổi thứ tự ưu tiên ngay trong file CSS -->
        <?php
    }
?>

