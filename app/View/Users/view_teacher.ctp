
<section class="content invoice">    

    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> <?php echo $user['User']['name']; ?>
                <small class="pull-right">Ngày tạo: <?php echo $user['User']['created']; ?></small>
            </h2>                            
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-md-4 invoice-col">
            <!-- Primary tile -->
            <div class="box box-solid bg-light-blue">
                <div class="box-header">
                    <h3 class="box-title"> Thông tin cơ bản</h3>
                </div>
                <div class="box-body">
                    Họ tên: <strong><?php echo $user['User']['name']; ?></strong><br>
                    Ngày sinh: <?php echo $user['User']['birthday']; ?><br>
                    Nơi sinh: <?php echo $user['User']['birthplace']; ?><br>
                    Số điện thoại: <?php echo $user['User']['phone_number']; ?><br>
                    Email: <?php echo $user['User']['email']; ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <div class="box box-solid bg-light-blue">
                <div class="box-header">
                    <h3 class="box-title"> Thông tin đăng nhập</h3>
                </div>
                <div class="box-body">
                    Username:<strong><?php echo $user['User']['username']; ?></strong><br>
                    Nhóm trực thuộc:<strong>
                        <?php foreach ($user['Group'] as $group): ?>
                            <?php echo $group['name'] . ';'; ?>
                        <?php endforeach; ?></strong><br>
                    Ngày tạo: <?php echo $user['User']['created']; ?><br>
                    Lần đăng nhập cuối: <?php echo $user['User']['last_login']; ?><br>
                    Tình trạng: <?php echo $user['User']['activated']; ?><br>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <div class="box box-solid bg-blue">
                <div class="box-header">
                    <h3 class="box-title"> Thống kê</h3>
                </div>
                <div class="box-body">
                    <b>Số lớp đã hoàn thành:</b> 4F3S8J<br>
                    <b>Số lớp chưa hoàn thành:</b> 2/22/2014<br>
                    <b>Số lớp sắp đang đăng ký:</b> 968-34567
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->



    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>  
            <button style="margin-right: 5px;" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Generate PDF</button>
        </div>
    </div>
</section>

