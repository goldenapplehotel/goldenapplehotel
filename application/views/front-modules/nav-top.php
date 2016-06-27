
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
    <?php
        $this->load->model('Mo_Apple');
        $ci;
        $ci = &get_instance();
        

        $where = array('title' =>'title');
        $navs = $ci->Mo_Apple->getLanguageData('nav',$where ,$lang);
        $where = array('name' =>'name');
        $data = $ci->Mo_Apple->getLanguageData('rooms_type',$where ,$lang);
        if($navs->num_rows()>0){
            echo '<div id="mainmenu-container">';
            echo '<ul id="mainmenu">';
            foreach ($navs->result() as $key => $value) {
                if($value->_models == 'room'){
                    echo '<li><a href=" '.BASE_URL.'cms/'.$value->_models.'/'.$lang.' ">'.$value->title.'</a>';
                        echo '<ul>';
                            foreach ($data->result() as $key => $value1)
                            {
                                echo '<li><a href="'.BASE_URL.'cms/'.$value->_models.'/'.$value->Id.'/'.$lang.'">'.$value1->name.'</a></li>';
                            }
                        echo '</ul>';
                    echo '</li>';
                }else{
                    echo '<li><a href="'.BASE_URL.'cms/'.$value->_models.'/'.$lang.'">'.$value->title.'</a></li>';
                }
                
            }
            echo '</ul>';
            echo '</div>';
        }
    ?>


    <!-- mainmenu close -->

    <div id="menu-btn"></div>
</header>