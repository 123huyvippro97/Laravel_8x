{{--@extends('admin.main')--}}
<!-- SidebarSearch Form -->
<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Danh mục
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm danh mục</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/menus/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách DV</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/products/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                    Sản phẩm
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/products/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/products/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách sản phẩm</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-images"></i>
                <p>
                    Slider
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/sliders/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm slide</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/sliders/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách slide</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
