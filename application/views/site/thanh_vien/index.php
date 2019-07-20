<style>
   div.row h4{
       padding: 5px;
       background-color: coral;
       color: #fff;
       width: auto;
       margin-right: 10px;
       border-radius: 4px ;
       text-align: center;
       float: left;
   }
   div.row h4 a{
       color: #fff;
   }
</style>
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container">
        <div class="row" style="margin-left: 330px; margin-top: 20px;">
            <h2>Thông tin thành viên:</h2>
            <table>
                <tr>
                    <td>Họ Tên:</td>
                    <td><?php echo $user_info->ho_ten; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $user_info->email; ?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>********</td>
                </tr>
                <tr>
                    <td>Điện Thoại:</td>
                    <td><?php echo $user_info->dien_thoai; ?></td>
                </tr>
                <tr>
                    <td>Địa Chỉ:</td>
                    <td><?php echo $user_info->dia_chi; ?></td>
                </tr>

            </table>
            <h4><a href="<?php echo base_url('thanh_vien/edit'); ?>">Chỉnh Sửa Thông Tin</a></h4>
            <h4><a href="<?php echo base_url('thanh_vien/hoa_don'); ?>">Xem Hóa Đơn</a></h4>
        </div>
    </div>
</div>