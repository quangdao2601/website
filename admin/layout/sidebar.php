<div id="sidebar" class="bg-white">
    <ul id="sidebar-menu">
        <li class="nav-link">
            <a href="?mod=index&controller=index&action=dashboard">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Dashboard
            </a>
            <i class="arrow fas fa-angle-right"></i>
        </li>

        <li class="nav-link active">
            <a href="?mod=products&controller=product&action=listproduct">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Sản phẩm
            </a>
            <i class="arrow fas fa-angle-down"></i>
            <ul class="sub-menu">
                <li><a href="?mod=products&controller=product&action=addproduct">Thêm mới</a></li>
                <li><a href="?mod=products&controller=product&action=listproduct">Danh sách</a></li>
                <li><a href="?mod=products&controller=category&action=listcategory">Danh mục</a></li>
                <li><a href="?mod=products&controller=category&action=addcategory">Thêm danh mục sản phẩm</a></li>

            </ul>
        </li>
        <li class="nav-link">
            <a href="?mod=order&action=listorder">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Đơn hàng
            </a>
            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="?mod=order&action=listorder">Đơn hàng</a></li>
            </ul>
        </li>
        <li class="nav-link">
            <a href="?mod=member&controller=index&action=listmember">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Quản lý thành viên
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="?mod=member&controller=index&action=addmember">Thêm mới</a></li>
                <li><a href="?mod=member&controller=index&action=listmember">Danh sách</a></li>
            </ul>
        </li>
        <li class="nav-link">
            <a href="?mod=permission&controller=index&action=listpermission">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Quản lý quyền thành viên
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="?mod=permission&controller=index&action=listpermission">Danh sách quyền </a></li>
                <li><a href="?mod=permission&controller=index&action=addpermission">Thêm quyền</a></li>
            </ul>
        </li>
        <li class="nav-link">
            <a href="?mod=yourinfo&controller=index&action=info">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Thông tin cá nhân
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="?mod=yourinfo&controller=index&action=info">Thông tin cá nhân</a></li>
                <li><a href="?mod=yourinfo&controller=index&action=resetpass">Đổi mật khẩu</a></li>
            </ul>
        </li>




    </ul>
</div>