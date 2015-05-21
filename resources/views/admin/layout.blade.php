<html>

<head>
    <mata charset="utf-8">
        <title>ระบบบริหารงานวิจัยคณะเทคโนโลยีสารสนเทศและการสื่อสาร</title>

        <!-- <link href="/bower_components/bootstrap/dist/css/justified-nav.css" rel="stylesheet"/>
         <!-- CSS Admin Theme -->
        <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- MetisMenu CSS -->
        <link href="/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"/>
        <!-- Timeline CSS -->
        <link href="/bower_components/sb-admin-v2/css/plugins/timeline/timeline.css" rel="stylesheet"/>
        <!-- Morris Charts CSS -->
        <link href="/bower_components/metisMenu/dist/metisMenu.css" rel="stylesheet"/>
        <!-- Custom Fonts -->
        <link href="/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- DataTables CSS -->
        <link href="/bower_components/datatables-bootstrap3/BS3/assets/css/datatables.css" rel="stylesheet"/>
        <!-- DataTables Responsive CSS -->
        <link href="/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet"/>
        <!-- Custom CSS -->
        <link href="/bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet"/>

        <link rel="stylesheet" href="/bower_components/semantic-ui/dist/semantic.min.css"/>
        <link rel="stylesheet" href="/bower_components/semantic-ui/dist/components/dropdown.min.css"/>

        <script src="/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="/bower_components/semantic-ui/dist/semantic.min.js" type="text/javascript"></script>
        <script src="/bower_components/semantic-ui/dist/components/dropdown.min.js" type="text/javascript"></script>

    </mata>
</head>

<body>

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
            <a class="navbar-brand" href="#">ระบบบริหารงานวิจัยคณะเทคโนโลยีสารสนเทศและการสื่อสาร</a></br>
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
                    <li><a href="#"><i
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
                    <li><a href="/admin/news"><i class="fa fa-newspaper-o"></i>ข้อมูลข่าว</a></li>
                    <li><a href="/admin/user"><i class="fa fa-users"></i></i>ข้อมูลนักวิจัย</a></li>
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

    <div id="page-wrapper" style="min-height: 400px;">
        <div class="row">

            @yield('content')

        </div>
    </div>
    <!-- /#page-wrapper -->
</div>

<footer class="well" style="margin-top: 20px;" align="center">
    &copy; 2015 ระบบบริหารงานวิจัยคณะเทคโนโลยีสารสนเทศและการสื่อสาร <a href="{{ url('admin') }}">Backend</a>
</footer>
<!-- JavaScript Admin Theme -->
<!-- jQuery -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript-->
<script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="/bower_components/sb-admin-v2/js/sb-admin.js"></script>

<script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
<script type="text/javascript" src="/bower_components/angular-datatables/dist/angular-datatables.min.js"></script>
<script type="text/javascript" src="/bower_components/angular-datatables/dist/plugins/bootstrap/angular-datatables.bootstrap.min.js"></script>

@yield('javascript')

</body>

</html>
