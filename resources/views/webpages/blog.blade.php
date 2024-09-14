<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    @include('webpages.includes.css')
    <title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('webpages.includes.navbar')
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Blog</h1>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                            vulputate velit imperdiet dolor tempor tristique.</p>
                        <p><a href="{{ url('/shop') }}" class="btn btn-secondary me-2">Shop Now</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="images/couch.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container">

            <div class="row">

                @foreach ($blogs as $blog)
                    <div class="col-12 col-sm-6 col-md-4 mb-5">
                        <div class="post-entry">
                            <a href="#" class="post-thumbnail"><img src="/blogimage/{{ $blog->image }}"
                                    alt="Image" class="img-fluid"></a>
                            <div class="post-content-entry">
                                <h3><a href="#">{{ $blog->title }}</a></h3>
                                <div class="meta">
                                    <span>by <a href="#">{{ $blog->name }}</a></span> <span>on <a
                                            href="#">{{ $blog->created_at->format('M j, Y') }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
    <!-- End Blog Section -->







    <!-- Start Footer Section -->
    @include('webpages.includes.footer')
    <!-- End Footer Section -->


    <!-- Script Footer Section -->
    @include('webpages.includes.script')
</body>

</html>
