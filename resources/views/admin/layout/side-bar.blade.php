<div class="nk-sidebar" data-content="sidebarMenu">
            <div class="nk-sidebar-bar">
                <div class="nk-apps-brand">
                    <a href="{{route('dashboard')}}" class="logo-link">
                        <img class="logo-light logo-img" src="./images/logo-small.png" srcset="../../dashlite/images/nav-logo.png" alt="logo">
                        <img class="logo-dark logo-img" src="./images/logo-dark-small.png" srcset="../../dashlite/images/nav-logo.png" alt="logo-dark">
                    </a>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body">
                        <div class="nk-sidebar-content" data-simplebar>
                            <div class="nk-sidebar-menu">
                                <!-- Menu -->
                                <ul class="nk-menu apps-menu">
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link nk-menu-switch" data-target="navPages">
                                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-hr"></li>

                                </ul>
                            </div>
                            <div class="nk-sidebar-footer">
                                <ul class="nk-menu nk-menu-md apps-menu">
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link" title="Settings">
                                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                            <a href="#" data-toggle="dropdown" data-offset="50,-50">
                                <div class="user-avatar">
                                    <span>AB</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md ml-4">
                                <div class="dropdown-inner user-card-wrap d-none d-md-block">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>AB</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="{{route('user')}}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                    <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                        <li><a href="route('logout')"  onclick="event.preventDefault();
                                                this.closest('form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                    </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-sidebar-main is-light">
                <div class="nk-sidebar-inner" data-simplebar>
                    <div class="nk-menu-content" data-content="navPages">
                        <h5 class="title">Pages</h5>
                        <ul class="nk-menu">
                            <!-- <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                                    <span class="nk-menu-text">Projects</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="html/project-card.html" class="nk-menu-link"><span class="nk-menu-text">Project Cards</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/project-list.html" class="nk-menu-link"><span class="nk-menu-text">Project List</span></a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- .nk-menu-item -->
                            @can('assign.*')
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                    <span class="nk-menu-text">User Manage</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="{{route('admin.User-list')}}" class="nk-menu-link"><span class="nk-menu-text">User List</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            @endcan
                            @can('assign.*')
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                    <span class="nk-menu-text">System Manage</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="{{route('admin.role')}}" class="nk-menu-link"><span class="nk-menu-text">Role List</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('admin.permission')}}" class="nk-menu-link"><span class="nk-menu-text">Permission List</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('admin.assign')}}" class="nk-menu-link"><span class="nk-menu-text">Authority List</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            @endcan
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-list-fill"></em></span>
                                    <span class="nk-menu-text">Product</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="{{route('product-index')}}" class="nk-menu-link"><span class="nk-menu-text">Product List</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('detail')}}" class="nk-menu-link"><span class="nk-menu-text">Type List</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            
                            
                            
                          
                            
                        </ul><!-- .nk-menu -->
                    </div>
                </div>
            </div>
        </div>