<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            background-color: black;
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
            <div style="width:100%; text-align:center; ">
                <h1>Testimonial Page</h1>
                <div id="message"></div>
                <form action="{{ route('testimonialform') }}" method="POST" enctype="multipart/form-data" id="testimonialform">
                    @csrf
                    <div style="display: flex; justify-content:space-evenly;">
                        <div>
                            <label for="">Name:</label> <input type="text" name="name" placeholder="Name">
                        </div>

                        <div>
                            <label for="">Testimonial:</label> <input type="text" name="testimonial"
                                placeholder="Testimonial">
                        </div>

                        <div>
                            <label for="">Position:</label> <input type="text" name="position"
                                placeholder="Position">
                        </div>

                        <div>
                            <label for="">Image:</label> <input type="file" name="image">
                        </div>

                        <div>
                            <input type="submit" value="Save"
                                style="background-color:blue;  color:white; border-radius: 10px; border:none;">
                        </div>
                    </div>

                </form>
                <div style="margin-top: 20px;">
                    <table style="width: 100%; " id="testimonialtbl" class="display">
                        <thead>
                            <tr bgcolor=grey>
                                <th style="color: black;">SN</th>
                                <th style="color: black;">Name</th>
                                <th style="color: black;">Position</th>
                                <th style="color: black;">Testimonial</th>
                                <th style="color: black;">Image</th>
                                <th style="color: black;">Action</th>
                            </tr>
                        </thead>


                        {{-- @foreach ($testimonials as $testimonial)
                            <tbody>
                                <tr>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->position }}</td>
                                    <td style="width: 50%;">{{ $testimonial->comment }}</td>
                                    <td><img style="height: 100px; width:100px;"
                                            src="/testimonialprofile/{{ $testimonial->image }}" alt=""></td>
                                    <td>
                                        <a href="{{ route('deletecomment', $testimonial->id) }}"><button
                                                style="background-color: red; color:white; padding:5px; border-radius:4px;">Delete</button></a>
                                        <a href="{{ route('updatecomment', $testimonial->id) }}"><button
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
            //upload form
            $('#testimonialform').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('testimonialform') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(result) {
                        $('#message').css('display', 'block');
                        $('#message').html(result.message);
                        $('#testimonialform')[0].reset();
                        table.ajax.reload();
                    }
                });
            });


            //for datatable
            var table = $('#testimonialtbl').DataTable({
                ajax: "{{ route('testimonial.view') }}",
                "searching": true,
                "responsive": true,
                "destroy": true,
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
                        "data": "position"
                    },
                    {
                        "data": "comment",
                        "width": "50%"
                    },
                    {
                        "data": "image",
                        render: function(data, type, row) {
                            return '<img style="height: 100px; width:100px;" src="/testimonialprofile/' +
                                data +
                                '" alt="Testimonial Image">';
                        }
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            let url1 = "{{ route('deletecomment', ':id') }}".replace(':id', row.id);
                            let url2 = "{{ route('updatecomment', ':id') }}".replace(':id', row.id);
                            return `<a href='${url1}'><button>Delete</button></a> <a href='${url2}'><button>Update</button></a>`;
                        }
                    }
                    
                ]
            });
        });
    </script>
</body>

</html>
