<html>

<head>
    <mata charset="utf-8">
        <title>ระบบบริหารงานวิจัยคณะเทคโนโลยีสารสนเทศและการสื่อสาร</title>

        <!-- CSS Admin Theme -->
        <link href="/admin_theme/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- MetisMenu CSS -->
        <link href="/admin_theme/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"/>
        <!-- Timeline CSS -->
        <link href="/admin_theme/dist/css/timeline.css" rel="stylesheet"/>
        <!-- Morris Charts CSS -->
        <link href="/admin_theme/bower_components/morrisjs/morris.css" rel="stylesheet"/>
        <!-- Custom Fonts -->
        <link href="/admin_theme/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- DataTables CSS -->
        <link href="/admin_theme/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"/>
        <!-- DataTables Responsive CSS -->
        <link href="/admin_theme/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet"/>
        <!-- Custom CSS -->
        <link href="/admin_theme/dist/css/sb-admin-2.css" rel="stylesheet"/>
       
    </mata>
</head>

<body>

<div class="masthead">
    <h3 class="text-muted">ระบบบริหารงานวิจัยคณะเทคโนโลยีสารสนเทศและการสื่อสาร</h3>
</div>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">ICTRM V 1.0</a> -->
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="http://localhost/laravelProject/ictrmdev/login/logout"><i
                                    class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav in" id="side-menu">
                    <li><a href="/admin/home">หน้าผู้ดูแลระบบ</a></li>
                    <li><a href="#">หน้าเว็บไซต์</a></li>
                    <li>
                        <a href="" class="">ข้อมูลระบบ<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="/admin/faculty">ข้อมูลคณะ</a>
                            </li>
                            <li><a href="/admin/major">ข้อมูลสาขาวิชา</a>
                            </li>
                            <li><a href="/admin/budget">ปีงบประมาณ</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-newspaper-o"></i>ข้อมูลข่าว</a></li>
                    <li><a href="#"><i class="fa fa-users"></i></i>ข้อมูลนักวิจัย</a></li>
                    <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>ข้อมูลงานวิจัย<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#">โครงการ</a>
                            </li>
                            <li>
                                <a href="#">ประชุมวิชาการ</a>
                            </li>
                            <li>
                                <a href="#">วารสาร</a>
                            </li>
                            <li>
                                <a href="#">ตีพิมพ์</a>
                            </li>
                            <li>
                                <a href="#">รางวัล</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper" style="min-height: 383px;">
        <div class="row">

            @yield('content')

        </div>
    </div>
    <!-- /#page-wrapper -->
</div>

<!-- JavaScript Admin Theme -->
<!-- jQuery -->
<script src="/admin_theme/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/admin_theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/admin_theme/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/admin_theme/bower_components/raphael/raphael-min.js"></script>
<script src="/admin_theme/bower_components/morrisjs/morris.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/admin_theme/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/admin_theme/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="/admin_theme/dist/js/sb-admin-2.js"></script>


<script type="text/javascript" src="/angular/angular/angular.min.js"></script>
<script type="text/javascript" src="/angular/angular-ui-router/release/angular-ui-router.min.js"></script>

<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

@yield('javascript')
</body>

</html>
