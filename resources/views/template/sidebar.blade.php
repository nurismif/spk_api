<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:#242A61">
    <!-- Brand Logo  -->
    <a href="#" class="brand-link">
        <img src="{{ asset('adminlte/img/kemendikbud.png') }}" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light">SMK JAKSEL 2</span>
    </a>
    <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/admin/template/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/user/index" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/teacher/index" class="nav-link">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>Guru</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-puzzle-piece"></i>
                    <p>Kriteria
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/kriteria/index" class="nav-link">
                            <i class="far nav-icon"></i>
                            <p>Detail Kriteria</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/kriteria/matriks" class="nav-link">
                            <i class="far nav-icon"></i>
                            <p>Matriks Kriteria</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/admin/penilaian/index" class="nav-link">
                    <i class="nav-icon fas fa-bookmark"></i>
                    <p>Penilaian </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/ahp/index" class="nav-link">
                    <i class="nav-icon fas fa-file-text"></i>
                    <p>SPK Method</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
