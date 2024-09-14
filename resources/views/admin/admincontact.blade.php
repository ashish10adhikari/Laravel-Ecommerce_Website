<!DOCTYPE html>
<html lang="en">

<head>
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

            <div style="width:90%; text-align:center; ">
                <h1>Contact Page</h1>
                <table style="width: 100%;" id="mytable">
                    <thead>
                        <tr bgcolor=grey>
                        <th style="color: black;">First Name</th>
                        <th style="color: black;">Last Name</th>
                        <th style="color: black;">Email</th>
                        <th style="color: black;">Message</th>
                        <th style="color: black;">Action</th>
                    </tr>
                    </thead>
                    

                    @foreach ($contacts as $contact)
                    <tbody>
                        <tr>
                            <td>{{ $contact->fname }}</td>
                            <td>{{ $contact->lname }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>

                            <td>

                                <a href="{{ route('deletecontact', $contact->id) }}"><button class="btn"
                                        style="background-color: red;">Delete</button></a>


                            </td>
                        </tr>
                    </tbody>
                        
                    @endforeach

                </table>
            </div>





        </div>
    </div>

    @include('admin.adminscript')
</body>

</html>
