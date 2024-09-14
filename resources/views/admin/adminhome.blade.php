<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        .navbar {
            width: 100%;
            z-index: 1000;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar-offcanvas {
            width: 250px;
            position: fixed;
            top: 56px; 
            bottom: 0;
            left: 0;
            background-color: #343a40;
            overflow-y: auto;
        }

        .content-wrapper {
            margin-left: 250px; 
            padding: 20px;
            width: calc(100% - 250px); 
            margin-top: 56px; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 56px); 
        }

        .d-flex {
            display: flex;
            height: 100%;
        }

        .nav-link {
            color: white;
        }
    </style>
</head>

<body>
    @include('admin.topnav')

    <div class="d-flex">
        @include('admin.sidenav')

        <div class="content-wrapper">
            <h1>Welcome To Admin page</h1>
        </div>
    </div>

    @include('admin.adminscript')
</body>

</html>
