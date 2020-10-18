<?php
use Illuminate\Support\Facades\DB;
use Modules\ACL\Entities\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions=[
            //dashboard
            [
                'name'=>'dashboard-show',
                'display_name'=>'dashboard show',
                'description'=>'show dashboard',
            ],
            //acl
            [
                'name'=>'acl-list',
                'display_name'=>'acl list',
                'description'=>'list acl',
            ],
            //user
            [
                'name'=>'user-list',
                'display_name'=>'user list',
                'description'=>'list user',
            ],
            [
                'name'=>'user-index',
                'display_name'=>'index user',
                'description'=>'index data in user',
            ],
            [
                'name'=>'user-index-delete',
                'display_name'=>'index delete user',
                'description'=>'index delete data in user',
            ],
            [
                'name'=>'user-create',
                'display_name'=>'create user',
                'description'=>'create data in user',
            ],
            [
                'name'=>'user-edit',
                'display_name'=>'edit user',
                'description'=>'edit data in user',
            ],
            [
                'name'=>'user-delete',
                'display_name'=>'delete user',
                'description'=>'delete data in user',
            ],
            [
                'name'=>'user-restore',
                'display_name'=>'restore user',
                'description'=>'restore data in user',
            ],
            [
                'name'=>'user-password',
                'display_name'=>'password user',
                'description'=>'password data in user',
            ],
            [
                'name'=>'user-status',
                'display_name'=>'status user',
                'description'=>'status data in user',
            ],
            [
                'name'=>'user-many-status',
                'display_name'=>'status many user',
                'description'=>'status many data in user',
            ],
            //role
            [
                'name'=>'role-list',
                'display_name'=>'list role',
                'description'=>'list data in role',
            ],
            [
                'name'=>'role-index',
                'display_name'=>'index role',
                'description'=>'index data in role',
            ],
            [
                'name'=>'role-index-delete',
                'display_name'=>'index delete role',
                'description'=>'index delete data in role',
            ],
            [
                'name'=>'role-create',
                'display_name'=>'create role',
                'description'=>'create data in role',
            ],
            [
                'name'=>'role-edit',
                'display_name'=>'edit role',
                'description'=>'edit data in role',
            ],
            [
                'name'=>'role-delete',
                'display_name'=>'delete role',
                'description'=>'delete data in role',
            ],
            [
                'name'=>'role-restore',
                'display_name'=>'role user',
                'description'=>'role data in user',
            ],
            //permission
            [
                'name'=>'permission-list',
                'display_name'=>'permission list',
                'description'=>'list permission',
            ],
            [
                'name'=>'permission-index',
                'display_name'=>'permission index',
                'description'=>'index permission',
            ],
            [
                'name'=>'permission-index-delete',
                'display_name'=>'permission delete index',
                'description'=>'index delete permission',
            ],
            [
                'name'=>'permission-edit',
                'display_name'=>'edit permission',
                'description'=>'edit data in permission',
            ],
            [
                'name'=>'permission-delete',
                'display_name'=>'delete permission',
                'description'=>'delete data in permission',
            ],
            [
                'name'=>'permission-restore',
                'display_name'=>'permission user',
                'description'=>'permission data in user',
            ],
            //setting
            [
                'name'=>'setting-list',
                'display_name'=>'setting list',
                'description'=>'list setting',
            ],
            [
                'name'=>'setting-index',
                'display_name'=>'setting index',
                'description'=>'index setting',
            ],
            [
                'name'=>'setting-create',
                'display_name'=>'create setting',
                'description'=>'create data in setting',
            ],
            [
                'name'=>'setting-edit',
                'display_name'=>'edit setting',
                'description'=>'edit data in setting',
            ],
            //about us
            [
                'name'=>'about-us-list',
                'display_name'=>'about us list',
                'description'=>'list about us',
            ],
            [
                'name'=>'about-us-index',
                'display_name'=>'about us index',
                'description'=>'index about us',
            ],
            [
                'name'=>'about-us-create',
                'display_name'=>'create about us',
                'description'=>'create us data in about',
            ],
            [
                'name'=>'about-us-edit',
                'display_name'=>'edit about us',
                'description'=>'edit data in about us',
            ],
            //contact us
            [
                'name'=>'contact-us-list',
                'display_name'=>'contact us list',
                'description'=>'list contact us',
            ],
            [
                'name'=>'contact-us-index',
                'display_name'=>'contact us index',
                'description'=>'index contact us',
            ],
            [
                'name'=>'contact-us-create',
                'display_name'=>'create contact us',
                'description'=>'create us data in contact',
            ],
            [
                'name'=>'contact-us-edit',
                'display_name'=>'edit about us',
                'description'=>'edit data in about us',
            ],
            //home slider
            [
                'name'=>'home-slider-list',
                'display_name'=>'home slider list',
                'description'=>'list home slider',
            ],
            [
                'name'=>'home-slider-index',
                'display_name'=>'index home slider',
                'description'=>'index data in home slider',
            ],
            [
                'name'=>'home-slider-index-delete',
                'display_name'=>'index delete home slider',
                'description'=>'index delete data in home slider',
            ],
            [
                'name'=>'home-slider-create',
                'display_name'=>'create home slider',
                'description'=>'create data in home slider',
            ],
            [
                'name'=>'home-slider-edit',
                'display_name'=>'edit home slider',
                'description'=>'edit data in home slider',
            ],
            [
                'name'=>'home-slider-delete',
                'display_name'=>'delete home slider',
                'description'=>'delete data in home slider',
            ],
            [
                'name'=>'home-slider-restore',
                'display_name'=>'restore home slider',
                'description'=>'restore data in home slider',
            ],
            [
                'name'=>'home-slider-status',
                'display_name'=>'status home slider',
                'description'=>'status data in home slider',
            ],
            [
                'name'=>'home-slider-many-status',
                'display_name'=>'status many home slider',
                'description'=>'status many data in home slider',
            ],
            //media center
            [
                'name'=>'media-center-list',
                'display_name'=>'media center list',
                'description'=>'list media center',
            ],
            //news
            [
                'name'=>'news-list',
                'display_name'=>'news list',
                'description'=>'list news',
            ],
            [
                'name'=>'news-index',
                'display_name'=>'index news',
                'description'=>'index data in news',
            ],
            [
                'name'=>'news-index-delete',
                'display_name'=>'index delete news',
                'description'=>'index delete data in news',
            ],
            [
                'name'=>'news-create',
                'display_name'=>'create news',
                'description'=>'create data in news',
            ],
            [
                'name'=>'news-edit',
                'display_name'=>'edit news',
                'description'=>'edit data in news',
            ],
            [
                'name'=>'news-delete',
                'display_name'=>'delete news',
                'description'=>'delete data in news',
            ],
            [
                'name'=>'news-restore',
                'display_name'=>'restore news',
                'description'=>'restore data in news',
            ],
            [
                'name'=>'news-status',
                'display_name'=>'status news',
                'description'=>'status data in news',
            ],
            [
                'name'=>'news-many-status',
                'display_name'=>'status many news',
                'description'=>'status many data in news',
            ],
            //client
            [
                'name'=>'client-list',
                'display_name'=>'client list',
                'description'=>'list client',
            ],
            [
                'name'=>'client-index',
                'display_name'=>'index client',
                'description'=>'index data in client',
            ],
            [
                'name'=>'client-index-delete',
                'display_name'=>'index delete client',
                'description'=>'index delete data in client',
            ],
            [
                'name'=>'client-create',
                'display_name'=>'create client',
                'description'=>'create data in client',
            ],
            [
                'name'=>'client-edit',
                'display_name'=>'edit client',
                'description'=>'edit data in client',
            ],
            [
                'name'=>'client-delete',
                'display_name'=>'delete client',
                'description'=>'delete data in client',
            ],
            [
                'name'=>'client-restore',
                'display_name'=>'restore client',
                'description'=>'restore data in client',
            ],
            [
                'name'=>'client-status',
                'display_name'=>'status client',
                'description'=>'status data in client',
            ],
            [
                'name'=>'client-many-status',
                'display_name'=>'status many client',
                'description'=>'status many data in client',
            ],
            //gallery
            [
                'name'=>'gallery-list',
                'display_name'=>'gallery list',
                'description'=>'list gallery',
            ],
            [
                'name'=>'gallery-index',
                'display_name'=>'index gallery',
                'description'=>'index data in gallery',
            ],
            [
                'name'=>'gallery-index-delete',
                'display_name'=>'index delete gallery',
                'description'=>'index delete data in gallery',
            ],
            [
                'name'=>'gallery-create',
                'display_name'=>'create gallery',
                'description'=>'create data in gallery',
            ],
            [
                'name'=>'gallery-edit',
                'display_name'=>'edit gallery',
                'description'=>'edit data in gallery',
            ],
            [
                'name'=>'gallery-delete',
                'display_name'=>'delete gallery',
                'description'=>'delete data in gallery',
            ],
            [
                'name'=>'gallery-restore',
                'display_name'=>'restore gallery',
                'description'=>'restore data in gallery',
            ],
            [
                'name'=>'gallery-status',
                'display_name'=>'status gallery',
                'description'=>'status data in gallery',
            ],
            [
                'name'=>'gallery-many-status',
                'display_name'=>'status many gallery',
                'description'=>'status many data in gallery',
            ],
            //album
            [
                'name'=>'album-list',
                'display_name'=>'album list',
                'description'=>'list album',
            ],
            [
                'name'=>'album-index',
                'display_name'=>'index album',
                'description'=>'index data in album',
            ],
            [
                'name'=>'album-index-delete',
                'display_name'=>'index delete album',
                'description'=>'index delete data in album',
            ],
            [
                'name'=>'album-create',
                'display_name'=>'create album',
                'description'=>'create data in album',
            ],
            [
                'name'=>'album-edit',
                'display_name'=>'edit album',
                'description'=>'edit data in album',
            ],
            [
                'name'=>'album-delete',
                'display_name'=>'delete album',
                'description'=>'delete data in album',
            ],
            [
                'name'=>'album-restore',
                'display_name'=>'restore album',
                'description'=>'restore data in album',
            ],
            [
                'name'=>'album-status',
                'display_name'=>'status album',
                'description'=>'status data in album',
            ],
            [
                'name'=>'album-many-status',
                'display_name'=>'status many album',
                'description'=>'status many data in album',
            ],
            //core data
            [
                'name'=>'core-data-list',
                'display_name'=>'core data list',
                'description'=>'list core data',
            ],
            //service
            [
                'name'=>'service-list',
                'display_name'=>'service list',
                'description'=>'list service',
            ],
            [
                'name'=>'service-index',
                'display_name'=>'index service',
                'description'=>'index data in service',
            ],
            [
                'name'=>'service-index-delete',
                'display_name'=>'index delete service',
                'description'=>'index delete data in service',
            ],
            [
                'name'=>'service-create',
                'display_name'=>'create service',
                'description'=>'create data in service',
            ],
            [
                'name'=>'service-edit',
                'display_name'=>'edit service',
                'description'=>'edit data in service',
            ],
            [
                'name'=>'service-delete',
                'display_name'=>'delete service',
                'description'=>'delete data in service',
            ],
            [
                'name'=>'service-restore',
                'display_name'=>'restore service',
                'description'=>'restore data in service',
            ],
            [
                'name'=>'service-status',
                'display_name'=>'status service',
                'description'=>'status data in service',
            ],
            [
                'name'=>'service-many-status',
                'display_name'=>'status many service',
                'description'=>'status many data in service',
            ],//category-service
            [
                'name'=>'category-service-list',
                'display_name'=>'category service list',
                'description'=>'list category service',
            ],
            [
                'name'=>'category-service-index',
                'display_name'=>'index category service',
                'description'=>'index data in category service',
            ],
            [
                'name'=>'category-service-index-delete',
                'display_name'=>'index delete category service',
                'description'=>'index delete data in category service',
            ],
            [
                'name'=>'category-service-create',
                'display_name'=>'create category service',
                'description'=>'create data in category service',
            ],
            [
                'name'=>'category-service-edit',
                'display_name'=>'edit category service',
                'description'=>'edit data in category service',
            ],
            [
                'name'=>'category-service-delete',
                'display_name'=>'delete category service',
                'description'=>'delete data in category service',
            ],
            [
                'name'=>'category-service-restore',
                'display_name'=>'restore category service',
                'description'=>'restore data in category service',
            ],
            [
                'name'=>'category-service-status',
                'display_name'=>'status category service',
                'description'=>'status data in category service',
            ],
            [
                'name'=>'category-service-many-status',
                'display_name'=>'status many service',
                'description'=>'status many data in category service',
            ],
            //product
            [
                'name'=>'product-list',
                'display_name'=>'product list',
                'description'=>'list product',
            ],
            [
                'name'=>'product-index',
                'display_name'=>'index product',
                'description'=>'index data in product',
            ],
            [
                'name'=>'product-index-delete',
                'display_name'=>'index delete product',
                'description'=>'index delete data in product',
            ],
            [
                'name'=>'product-create',
                'display_name'=>'create product',
                'description'=>'create data in product',
            ],
            [
                'name'=>'product-edit',
                'display_name'=>'edit product',
                'description'=>'edit data in product',
            ],
            [
                'name'=>'product-delete',
                'display_name'=>'delete product',
                'description'=>'delete data in product',
            ],
            [
                'name'=>'product-restore',
                'display_name'=>'restore product',
                'description'=>'restore data in product',
            ],
            [
                'name'=>'product-status',
                'display_name'=>'status product',
                'description'=>'status data in product',
            ],
            [
                'name'=>'product-many-status',
                'display_name'=>'status many product',
                'description'=>'status many data in product',
            ],//item
            [
                'name'=>'item-list',
                'display_name'=>'item list',
                'description'=>'list item',
            ],
            [
                'name'=>'item-index',
                'display_name'=>'index item',
                'description'=>'index data in item',
            ],
            [
                'name'=>'item-index-delete',
                'display_name'=>'index delete item',
                'description'=>'index delete data in item',
            ],
            [
                'name'=>'item-create',
                'display_name'=>'create item',
                'description'=>'create data in item',
            ],
            [
                'name'=>'item-edit',
                'display_name'=>'edit item',
                'description'=>'edit data in item',
            ],
            [
                'name'=>'item-delete',
                'display_name'=>'delete item',
                'description'=>'delete data in item',
            ],
            [
                'name'=>'item-restore',
                'display_name'=>'restore item',
                'description'=>'restore data in item',
            ],
            [
                'name'=>'item-status',
                'display_name'=>'status item',
                'description'=>'status data in item',
            ],
            [
                'name'=>'item-many-status',
                'display_name'=>'status many item',
                'description'=>'status many data in item',
            ],
            //vacance
            [
                'name'=>'vacance-list',
                'display_name'=>'vacance list',
                'description'=>'list vacance',
            ],
            [
                'name'=>'vacance-index',
                'display_name'=>'index vacance',
                'description'=>'index data in vacance',
            ],
            [
                'name'=>'vacance-index-delete',
                'display_name'=>'index delete vacance',
                'description'=>'index delete data in vacance',
            ],
            [
                'name'=>'vacance-create',
                'display_name'=>'create vacance',
                'description'=>'create data in vacance',
            ],
            [
                'name'=>'vacance-edit',
                'display_name'=>'edit vacance',
                'description'=>'edit data in vacance',
            ],
            [
                'name'=>'vacance-delete',
                'display_name'=>'delete vacance',
                'description'=>'delete data in vacance',
            ],
            [
                'name'=>'vacance-restore',
                'display_name'=>'restore vacance',
                'description'=>'restore data in vacance',
            ],
            [
                'name'=>'vacance-status',
                'display_name'=>'status vacance',
                'description'=>'status data in vacance',
            ],
            [
                'name'=>'vacance-many-status',
                'display_name'=>'status many vacance',
                'description'=>'status many data in vacance',
            ],
            //size
            [
                'name'=>'size-list',
                'display_name'=>'size list',
                'description'=>'list size',
            ],
            [
                'name'=>'size-index',
                'display_name'=>'index size',
                'description'=>'index data in size',
            ],
            [
                'name'=>'size-index-delete',
                'display_name'=>'index delete size',
                'description'=>'index delete data in size',
            ],
            [
                'name'=>'size-create',
                'display_name'=>'create size',
                'description'=>'create data in size',
            ],
            [
                'name'=>'size-edit',
                'display_name'=>'edit size',
                'description'=>'edit data in size',
            ],
            [
                'name'=>'size-delete',
                'display_name'=>'delete size',
                'description'=>'delete data in size',
            ],
            [
                'name'=>'size-restore',
                'display_name'=>'restore size',
                'description'=>'restore data in size',
            ],
            [
                'name'=>'size-status',
                'display_name'=>'status size',
                'description'=>'status data in size',
            ],
            [
                'name'=>'size-many-status',
                'display_name'=>'status many size',
                'description'=>'status many data in size',
            ],
        ];
        foreach ($permissions as $key=>$value)
        {
            Permission::create($value);
        }
    }
}
