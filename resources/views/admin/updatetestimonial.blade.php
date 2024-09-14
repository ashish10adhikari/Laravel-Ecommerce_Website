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
                <h1>Testimonial Page</h1>
                <form action="{{ route('updatecmtform', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="{{ $testimonial->name }}">
                        </div>
                        
                        <div>
                            <label for="testimonial">Testimonial:</label>
                            <input type="text" id="testimonial" name="testimonial" value="{{ $testimonial->comment }}">
                        </div>
                
                        <div>
                            <label for="position">Position:</label>
                            <input type="text" id="position" name="position" value="{{ $testimonial->position }}">
                        </div>
                
                        <div>
                            <label for="current_image">Current Image:</label>
                            <img id="current_image" style="width:100px; height:100px;" src="/testimonialprofile/{{ $testimonial->image }}" alt="Current Image">
                        </div>
                
                        <div>
                            <label for="image">New Image (optional):</label>
                            <input type="file" id="image" name="image">
                        </div>
                
                        <div>
                            <input type="submit" value="Save" style="background-color:blue; color:white; border-radius: 10px;">
                        </div>
                    </div>
                </form>
                
               
            </div>
        </div>
    </div>

    @include('admin.adminscript')
</body>

</html>
