<html>
<head>

</head>

<body>

    <div id="nav">
        <ul>
            <li><a href="/admin/home">Home</a></li>
            <li><a href="/admin/user">User</a></li>
            <li><a href="/admin/role">Role</a></li>
        </ul>
    </div>

    <div id="body">
        @yield('content')
    </div>


    <script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    @yield('javascript')
</body>

</html>
