
<header>
    <!-- logo begin -->
    <div id="logo">
        <div class="inner">
            <a href="<?php echo BASE_URL;?>cms/index">
                <img src="<?php echo BASE_URL;?>assets/img/logo/new-logo2.png" alt="" ></a>
        </div>
    </div>
    <!-- logo close -->
  
    <!-- mainmenu begin -->
    <div id="mainmenu-container">

        <ul id="mainmenu">
            <li><a href="<?php echo BASE_URL;?>cms/index">Home</a></li>
            <li><a href="<?php echo BASE_URL;?>cms/explore">Explore</a></li>
            <li><a href="room-list.html">Room</a>
                <!-- <ul>
                    <li><a href="room-1-column.html">1 Column</a>
                    <li><a href="room-1-column-sidebar.html">1 Column + Sidebar</a>
                    <li><a href="room-2-columns.html">2 Column</a>
                    <li><a href="room-2-columns-sidebar.html">2 Columns + Sidebar</a>
                    <li><a href="room-3-columns.html">3 Columns</a>
                    <li><a href="single-room.html">Single Room</a>
                </ul> -->
                <?php
                    $this->load->model('Mo_Apple');
                    $ci;
                    $ci = &get_instance();
                    $data = $ci->Mo_Apple->getAllRoomType();
                    // var_dump($data);
                    echo '<ul>';
                    foreach ($data->result() as $key => $value)
                    {
                        echo '<li><a href="#">'.$value->en_name.'</a></li>';
                    }
                    echo '</ul>';
                    // echo $ul;
                ?>
            </li>
            <li><a href="<?php echo BASE_URL;?>cms/booking">Booking</a></li>
            <li><a href="<?php echo BASE_URL;?>cms/news">News</a>
                <ul>
                    <li><a href="news.html">News List</a></li>
                    <li><a href="single-news.html">Single News</a></li>
                </ul>
            </li>
            <li><a href="<?php echo BASE_URL;?>cms/gallery">Gallery</a></li>
            <li><a href="<?php echo BASE_URL;?>cms/contact">Contact</a></li>

        </ul>
    </div>
    <!-- mainmenu close -->

    <div id="menu-btn"></div>
</header>