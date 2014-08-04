<div class="col-lg-12 content-right">
    <div class="row">
        <h3 class="page-header" style="font-family: arial">Tập huấn viên: <?php echo $teacher['User']['name'] ?> </h3>
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <table class="table table-condensed">
                        <tbody style="font-size: 15px;">
                            <?php if ($teacher['User']['avatar']) { ?>
                                <tr>
                                    <td>Ảnh đại diện</td>
                                    <td><?php echo $teacher['User']['avatar']; ?></td>
                                </tr>
                            <?php } ?>

                            <?php if ($teacher['HocHam']['name']) { ?>
                                <tr>
                                    <td>Học hàm</td> 
                                    <td><?php echo $teacher['HocHam']['name']; ?></td>
                                </tr>
                            <?php } ?>

                            <?php if ($teacher['HocVi']['name']) { ?>
                                <tr>
                                    <td>Học vị</td> 
                                    <td><?php echo $teacher['HocVi']['name']; ?></td>
                                </tr>
                            <?php } ?>

                            <?php if ($teacher['User']['email']) { ?>
                                <tr><td>Email</td><td><?php echo $teacher['User']['email']; ?></td></tr>
                            <?php } ?>
                                
                             <?php if ($teacher['User']['birthday']) { ?>  
                            <tr><td>Ngày sinh</td><td><?php echo $teacher['User']['birthday']; ?></td></tr>
                             <?php } ?>
                            
                             <?php if ($teacher['User']['birthplace']) { ?>
                            <tr><td>Nơi sinh</td><td><?php echo $teacher['User']['birthplace']; ?></td></tr>
                            <?php } ?>
                            
                             <?php if ($teacher['User']['address']) { ?>
                            <tr><td>Địa chỉ</td><td><?php echo $teacher['User']['address']; ?></td></tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<hr>
</div>
