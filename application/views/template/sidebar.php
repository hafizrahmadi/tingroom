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
            <?php if ($session['level']==1){ ?>
                   
               
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
                    <i class="fa fa-group" ></i> <span>Data Unit</span>
                </a>
            </li>
            <li <?php echo isset($masterjdwl)?"class='active'":null; ?>>
                <a href="<?php echo site_url('masterjadwal') ?>">
                    <i class="fa fa-calendar" ></i> <span>Data Jadwal Ruangan</span>
                </a>
            </li> 
            <li <?php echo isset($masteruser)?"class='active'":null; ?>>
                <a href="<?php echo site_url('masteruser') ?>">
                    <i class="fa fa-user"></i> <span>Data Pengguna</span>
                </a>
            </li>
            <?php }else if($session['level']==2){ ?> 
            <li class="header">PENGELOLAAN DATA BOOKING</li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar-o"></i> <span>Status Ruangan</span>
                </a>
            </li> 
             <li>
                <a href="<?php echo site_url('demandbooking/') ?>">
                    <i class="fa fa-pencil-square-o"></i> <span>Permintaan Booking</span>
                </a>
            </li> 
             <li>
                <a href="#">
                    <i class="fa fa-table"></i> <span>Riwayat Booking</span>
                </a>
            </li> 
            <?php } ?>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">