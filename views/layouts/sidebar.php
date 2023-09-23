<?php 
    if(basename($_SERVER['PHP_SELF'])== 'sidebar.php'){
        exit();
    }
    $currentUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="javascript:void();"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                </div>
            </form>
        </div>
        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if(Controller::ViewPath('back/admin/index.php') == $currentUrl): echo "active"; endif;?>">
                <a href="../admin/index.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded-hasmenu <?php if((Controller::ViewPath('back/category/create.php') == $currentUrl) OR (Controller::ViewPath('back/category/index.php') == $currentUrl)): echo "pcoded-trigger active"; endif;?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Category</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li <?php if(Controller::ViewPath('back/category/create.php') == $currentUrl){ echo 'class="active"';}?>>
                        <a href="<?=Controller::ViewPath('back/category/create.php');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add Category</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li <?php if(Controller::ViewPath('back/category/index.php') == $currentUrl){ echo 'class="active"';}?>>
                        <a href="<?=Controller::ViewPath('back/category/index.php');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">View Category</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if((Controller::ViewPath('back/subcategory/create.php') == $currentUrl) OR (Controller::ViewPath('back/subcategory/index.php') == $currentUrl)): echo "pcoded-trigger active"; endif;?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Sub Category</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li <?php if(Controller::ViewPath('back/subcategory/create.php') == $currentUrl){ echo 'class="active"';}?>>
                        <a href="<?=Controller::ViewPath('back/subcategory/create.php');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add Sub Category</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li <?php if(Controller::ViewPath('back/subcategory/index.php') == $currentUrl){ echo 'class="active"';}?>>
                        <a href="<?=Controller::ViewPath('back/subcategory/index.php');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">View Sub Category</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if((Controller::ViewPath('back/brand/create.php') == $currentUrl) OR (Controller::ViewPath('back/brand/index.php') == $currentUrl)): echo "pcoded-trigger active"; endif;?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Brands</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li <?php if(Controller::ViewPath('back/brand/create.php') == $currentUrl){ echo 'class="active"';}?>>
                        <a href="<?=Controller::ViewPath('back/brand/create.php');?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Add Brand</span>
                        </a>
                    </li>
                    <li <?php if(Controller::ViewPath('back/brand/index.php') == $currentUrl){ echo 'class="active"';}?>>
                        <a href="<?=Controller::ViewPath('back/brand/index.php');?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">View Brand</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if((Controller::ViewPath('back/product/create.php') == $currentUrl) OR (Controller::ViewPath('back/product/index.php') == $currentUrl)): echo "pcoded-trigger active"; endif;?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Products</span>
                </a>
                <ul class="pcoded-submenu">
                    <li <?php if(Controller::ViewPath('back/product/create.php') == $currentUrl){ echo 'class="active"';}?>>
                        <a href="<?=Controller::ViewPath('back/product/create.php');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Add Product</span>
                        </a>
                    </li>
                    <li <?php if(Controller::ViewPath('back/product/index.php') == $currentUrl){ echo 'class="active"';}?>>
                        <a href="<?=Controller::ViewPath('back/product/index.php');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">View Product</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if((Controller::ViewPath('back/order/index.php') == $currentUrl) OR (Controller::ViewPath('back/product/index.php') == $currentUrl)): echo "pcoded-trigger active"; endif;?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Order</span>
                </a>
                <ul class="pcoded-submenu">
                    <li <?php if(Controller::ViewPath('back/order/index.php') == $currentUrl){ echo 'class="active"';}?>>
                        <a href="<?=Controller::ViewPath('back/order/index.php');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">View Order</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>