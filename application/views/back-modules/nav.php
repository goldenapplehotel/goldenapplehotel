
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="<?php echo BASE_URL;?>assets/img/logo/new-logo2.png" width="70px"  > </a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i>  <?php echo $this->session->userdata('user_name')?> </a>
                </li>
                <li><a href="<?php echo base_url();?>contents/change_password"><i class="fa fa-gear fa-fw"></i> Change password</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url();?>auths/logout">
                        <span class="glyphicon glyphicon-log-out"></span>
                        <span item-title="true" class="pull-right-padding">Logout</span>
                    </a>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>

    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo base_url('contents');?>"><i class="fa fa-home fa-fw"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Rooms<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url('rooms');?>">Rooms</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('rooms/list_feature');?>">Features</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('rooms/list_room_type');?>">Room Types</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Contents<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url('contents/banner');?>">Banners</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('contents/banner');?>">Explores</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('contents/banner');?>">Contacts</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('contents/news');?>">News</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?php echo base_url('contents/main_gallery');?>"><i class="fa fa-table fa-fw"></i> Gallery</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Tools<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url('Tools/');?>">Rooms managements</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>