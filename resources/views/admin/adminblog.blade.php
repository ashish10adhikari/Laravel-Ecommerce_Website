<!DOCTYPE html>
<html lang="en">

<head>
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
                <h1>Add Blog Page</h1>
                <div id="message"></div>
                <form action="{{ route('addblog') }}" method="POST" enctype="multipart/form-data" id="blogform">
                    @csrf
                    <div style="display: flex; justify-content:space-evenly;">
                        <div>
                            <label for="">Name:</label> <input type="text" name="name" placeholder="Name">
                        </div>

                        <div>
                            <label for="">Title:</label> <input type="text" name="title"
                                placeholder="Title">
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
                    <table style="width: 100%;" id="blogtbl">
                        <thead>
                            <tr bgcolor=grey>
                                <th style="color: black;">S.N</th>
                                <th style="color: black;">Name</th>
                                <th style="color: black;">Title</th>
                                <th style="color: black;">Created at</th>
                                <th style="color: black;">Image</th>
                                <th style="color: black;">Action</th>
                            </tr>

                        </thead>

                        {{-- @foreach ($adminblogs as $adminblog)
                            <tbody>
                                <tr>
                                    <td>{{ $adminblog->name }}</td>
                                    <td>{{ $adminblog->title }}</td>
                                    <td>{{ $adminblog->created_at->format('M j, Y') }}</td>
                                    <td><img style="height: 100px; width:100px;"
                                            src="/blogimage/{{ $adminblog->image }}" alt=""></td>
                                    <td>
                                        <a href="{{ route('deleteblog', $adminblog->id) }}"><button
                                                style="background-color: red; color:white; padding:5px; border-radius:4px;">Delete</button></a>
                                        <a href="{{ route('updateblog', $adminblog->id) }}"><button
                                                style="background-color: blue; color:white; padding:5px; border-radius:4px;">Update</button></a>
                                    </td>


                                </tr>
                            </tbody>
                        @endforeach --}}

                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin.adminscript')
    <script>
        $(document).ready(function() {
            //for form
            $('#blogform').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('addblog') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(result) {
                        $('#message').css('display', 'block');
                        $('#message').html(result.message);
                        $('#blogform')[0].reset();
                        table.ajax.reload();
                    }
                });
            });

            //for datatable
            var table = $('#blogtbl').DataTable({
                ajax: "{{ route('adminblog.view') }}",
                "searching": true,
                "responsive": true,
                "destroy": true,
                // "order": [
                //     [3, 'desc']
                // ],
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
                        "data": "title"
                    },
                    {
                        "data": "created_at",
                        "render": function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                // Format the date using JavaScript Date object
                                var date = new Date(data);
                                var formattedDate = date.toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: 'numeric'
                                });
                                return formattedDate;
                            }
                            return data;
                        }
                    },
                    {
                        "data": "image",
                        render: function(data, type, row) {
                            return '<img style="height: 100px; width:100px;" src="/blogimage/' +
                                data +
                                '" alt="Blog Image">';
                        }
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            let url1 = "{{ route('deleteblog', ':id') }}".replace(':id', row.id);
                            let url2 = "{{ route('updateblog', ':id') }}".replace(':id', row.id);
                            return `<a href='${url1}'><button>Delete</button></a>
                            <a href='${url2}'><button>Update</button></a>`;
                        }
                    }

                ]
            });
        });
    </script>
</body>

</html>
