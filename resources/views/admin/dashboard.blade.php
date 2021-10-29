<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    @include('admin.layouts.links')
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">لوحة التحكم</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ DB::table('users')->count() }}</h3>
                                <p>عدد الاعضاء</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ DB::table('product_counter')->count() }}</h3>
                                <p>النقر علي المنتجات</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ DB::table('visitors')->count() }}</h3>
                                <p>الزوار علي موقعك</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ Analytics::getAnalyticsService()->data_realtime->get('ga:' . env('ANALYTICS_VIEW_ID'), 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'] }}
                                </h3>
                                <p>عدد الزوار النشطين</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="gap: 5px;margin-bottom:2%">
                    <div class="col"
                        style="background:white;border-radius:5px;box-shadow:0px 0px 20px 1px #f3f3f3">
                        <div class="table-responsive" style="height: 300px;overflow:scroll">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>التاريخ</th>
                                        <th>اسم الصفحة</th>
                                        <th>الزوار</th>
                                        <th>المشاهدات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($analyticsData as $data)
                                        <tr>
                                            <td>{{ $data['date'] }}</td>
                                            <td>{{ $data['pageTitle'] }}</td>
                                            <td>{{ $data['visitors'] }}</td>
                                            <td>{{ $data['pageViews'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col"
                        style="background:white;border-radius:5px;box-shadow:0px 0px 20px 1px #f3f3f3">
                        <div>
                            <canvas id="myChart" width="200" height="100px"></canvas>
                        </div>
                    </div>
                </div>
                <h4 style="text-align: center;font-weight:bold;text-decoration:underline">اخر الاعضاء</h4>
                <div class="table-responsive">

                    <table class="table table-bordered table-hover table-striped">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var oilCanvas = document.getElementById("myChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var oilData = {
        labels: [
            @foreach ($results as $result)
                "{{ '' . $result['country'] . '' }}",
            @endforeach
        ],
        datasets: [{
            data: [
                @foreach ($results as $result)
                    "{{ '' . $result['sessions'] . '' }}",
                @endforeach
            ],
            backgroundColor: [
                @foreach ($results as $result)
                    "{{ '#' . substr(md5(rand()), 0, 6) }}",
                @endforeach
            ]
        }]
    };

    var pieChart = new Chart(oilCanvas, {
        type: 'pie',
        data: oilData
    });
</script>

</html>
