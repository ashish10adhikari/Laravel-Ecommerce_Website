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
                <form action="{{ route('addteam') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="display: flex; justify-content:space-evenly;">
                        <div>
                            <label for="">Name:</label> <input type="text" name="name" placeholder="Name">
                        </div>

                        <div>
                            <label for="">Position:</label> <input type="text" name="position"
                                placeholder="position">
                        </div>

                        <div>
                            <label for="">Description:</label> <input type="text" name="description"
                                placeholder="description">
                        </div>

                        <div>
                            <label for="">Image:</label> <input type="file" name="image">
                        </div>

                        <div>
                            <input type="submit" value="Save"
                                style="background-color:blue;  color:white; border-radius: 10px;">
                        </div>
                    </div>

                </form>
                <div style="margin-top: 20px;">
                    <table style="width: 100%;" id="mytable">
                        <thead>
                            <tr bgcolor=grey>
                                <th style="color: black;">Name</th>
                                <th style="color: black;">Position</th>
                                <th style="color: black;">Description at</th>
                                <th style="color: black;">Image</th>
                                <th style="color: black;">Action</th>
                            </tr>
                        </thead>

                        @foreach ($addteams as $addteam)
                        <tbody>
                            <tr>
                                <td>{{ $addteam->name }}</td>
                                <td>{{ $addteam->position }}</td>
                                <td >{{ $addteam->description}}</td>
                                <td><img style="height: 100px; width:100px;"
                                        src="/teamimage/{{ $addteam->image }}" alt=""></td>
                                <td>
                                    <a href="{{ route('deleteteam', $addteam->id) }}"><button
                                            style="background-color: red; color:white; padding:5px; border-radius:4px;">Delete</button></a>
                                    <a href="{{ route('updateteam', $addteam->id) }}"><button
                                        style="background-color: blue; color:white; padding:5px; border-radius:4px;">Update</button></a>
                                </td>


                            </tr>
                        </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin.adminscript')
</body>

</html>
