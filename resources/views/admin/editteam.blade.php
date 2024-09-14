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
    background-color: #000; 
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
                <h1>Add Team Page</h1>
                <form action="{{ route('editteam', $updateteam->id )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="display: flex; justify-content:space-evenly;">
                        <div>
                            <label for="">Name:</label> <input type="text" name="name" value="{{$updateteam->name}}">
                        </div>

                        <div>
                            <label for="">Position:</label> <input type="text" name="position"
                            value="{{$updateteam->position}}">
                        </div>

                        <div>
                            <label for="">Description:</label> <input type="text" name="description"
                            value="{{$updateteam->description}}">
                        </div>

                        <div>
                            <label for="">Current Image:</label> <img style="height: 100px; width:100px;" src="/teamimage/{{$updateteam->image}}" alt="">
                        </div>

                        <div>
                            <label for=""> Update Image:</label> <input type="file" name="image">
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
