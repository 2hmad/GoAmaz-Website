<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    @include('admin.layouts.links')
    <style>
        #example1_wrapper {
            text-align: left;
            direction: ltr;
        }

        .row {
            align-items: center;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        @include('admin.layouts.sidebar')
        <div class="content-wrapper">
            <section class="content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>الدولة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->country }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
    @include('admin.layouts.scripts')
    <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../admin/plugins/jszip/jszip.min.js"></script>
    <script src="../admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
