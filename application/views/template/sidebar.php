<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img style="margin-top: 3px" src="<?php echo base_url('assets/img/user2.png') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info" style="padding-top: 2px;">
                <p style="margin-bottom: 3px;"><?php echo isset($session['email']  )?'Halo '.ucwords($session['email']).' !':null; ?></p>
                <a href="#" style="font-size: 9px"><i class="fa fa-calendar-o text-success"></i> <span id="date"></span></a><br>
                <a href="#" style="font-size: 9px"><i class="fa fa-clock-o text-success"></i> <span id="txt"></span></a>
            </div>
        </div>        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li <?php echo isset($home)?"class='active'":null; ?>>
                <a href="<?php echo site_url('dashboard') ?>">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>      
            <li class="header">PENGELOLAAN DATA MASTER</li>
            
            <!-- <li>
                <a href="#">
                    <i class="fa fa-table"></i> <span>Barang</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-table"></i> <span>Kasir</span>
                </a>
            </li>   -->
            <li class="treeview <?php echo isset($masterruang)?'active':null; ?>" >
                <a href="#">
                    <i class="fa fa-cubes" ></i> <span>Data Perlengkapan Ruang</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo isset($actgedung)?"class='active'":null; ?>>
                        <a href="<?php echo site_url('mastergedung') ?>"><i class="fa fa-building-o"></i> Gedung</a>
                    </li>
                    <li <?php echo isset($actlantai)?"class='active'":null; ?>>
                        <a href="<?php echo site_url('masterlantai') ?>"><i class="fa fa-server"></i> Lantai</a>
                    </li>
                    <li <?php echo isset($actruangan)?"class='active'":null; ?>>
                        <a href="<?php echo site_url('masterruangan') ?>"><i class="fa fa-cube"></i> Ruangan</a>
                    </li>
                </ul>
            </li>
            <!-- <li class="treeview <?php echo isset($masterjdwl)?'active':null; ?>" >
                <a href="#">
                    <i class="fa fa-calendar" ></i> <span>Data Penjadwalan Ruangan</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo isset($actjam)?"class='active'":null; ?>>
                        <a href="<?php echo site_url('masterjam') ?>"><i class="fa fa-clock-o"></i> Jam</a>
                    </li>
                </ul>
            </li> -->
            <li <?php echo isset($masterunit)?"class='active'":null; ?>>
                <a href="<?php echo site_url('masterunit') ?>">
                    <i class="fa fa-group" ></i> <span>Data Jadwal Unit</span>
                </a>
            </li>
            <li <?php echo isset($masterjdwl)?"class='active'":null; ?>>
                <a href="<?php echo site_url('masterjadwal') ?>">
                    <i class="fa fa-calendar" ></i> <span>Data Jadwal Ruangan</span>
                </a>
            </li> 
            <li>
                <a href="#">
                    <i class="fa fa-user"></i> <span>Data Pengguna</span>
                </a>
            </li> 
            <li class="header">PENGELOLAAN DATA BOOKING</li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar-o"></i> <span>Status Ruangan</span>
                </a>
            </li> 
             <li>
                <a href="#">
                    <i class="fa fa-pencil-square-o"></i> <span>Permintaan Booking</span>
                </a>
            </li> 
             <li>
                <a href="#">
                    <i class="fa fa-table"></i> <span>Riwayat Booking</span>
                </a>
            </li> 
            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">Hot</small>
                </a>
            </li>            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li class="active"><a href="<?php echo site_url('blank') ?>"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-book"></i> Documentation</a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li> -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">