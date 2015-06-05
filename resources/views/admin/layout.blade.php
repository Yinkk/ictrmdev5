<html>

<head>
    <mata charset="utf-8">
        <title>ระบบบริหารงานวิจัยคณะเทคโนโลยีสารสนเทศและการสื่อสาร</title>

        <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="/bower_components/semantic-ui/dist/semantic.min.css"/>
        <link rel="stylesheet" href="/bower_components/semantic-ui/dist/components/dropdown.min.css"/>

        <style>
            .avatar-menu {
                height: 2em !important;
                width: 2em !important;
                margin-top: -0.5em;
                margin-bottom: -0.5em;
            }
        </style>

    </mata>
</head>

<body>
<div class="ui" style="background-color: #4c1d6e">
    <h2 class="ui header inverted" style="padding: 10px;">
        <div class="content">
            ICTRM
            <div class="sub header">ระบบบริหารงานวิจัยคณะเทคโนโลยีสารสนเทศและการสื่อสาร</div>
        </div>
    </h2>
</div>

<div class="ui">
    <div class="row">
        <div class="ui large menu " id="MainMenu">
            <div class="left purple inverted menu">
                <a class="item active">
                    Main Menu
                </a>
                <a class="item">
                    About Us
                </a>
            </div>

            <div class="right menu">
                <div class="item ui dropdown" ng-controller="UserCtrl">
                    <div>User</div>
                    <div class="menu">
                        <a class="item">Change Profile</a>
                        <a class="item" ng-click="logout()">Logout</a>
                    </div>
                </div>

                <div class="item">
                    Support
                </div>
                <a class="item">
                    FAQ
                </a>
                <a class="item">
                    E-mail Support
                </a>
            </div>
        </div>
    </div>
</div>

<div class="ui padded stackable grid">
    <div class="ui row">
        <div class="ui three wide column">
            <div class="ui fluid vertical menu">

                <div class="header item">
                    Administrator
                </div>
                <a class=" <% Request::is('admin/home') ? 'active' : '' %> item" href="/admin/home">
                    <i class="home icon"></i>
                    Dashboard
                </a>
                <div class="header item">
                    จัดการผู้ใช้งานระบบ
                </div>
                <a class=" <% Request::is('admin/role') ? 'active' : '' %> item" href="/admin/role">
                    สิทธ์การเข้าใช้งาน
                </a>

                <div class="header item">
                    จัดการข้อมูลระบบ
                </div>
                <a class=" <% Request::is('admin/faculty') ? 'active' : '' %> item" href="/admin/faculty">
                    ข้อมูลคณะ
                </a>
                <a class=" <% Request::is('admin/major') ? 'active' : '' %> item" href="/admin/major">
                    ข้อมูลสาขาวิชา
                </a>
                <a class=" <% Request::is('admin/budget') ? 'active' : '' %> item" href="/admin/budget">
                    ข้อมูลปีงบประมาณ
                </a>
                <a class=" <% Request::is('admin/news') ? 'active' : '' %> item" href="/admin/news">
                    ข้อมูลข่าวประชาสัมพันธ์
                </a>

                <div class="header item">
                    จัดการข้อมูลนักวิจัย
                </div>
                <a class=" <% Request::is('admin/user') ? 'active' : '' %> item" href="/admin/user">
                    ข้อมูลนักวิจัย
                </a>

                <div class="header item">
                    จัดการงานวิจัย
                </div>
                <a class=" <% Request::is('admin/project') ? 'active' : '' %> item" href="/admin/project">
                    โครงการ
                </a>
                <a class=" <% Request::is('#') ? 'active' : '' %> item" href="#">
                    ประชุมวิชาการ
                </a>
                <a class=" <% Request::is('#') ? 'active' : '' %> item" href="#">
                    รางวัล
                </a>
            </div>
        </div>

        <div class="ui thirteen wide column">
            @yield('content')
        </div>

    </div>
</div>



<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/ckeditor/ckeditor.js"></script>

<script src="/bower_components/semantic-ui/dist/semantic.min.js" type="text/javascript"></script>
<script src="/bower_components/semantic-ui/dist/components/dropdown.min.js" type="text/javascript"></script>
<script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
<script src="/bower_components/ng-ckeditor/ng-ckeditor.js"></script>
<script type="text/javascript" src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
<script type="text/javascript" src="/bower_components/angular-datatables/dist/angular-datatables.min.js"></script>
<script type="text/javascript" src="/bower_components/angular-datatables/dist/plugins/bootstrap/angular-datatables.bootstrap.min.js"></script>

<script type="text/javascript">
    $('.ui.dropdown').dropdown();
</script>

@yield('javascript')




</body>

</html>
