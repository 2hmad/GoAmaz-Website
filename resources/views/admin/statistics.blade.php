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
            <section class="content">
                <div class="row" style="gap: 5px;margin-bottom:2%;margin-top:3%">
                    <div class="col"
                        style="background:white;border-radius:5px;box-shadow:0px 0px 20px 1px #f3f3f3">
                        <div class="table-responsive" style="height: 300px;overflow:scroll">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="4" style="text-align: center">احصائية الصفحات</th>
                                    </tr>
                                    <tr>
                                        <th>الاي بي</th>
                                        <th>الدولة</th>
                                        <th>التاريخ</th>
                                        <th>رقم المنتج</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($analyticsData as $data)
                                        <tr>
                                            <td>{{ $data['ip'] }}</td>
                                            <td>{{ Location::get('102.40.194.32')->countryName }}
                                            </td>
                                            <td>{{ $data['date'] }}</td>
                                            <td>{{ $data['product'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col"
                        style="background:white;border-radius:5px;box-shadow:0px 0px 20px 1px #f3f3f3">
                        <h6 style="text-align: center;padding: 0.75rem;font-weight:bold;text-decoration:underline">
                            احصائية دول الزوار</h6>
                        <div>
                            <canvas id="myChart" width="200" height="100px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row" style="gap: 5px;margin-bottom:2%">
                    <div class="col"
                        style="background:white;border-radius:5px;box-shadow:0px 0px 20px 1px #f3f3f3">
                        <h6 style="text-align: center;padding: 0.75rem;font-weight:bold;text-decoration:underline">
                            الدول
                            الاكثر زيارة</h6>
                        <div>
                            <canvas id="barChart" height="100"></canvas>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var oilCanvas = document.getElementById("myChart");

    Chart.defaults.global.defaultFontFamily = "Tajawal";
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
<script>
    var canvas = document.getElementById("barChart");
    var ctx = canvas.getContext('2d');
    Chart.defaults.global.defaultFontFamily = "Tajawal";
    Chart.defaults.global.defaultFontColor = 'dodgerblue';
    Chart.defaults.global.defaultFontSize = 16;
    var data = {
        labels: [
            @foreach ($results as $result)
                "{{ '' . $result['country'] . '' }}",
            @endforeach
        ],
        datasets: [{
            label: "عدد الزيارات",
            fill: true,
            backgroundColor: [
                @foreach ($results as $result)
                    "{{ '#' . substr(md5(rand()), 0, 6) }}",
                @endforeach
            ],
            data: [
                @foreach ($results as $result)
                    "{{ '' . $result['sessions'] . '' }}",
                @endforeach
            ]
        }]
    };
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>

</html>
