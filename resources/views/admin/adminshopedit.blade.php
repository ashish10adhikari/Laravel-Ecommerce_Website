<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.admincss')
    <style>
        html,
        body {
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
            /* Adjust this value to match the height of your navbar */
            bottom: 0;
            left: 0;
            background-color: #343a40;
            overflow-y: auto;
        }

        .content-wrapper {
            margin-left: 250px;
            /* Adjust this to match the width of your sidebar */
            padding: 20px;
            width: calc(100% - 250px);
            /* Adjust this to match the width of your sidebar */
            margin-top: 56px;
            /* Adjust this to the height of your navbar */
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 56px);
            /* Adjust this to the height of your navbar */
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

        <div class="content-wrapper" style="align-items:flex-start; padding-top:50px;">
            <div style="width:100%; text-align:center; ">
                <h1>Update Blog </h1>
                <form action="{{ route('updateitem',$item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="display: flex; justify-content:space-evenly;">
                        <div>
                            <label for="">Name:</label> <input type="text" name="name" value="{{$item->name}}">
                        </div>

                        <div>
                            <label for="">Price:</label> <input type="text" name="price"
                                value="{{$item->price}}">
                        </div>

                        <div>
                            <label for="">Current Image:</label> <img style="height: 100px; width:100px;" src="/itemimage/{{$item->image}}" alt="">
                        </div>

                        <div>
                            <label for=""> New Image:</label> <input type="file" name="image">
                        </div>

                        <div>
                            <input type="submit" value="Save"
                                style="background-color:blue;  color:white; border-radius: 10px;">
                        </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>

    @include('admin.adminscript')
</body>

</html>
