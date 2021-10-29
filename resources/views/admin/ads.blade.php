<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    @include('admin.layouts.links')
    <style>
        input[type="text"],
        input[type="url"],
        select {
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
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
                        <h4 style="text-align: center;text-decoration:underline">اضافة اعلان منتج</h4>
                        <form method="POST">
                            <div class="input-group">
                                <label>رابط المنتج</label>
                                <input type="text" name="product-url">
                            </div>
                            <div class="input-group">
                                <label>رابط صورة المنتج</label>
                                <input type="text" name="product-image">
                            </div>
                            <div class="input-group">
                                <label>عنوان المنتج</label>
                                <input type="text" name="product-title">
                            </div>
                            <div class="input-group">
                                <label>سعر المنتج</label>
                                <input type="text" name="product-price">
                            </div>
                            <div class="input-group">
                                <label>عملة المنتج</label>
                                @include('../components/currencies')
                            </div>
                            <div class="input-group">
                                <label>اسم التاجر</label>
                                <input type="text" name="merchant-name">
                            </div>
                            <div class="input-group">
                                <label>رابط شعار التاجر</label>
                                <input type="url" name="merchant-logo">
                            </div>
                            <div style="text-align:center;margin-top: 2%">
                                <input type="submit" name="add-ad" class="btn btn-success" value="اضافة المنتج">
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <h4 style="text-align: center;text-decoration:underline">المنتجات</h4>
                        <div class="row">
                            @foreach ($ads as $ad)
                                <div class="col-5">
                                    <div class="card">
                                        <img src="{{ $ad->image }}" class="card-img-top"
                                            style="width: 150px;margin: 0 auto;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $ad->title }}
                                            </h5>
                                            <form method="POST" action="{{ route('delete-ad'), $ad->id }}">
                                                <button type="submit" class="btn btn-primary">حذف
                                                    المنتج</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
