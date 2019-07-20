<style>
    div.row h4{
        padding: 5px;
        background-color: coral;
        color: #fff;
        width: 120px;
        border-radius: 4px ;
        text-align: center;
    }
    div.row h4 a{
        color: #fff;
    }
    div.row tr td i{
        color: red;
    }


</style>
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container">
        <div class="row" style="margin-left: 330px; margin-top: 20px;">
            <h2>Thông tin nhận hàng của thành viên: </h2>
            <form name="edit" action="<?php echo base_url('thanh_toan/check_out'); ?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Tổng số tiền cần thanh toán:</td>
                        <td style="font-weight: bold; color: red; font-size: 19px"><?php echo  number_format($total_amount); ?> VNĐ</td>
                    </tr>
                    
                    <tr>
                        <td>Họ tên:</td>
                        <td>
                            <input type="text" name="ten" value="<?php echo isset($user_info->ho_ten) ? $user_info->ho_ten : '' ?>">
                            <i><?php echo form_error('ten'); ?></i>
                        </td>
                    </tr>

                    <tr>
                        <td>Địa chỉ: </td>
                        <td>
                            <input type="text" name="dia_chi" value="<?php echo isset($user_info->dia_chi) ? $user_info->dia_chi : '' ?>">
                            <i><?php echo form_error('dia_chi'); ?></i>
                        </td>
                    </tr>

                    <tr>
                        <td>Điện thoại: </td>
                        <td>
                            <input type="text" name="dien_thoai" value="<?php echo isset($user_info->dien_thoai) ? $user_info->dien_thoai : '' ?>">
                            <i><?php echo form_error('dien_thoai'); ?></i>
                        </td>

                    </tr>

                    <tr>
                        <td>Ghi chú: </td>
                        <td>
                            <textarea cols="40" style="text-align: left;" type="text" name="ghi_chu" value=""></textarea>
                        </td>

                    </tr>
                    <tr>
                        <td>Cách thức thanh toán:</td>
                        <td>
                            <option name="payment" value="offline">Thanh toán khi nhận hàng</option>
                        </td>
                    </tr>

                </table>
                <button type="submit" class="button">THANH TOÁN</button>
            </form>
        </div>
    </div>
</div>