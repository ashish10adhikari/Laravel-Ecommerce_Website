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

        <div class="content-wrapper" style="align-items:flex-start; padding-top:50px;">

            <div style="width:90%;">
                <h1>Users Page</h1>
                <table id="userstbl">
                    <thead>
                        <tr bgcolor=grey>
                            <th style="color: black;">S.N</th>
                            <th style="color: black;">Name</th>
                            <th style="color: black;">Email</th>
                            <th style="color: black;">Action</th>
                        </tr>
                    </thead>


                    {{-- @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                    @if ($user->usertype == 'admin')
                                        Admin
                                    @else
                                        <a href="{{ route('deleteusers', $user->id) }}"><button class="btn"
                                                style="background-color: red;">Delete</button></a>
                                    @endif

                                </td>
                            </tr>
                        </tbody>
                    @endforeach --}}

                </table>
            </div>





        </div>
    </div>

    @include('admin.adminscript')
    <script>
        $(document).ready(function() {
            var table = $('#userstbl').DataTable({
                ajax: "{{ route('adminusers.view') }}",
                "searching": true,
                "responsive": true,
                "destroy": true,
                "order": [
                    [3, 'desc']
                ],
                "ordering": true,
                "paging": true,
                columns: [{
                        "data": null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            if (row.usertype === 'admin') {
                                return'Admin';
                            } else {
                                let url = "{{ route('deleteusers', ':id') }}".replace(':id', row
                                    .id);
                                return `<a href='${url}'><button>Delete</button></a>`;
                            }

                        }
                    },
                ]
            });
        });
    </script>
</body>

</html>
