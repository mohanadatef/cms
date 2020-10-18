<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Left side column. contains the logo and sidebar -->
        <ul class="sidebar-menu" data-widget="tree">
            @permission('core-data-list')
            <li  class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Core Data</span><span class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    @permission('size-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Size</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('size-index')
                            <li><a href="{{ url('/admin/size/index') }}"><i class="fa fa-group"></i><span>All Size</span></a>
                            </li>
                            @endpermission
                            @permission('size-create')
                            <li><a href="{{ url('/admin/size/create') }}"><i
                                            class="fa fa-group"></i><span>Add Size</span></a></li>
                            @endpermission
                            @permission('size-index-delete')
                            <li><a href="{{ url('/admin/size/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Size Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('service-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Service</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('service-index')
                            <li><a href="{{ url('/admin/service/index') }}"><i class="fa fa-group"></i><span>All Service</span></a>
                            </li>
                            @endpermission
                            @permission('service-create')
                            <li><a href="{{ url('/admin/service/create') }}"><i
                                            class="fa fa-group"></i><span>Add Service</span></a></li>
                            @endpermission
                            @permission('service-index-delete')
                            <li><a href="{{ url('/admin/service/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Service Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('category-service-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Category Service</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('category-service-index')
                            <li><a href="{{ url('/admin/category_service/index') }}"><i class="fa fa-group"></i><span>All Category Service</span></a>
                            </li>
                            @endpermission
                            @permission('category-service-create')
                            <li><a href="{{ url('/admin/category_service/create') }}"><i
                                            class="fa fa-group"></i><span>Add Category Service</span></a></li>
                            @endpermission
                            @permission('category-service-index-delete')
                            <li><a href="{{ url('/admin/category_service/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Category Service Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('product-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Product</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('product-index')
                            <li><a href="{{ url('/admin/product/index') }}"><i class="fa fa-group"></i><span>All Product</span></a>
                            </li>
                            @endpermission
                            @permission('product-create')
                            <li><a href="{{ url('/admin/product/create') }}"><i
                                            class="fa fa-group"></i><span>Add Product</span></a></li>
                            @endpermission
                            @permission('product-index-delete')
                            <li><a href="{{ url('/admin/product/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Product Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('item-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Item</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('item-index')
                            <li><a href="{{ url('/admin/item/index') }}"><i class="fa fa-group"></i><span>All Item</span></a>
                            </li>
                            @endpermission
                            @permission('item-create')
                            <li><a href="{{ url('/admin/item/create') }}"><i
                                            class="fa fa-group"></i><span>Add Item</span></a></li>
                            @endpermission
                            @permission('item-index-delete')
                            <li><a href="{{ url('/admin/item/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Item Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('vacance-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Vacance</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('vacance-index')
                            <li><a href="{{ url('/admin/vacance/index') }}"><i class="fa fa-group"></i><span>All Vacance</span></a>
                            </li>
                            @endpermission
                            @permission('vacance-create')
                            <li><a href="{{ url('/admin/vacance/create') }}"><i
                                            class="fa fa-group"></i><span>Add Vacance</span></a></li>
                            @endpermission
                            @permission('vacance-index-delete')
                            <li><a href="{{ url('/admin/vacance/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Vacance Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('media-center-list')
            <li class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Media Center</span><span class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    @permission('news-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>News</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('news-index')
                            <li><a href="{{ url('/admin/news/index') }}"><i class="fa fa-group"></i><span>All News</span></a>
                            </li>
                            @endpermission
                            @permission('news-create')
                            <li><a href="{{ url('/admin/news/create') }}"><i
                                            class="fa fa-group"></i><span>Add News</span></a></li>
                            @endpermission
                            @permission('news-index-delete')
                            <li><a href="{{ url('/admin/news/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All News Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('client-list')
                    <li  class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Client</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('client-index')
                            <li><a href="{{ url('/admin/client/index') }}"><i class="fa fa-group"></i><span>All Client</span></a>
                            </li>
                            @endpermission
                            @permission('client-create')
                            <li><a href="{{ url('/admin/client/create') }}"><i
                                            class="fa fa-group"></i><span>Add Client</span></a></li>
                            @endpermission
                            @permission('client-index-delete')
                            <li><a href="{{ url('/admin/client/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Client Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('gallery-list')
                    <li  class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Gallery</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('gallery-index')
                            <li><a href="{{ url('/admin/gallery/index') }}"><i class="fa fa-group"></i><span>All Gallery</span></a>
                            </li>
                            @endpermission
                            @permission('gallery-create')
                            <li><a href="{{ url('/admin/gallery/create') }}"><i
                                            class="fa fa-group"></i><span>Add Gallery</span></a></li>
                            @endpermission
                            @permission('gallery-index-delete')
                            <li><a href="{{ url('/admin/gallery/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Gallery Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('album-list')
                    <li  class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Album</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('album-index')
                            <li><a href="{{ url('/admin/album/index') }}"><i class="fa fa-group"></i><span>All Album</span></a>
                            </li>
                            @endpermission
                            @permission('album-create')
                            <li><a href="{{ url('/admin/album/create') }}"><i
                                            class="fa fa-group"></i><span>Add Album</span></a></li>
                            @endpermission
                            @permission('album-index-delete')
                            <li><a href="{{ url('/admin/album/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Album Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('setting-list')
            <li  class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Setting</span><span class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    @permission('home-slider-list')
                    <li  class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Home Slider</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('home-slider-index')
                            <li><a href="{{ url('/admin/home_slider/index') }}"><i class="fa fa-group"></i><span>All Home Slider</span></a>
                            </li>
                            @endpermission
                            @permission('home-slider-create')
                            <li><a href="{{ url('/admin/home_slider/create') }}"><i
                                            class="fa fa-group"></i><span>Add Home Slide</span></a></li>
                            @endpermission
                            @permission('home-slider-index-delete')
                            <li><a href="{{ url('/admin/home_slider/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Home Slide Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('setting-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Setting</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('setting-index')
                            <li><a href="{{ url('/admin/setting/index') }}"><i class="fa fa-group"></i><span>Setting</span></a>
                            </li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('about-us-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>About US</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('about-us-index')
                            <li><a href="{{ url('/admin/about_us/index') }}"><i class="fa fa-group"></i><span>About US</span></a>
                            </li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('contact-us-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Contact US</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('contact-us-index')
                            <li><a href="{{ url('/admin/contact_us/index') }}"><i class="fa fa-group"></i><span>Contact US</span></a>
                            </li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('acl-list')
            <li  class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span>ACL</span><span class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    @permission('user-list')
                    <li  class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>User</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('user-index')
                            <li><a href="{{ url('/admin/user/index') }}"><i class="fa fa-group"></i><span>All User</span></a>
                            </li>
                            @endpermission
                            @permission('user-create')
                            <li><a href="{{ url('/admin/user/create') }}"><i
                                            class="fa fa-group"></i><span>Add User</span></a></li>
                            @endpermission
                            @permission('user-index-delete')
                            <li><a href="{{ url('/admin/user/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All User Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('role-list')
                    <li  class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Role</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('role-index')
                            <li><a href="{{ url('/admin/role/index') }}"><i class="fa fa-group"></i><span>All Role</span></a>
                            </li>
                            @endpermission
                            @permission('role-create')
                            <li><a href="{{ url('/admin/role/create') }}"><i
                                            class="fa fa-group"></i><span>Add Rloe</span></a></li>
                            @endpermission
                            @permission('role-index-delete')
                            <li><a href="{{ url('/admin/role/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Role Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('permission-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Permission</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul  class="treeview-menu">
                            @permission('permission-index')
                            <li><a href="{{ url('/admin/permission/index') }}"><i class="fa fa-group"></i><span>All Permission</span></a>
                            </li>
                            @endpermission
                            @permission('permission-index-delete')
                            <li><a href="{{ url('/admin/permission/index/delete') }}"><i
                                            class="fa fa-group"></i><span>All Permission Delete</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@yield('main-sidebar')
