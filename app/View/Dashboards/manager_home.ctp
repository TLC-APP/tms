<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    15<sup style="font-size: 20px"> lớp </sup>
                </h3>
                <p>
                    đang đăng ký
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">
                Chi tiết <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    5<sup style="font-size: 20px"> lớp </sup>
                </h3>
                <p>
                    Đã đủ chỉ sĩ số mở lớp
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
                Xem chi tiết <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    2<sup style="font-size: 20px"> lớp </sup>
                </h3>
                <p>
                    Chưa cập nhật kết quả
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
                Xem chi tiết <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    1<sup style="font-size: 20px"> lớp </sup>
                </h3>
                <p>
                    Chưa cấp chứng nhận
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
                Xem chi tiết <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->

<!-- top row -->
<div class="row">
    <div class="col-xs-12 connectedSortable">

    </div><!-- /.col -->
</div>
<!-- /.row -->

<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-6 connectedSortable"> 
        <!-- Calendar -->
        <div class="box box-warning">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <div class="box-title">Lịch tập huấn tháng này</div>

                <!-- tools box -->
                <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                        <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Add new event</a></li>
                            <li><a href="#">Clear events</a></li>
                            <li class="divider"></li>
                            <li><a href="#">View calendar</a></li>
                        </ul>
                    </div>
                </div><!-- /. tools -->                                    
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <!-- Box (with bar chart) -->
        <div class="box box-danger" id="loading-example">
            <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
                    <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div><!-- /. tools -->
                <i class="fa fa-cloud"></i>

                <h3 class="box-title">Mật độ tập huấn 5 tháng tiếp theo</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-sm-7">
                        <!-- bar chart -->
                        <div class="chart" id="bar-chart" style="height: 250px;"></div>
                    </div>
                    <div class="col-sm-5">
                        <div class="pad">
                            <!-- Progress bars -->
                            <div class="clearfix">
                                <span class="pull-left">Bandwidth</span>
                                <small class="pull-right">10/200 GB</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                            </div>

                            <div class="clearfix">
                                <span class="pull-left">Transfered</span>
                                <small class="pull-right">10 GB</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-red" style="width: 70%;"></div>
                            </div>

                            <div class="clearfix">
                                <span class="pull-left">Activity</span>
                                <small class="pull-right">73%</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-light-blue" style="width: 70%;"></div>
                            </div>

                            <div class="clearfix">
                                <span class="pull-left">FTP</span>
                                <small class="pull-right">30 GB</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-aqua" style="width: 70%;"></div>
                            </div>
                            <!-- Buttons -->
                            <p>
                                <button class="btn btn-default btn-sm"><i class="fa fa-cloud-download"></i> Generate PDF</button>
                            </p>
                        </div><!-- /.pad -->
                    </div><!-- /.col -->
                </div><!-- /.row - inside box -->
            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="80" data-width="60" data-height="60" data-fgColor="#f56954"/>
                        <div class="knob-label">CPU</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                        <div class="knob-label">Disk</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                        <div class="knob-label">RAM</div>
                    </div><!-- ./col -->
                </div><!-- /.row -->
            </div><!-- /.box-footer -->
        </div><!-- /.box -->        

        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
            <!-- Tabs within a box -->

            <div class="tab-content no-padding">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
        </div><!-- /.nav-tabs-custom -->    





    </section><!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-6 connectedSortable">


        <!-- Chat box -->


        <!-- TO DO List -->
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">To Do List</h3>
                <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul class="todo-list">
                    <li>
                        <!-- drag handle -->
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>  
                        <!-- checkbox -->
                        <input type="checkbox" value="" name=""/>                                            
                        <!-- todo text -->
                        <span class="text">Design a nice theme</span>
                        <!-- Emphasis label -->
                        <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash-o"></i>
                        </div>
                    </li>
                    <li>
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>                                            
                        <input type="checkbox" value="" name=""/>
                        <span class="text">Make the theme responsive</span>
                        <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                        <div class="tools">
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash-o"></i>
                        </div>
                    </li>
                    <li>
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>
                        <input type="checkbox" value="" name=""/>
                        <span class="text">Let theme shine like a star</span>
                        <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                        <div class="tools">
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash-o"></i>
                        </div>
                    </li>
                    <li>
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>
                        <input type="checkbox" value="" name=""/>
                        <span class="text">Let theme shine like a star</span>
                        <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                        <div class="tools">
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash-o"></i>
                        </div>
                    </li>
                    <li>
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>
                        <input type="checkbox" value="" name=""/>
                        <span class="text">Check your messages and notifications</span>
                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                        <div class="tools">
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash-o"></i>
                        </div>
                    </li>
                    <li>
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>
                        <input type="checkbox" value="" name=""/>
                        <span class="text">Let theme shine like a star</span>
                        <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                        <div class="tools">
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash-o"></i>
                        </div>
                    </li>
                </ul>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix no-border">
                <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
        </div><!-- /.box -->

    </section><!-- right col -->
</div><!-- /.row (main row) -->