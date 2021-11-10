<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    @include('admin.layouts.links')
    <style>
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #CCC;
            outline: none
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
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        @include('admin.layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="row" style="padding-top: 2%">
                    <div class="col">
                        <h4 style="text-align: center;text-decoration:underline">اضافة مشرف</h4>
                        <form method="POST" action="{{ route('add-admin') }}">
                            @csrf
                            <div class="input-group">
                                <label>اسم المشرف</label>
                                <input type="text" name="name">
                            </div>
                            <div class="input-group">
                                <label>البريد الالكتروني</label>
                                <input type="email" name="email">
                            </div>
                            <div class="input-group">
                                <label>كلمة المرور</label>
                                <input type="password" name="password">
                            </div>
                            <div style="text-align:center;margin-top: 2%">
                                <input type="submit" name="add-ad" class="btn btn-success" value="اضافة المشرف">
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <h4 style="text-align: center;text-decoration:underline">المشرفين</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>البريد الالكتروني</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('delete-admin', ['id' => $admin->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">حذف
                                                        المشرف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
    @include('admin.layouts.scripts')
</body>

</html>
