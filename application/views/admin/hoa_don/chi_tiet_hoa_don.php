<div class="title">
    <h3 style="text-align: center; margin-bottom: 20px; margin-top: 8px;">Chi tiết hóa đơn</h3>
</div>

<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
    <thead>
    <tr>
        <td style="width: 50px;">Mã hóa đơn</td>
        <td style="width: 50px;">Mã sản phẩm</td>
        <td style="width: 100px;">Tên sản phẩm</td>
        <td style="width: 100px;">Đơn giá</td>
        <td style="width: 50px;">Số lượng</td>
        <td style="width: 100px;">Thành tiền</td>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($listcthd as $row): ?>
        <tr class="row_<?php echo $row->ma_hoa_don; ?>">
            <td><?php echo $row->ma_hoa_don; ?></td>
            <td><?php echo $row->ma_san_pham; ?></td>
            <td><?php echo $row->ten_san_pham; ?></td>
            <td><?php echo number_format($row->don_gia); ?> VNĐ</td>
            <td><?php echo $row->so_luong; ?></td>
            <td>
                <b style="color: red; font-weight: bold;font-size: 110%">
                    <?php echo number_format($row->thanh_tien); ?> VNĐ
                </b>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
