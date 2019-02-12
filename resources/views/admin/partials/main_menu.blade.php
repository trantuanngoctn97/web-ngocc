<?php 
$menus_admin = [
    ['type' => 'header', 'name' => 'Menu chính'],
    ['type' => 'single', 'route' => 'admin.dashboard', 'icon' => 'fa fa-dashboard', 'name' => 'Trang điều khiển'],
    ['type' => 'single', 'route' => 'admin.catagory-types.index', 'icon' => 'fa fa-plus-square-o', 'name' => 'Quản lý nhóm danh mục'],
    ['type' => 'single', 'route' => 'admin.catagories.index', 'icon' => 'fa fa-plus-square-o', 'name' => 'Quản lý danh mục'],
    ['type' => 'single', 'route' => 'admin.distributions.index', 'icon' => 'fa fa-plus-square-o', 'name' => 'Quản lý nhà phân phối'],
    [
        'type' => 'multi', 'name' => 'Quản lý đơn hàng', 'icon' => 'fa fa-calendar',
        'children' => [
            ['type' => 'single', 'route' => '', 'icon' => '', 'name' => 'Danh sách đặt lịch'],
            ['type' => 'single', 'route' => '', 'icon' => '', 'name' => 'Danh sách lịch hẹn tái khám'],
            ['type' => 'single', 'route' => '', 'icon' => '', 'name' => 'Thiết lập thời gian tái khám'],
        ]
    ],
];  

$menus_writer = [
    ['type' => 'header', 'name' => 'Menu chính'],
    ['type' => 'single', 'route' => '', 'icon' => 'fa fa-user', 'name' => 'Thông tin cá nhân'],
    [
        'type' => 'multi', 'name' => 'Quản lý đặt lịch', 'icon' => 'fa fa-calendar',
        'children' => [
            ['type' => 'single', 'route' => '', 'icon' => '', 'name' => 'Đăng sản phẩm'],
        ]
    ],
];  
 
?>
<ul class="sidebar-menu" data-widget="tree">
    @if(get_guard() == 'admin')
        @foreach($menus_admin as $menu)
            @component('admin.components.menu_item', ['menu' => $menu])
            @endcomponent
        @endforeach
    @elseif(get_guard() == 'writer')
    @foreach($menus_writer as $menu)
            @component('admin.components.menu_item', ['menu' => $menu])
            @endcomponent
        @endforeach
    @endif
</ul>