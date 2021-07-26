<?php 
    include './../config.php'; 
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Basic Page Info -->
        <meta charset="utf-8" />
        <title>Execellent Admin Panel</title>

        <!-- Site favicon -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="./../vendors/images/apple-touch-icon.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="./../vendors/images/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="./../vendors/images/favicon-16x16.png"
        />

        <!-- Mobile Specific Metas -->
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1"
        />

        <!-- Google Font -->
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
        <!-- CSS -->
        <link
            rel="stylesheet"
            type="text/css"
            href="./../vendors/styles/core.css"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="./../vendors/styles/icon-font.min.css"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="./../src/plugins/datatables/css/dataTables.bootstrap4.min.css"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="./../src/plugins/datatables/css/responsive.bootstrap4.min.css"
        />
	    <link 
    	    rel="stylesheet" 
    	    type="text/css" 
    	    href="./../src/plugins/sweetalert2/sweetalert2.css"
	    >
	    <link rel="stylesheet" type="text/css" href="https://varnikabiz.com/exam/admin/pages/font/stylesheet.css">
	    
        <link
            rel="stylesheet"
            type="text/css"
            href="./../vendors/styles/style.css"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hind+Madurai&display=swap" rel="stylesheet">
    </head>
    <body>
 

        <div class="header">
            <div class="header-left">
                <div class="menu-icon dw dw-menu"></div>
                <div
                    class="search-toggle-icon dw dw-search2"
                    data-toggle="header_search"
                ></div>
                <!-- <div class="header-search">
                    <form>
                        <div class="form-group mb-0">
                            <i class="dw dw-search2 search-icon"></i>
                            <input
                                type="text"
                                class="form-control search-input"
                                placeholder="Search Here"
                            />
                        </div>
                    </form>
                </div> -->
            </div>
            <div class="header-right">
                
                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a
                            class="dropdown-toggle"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                        >
                            <span class="user-icon">
                                <img
                                    src="./../vendors/images/photo1.jpg"
                                    alt=""
                                />
                            </span>
                            <span class="user-name">Admin</span>
                        </a>
                        <div
                            class="
                                dropdown-menu
                                dropdown-menu-right
                                dropdown-menu-icon-list
                            "
                        >
                            
                            <a class="dropdown-item" href="login.html"
                                ><i class="dw dw-logout"></i> Log Out</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-sidebar">
            <div class="sidebar-title">
                <h3 class="weight-600 font-16 text-blue">
                    Layout Settings
                    <span class="btn-block font-weight-400 font-12"
                        >User Interface Settings</span
                    >
                </h3>
                <div class="close-sidebar" data-toggle="right-sidebar-close">
                    <i class="icon-copy ion-close-round"></i>
                </div>
            </div>
            <div class="right-sidebar-body customscroll">
                <div class="right-sidebar-body-content">
                    <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-outline-primary header-white active"
                            >White</a
                        >
                        <a
                            href="javascript:void(0);"
                            class="btn btn-outline-primary header-dark"
                            >Dark</a
                        >
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-outline-primary sidebar-light"
                            >White</a
                        >
                        <a
                            href="javascript:void(0);"
                            class="btn btn-outline-primary sidebar-dark active"
                            >Dark</a
                        >
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                    <div class="sidebar-radio-group pb-10 mb-10">
                        <div
                            class="
                                custom-control
                                custom-radio
                                custom-control-inline
                            "
                        >
                            <input
                                type="radio"
                                id="sidebaricon-1"
                                name="menu-dropdown-icon"
                                class="custom-control-input"
                                value="icon-style-1"
                                checked=""
                            />
                            <label
                                class="custom-control-label"
                                for="sidebaricon-1"
                                ><i class="fa fa-angle-down"></i
                            ></label>
                        </div>
                        <div
                            class="
                                custom-control
                                custom-radio
                                custom-control-inline
                            "
                        >
                            <input
                                type="radio"
                                id="sidebaricon-2"
                                name="menu-dropdown-icon"
                                class="custom-control-input"
                                value="icon-style-2"
                            />
                            <label
                                class="custom-control-label"
                                for="sidebaricon-2"
                                ><i class="ion-plus-round"></i
                            ></label>
                        </div>
                        <div
                            class="
                                custom-control
                                custom-radio
                                custom-control-inline
                            "
                        >
                            <input
                                type="radio"
                                id="sidebaricon-3"
                                name="menu-dropdown-icon"
                                class="custom-control-input"
                                value="icon-style-3"
                            />
                            <label
                                class="custom-control-label"
                                for="sidebaricon-3"
                                ><i class="fa fa-angle-double-right"></i
                            ></label>
                        </div>
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                    <div class="sidebar-radio-group pb-30 mb-10">
                        <div
                            class="
                                custom-control
                                custom-radio
                                custom-control-inline
                            "
                        >
                            <input
                                type="radio"
                                id="sidebariconlist-1"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-1"
                                checked=""
                            />
                            <label
                                class="custom-control-label"
                                for="sidebariconlist-1"
                                ><i class="ion-minus-round"></i
                            ></label>
                        </div>
                        <div
                            class="
                                custom-control
                                custom-radio
                                custom-control-inline
                            "
                        >
                            <input
                                type="radio"
                                id="sidebariconlist-2"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-2"
                            />
                            <label
                                class="custom-control-label"
                                for="sidebariconlist-2"
                                ><i
                                    class="fa fa-circle-o"
                                    aria-hidden="true"
                                ></i
                            ></label>
                        </div>
                        <div
                            class="
                                custom-control
                                custom-radio
                                custom-control-inline
                            "
                        >
                            <input
                                type="radio"
                                id="sidebariconlist-3"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-3"
                            />
                            <label
                                class="custom-control-label"
                                for="sidebariconlist-3"
                                ><i class="dw dw-check"></i
                            ></label>
                        </div>
                        <div
                            class="
                                custom-control
                                custom-radio
                                custom-control-inline
                            "
                        >
                            <input
                                type="radio"
                                id="sidebariconlist-4"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-4"
                                checked=""
                            />
                            <label
                                class="custom-control-label"
                                for="sidebariconlist-4"
                                ><i class="icon-copy dw dw-next-2"></i
                            ></label>
                        </div>
                        <div
                            class="
                                custom-control
                                custom-radio
                                custom-control-inline
                            "
                        >
                            <input
                                type="radio"
                                id="sidebariconlist-5"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-5"
                            />
                            <label
                                class="custom-control-label"
                                for="sidebariconlist-5"
                                ><i class="dw dw-fast-forward-1"></i
                            ></label>
                        </div>
                        <div
                            class="
                                custom-control
                                custom-radio
                                custom-control-inline
                            "
                        >
                            <input
                                type="radio"
                                id="sidebariconlist-6"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-6"
                            />
                            <label
                                class="custom-control-label"
                                for="sidebariconlist-6"
                                ><i class="dw dw-next"></i
                            ></label>
                        </div>
                    </div>

                    <div class="reset-options pt-30 text-center">
                        <button class="btn btn-danger" id="reset-settings">
                            Reset Settings
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <style>
           .hfont p ,.mce-content-body p ,.dtr-data p {
               font-family: 'AAText';
}
        </style>
          <script src="https://cdn.tiny.cloud/1/k9j415mjw2ebs5xsoj3ue60dhvzadt6asnxz4dwcaiyxtla5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

