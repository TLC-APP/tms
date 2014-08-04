<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo $this->element('Menu/truongdonvi/left_menu'); ?>
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <ol class="breadcrumb">
                <?php echo $this->Html->getCrumbs(' > '); ?>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3>Kết quả thống kê</h3>
                    </div>
                    <div class="box-body table-responsive no-padding" id="ket_qua">

                    </div>


                </div>
            </div>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->