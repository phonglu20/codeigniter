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
        <div class="row" style="margin-left: 330px; margin-top: 20px; margin-right: 0px">
            <?php if($total_rows > 0) {;?>
            
            <h2 style="float: left;">Thông tin hóa đơn:</h2>
            <h2 style="margin-left: 600px;">Tổng số hóa đơn: <?php echo $total_rows; ?></h2>
            <?php foreach ($hd_info as $row): ?>
            <table>
                <tr>
                    <td style="font-size: 20px; width: 350px;">Mã hóa đơn: <?php echo $row->ma; ?> </td>
                    <td colspan="2" style="font-size: 20px;  width: 130px">Trạng thái: <br>
                    <?php
                            if($row->trang_thai == 1)
                            {
                                ?>
                                <scan>
                                    <?php echo "Chờ xử lý"; ?>
                                </scan>
                                <?php
                            }
                            elseif($row->trang_thai == 2)
                            {
                                ?>
                                <scan style="color: blue;">
                                    <?php echo "Đã xác nhận"; ?>
                                </scan>
                                <?php              
                            }
                            elseif($row->trang_thai == 3)
                            {
                                ?>
                                <scan style="color: #CC9900;">
                                    <?php echo "Đang xử lý"; ?>
                                </scan>
                                <?php              
                            }
                            elseif($row->trang_thai == 4)
                            {
                                ?>
                                <scan style="color: green;">
                                    <?php echo "Đã giao hàng"; ?>
                                </scan>
                                <?php              
                            }
                            else
                            {
                                ?>
                                <scan style="color: red;">
                                    <?php echo "Hủy đơn hàng"; ?>
                                </scan>
                                <?php
                            }
                        ?>
                    </td>
                    <td colspan="2" style="font-size: 20px;">Ngày tạo: <br><?php echo $row->ngay_tao; ?></td>
                </tr>
                <tr>
                    <td style="font-size: 20px;">Tên sản phẩm</td>
                    <td style="font-size: 20px;">Hình</td>
                    <td style="font-size: 20px;">Số lượng</td>
                    <td style="font-size: 20px; width: 130px">Đơn giá</td>
                    <td style="font-size: 20px; width: 130px">Thành tiền</td>
                </tr>
                <?php foreach ($cthd_info as $row1): 
                    if($row->ma == $row1->ma_hoa_don)
                      {?>
                <tr>
                    <td><?php echo $row1->ten_san_pham; ?></td>
                    <td style="text-align: center;">
                        <img src="<?php echo  base_url('upload/san_pham/'.$row1->hinh); ?>" style="width: 100px; height: 70px;">
                    </td>
                    <td><?php echo $row1->so_luong; ?></td>
                    <td style="font-weight: bold;"><?php echo  number_format($row1->don_gia); ?> VNĐ</td>
                    <td style="font-weight: bold;"><?php echo  number_format($row1->thanh_tien); ?> VNĐ</td>
                </tr>
                    <?php };?> 
                <?php endforeach; ?>
                <tr >
                    <td colspan="3" style="text-align: right; font-weight: bold; font-size: 19px;">Tổng tiền: </td>
                    <td style="font-weight: bold; color: red; font-size: 19px; text-align: center;" colspan="2">
                        <?php echo  number_format($row->tong_tien); ?> VNĐ
                    </td>
                </tr>
            <hr> 
            </table>  
            <?php endforeach; ?>
            <?php } else {
            ;?>
            <h2>Bạn không có hóa đơn nào!</h2>
            <?php }
            ;?>
            <h4><a href="<?php echo base_url('thanh_vien/index'); ?>">Quay lại</a></h4>
        </div>
    </div>
</div>