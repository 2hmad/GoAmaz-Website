        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ $data->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="dashboard" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    الصفحة الرئيسية
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="users" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    الاعضاء
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-admin" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    اضافة مشرف
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="statistics" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    الاحصائيات
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="ads" class="nav-link">
                                <i class="nav-icon fas fa-ad"></i>
                                <p>
                                    الاعلانات
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    تسجيل الخروج
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
