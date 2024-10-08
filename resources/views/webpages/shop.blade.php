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
                        <h1>Shop</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">

                @foreach ($shops as $shop)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="">
                            <img src="/itemimage/{{ $shop->image }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $shop->name }}</h3>
                            <strong class="product-price">{{ $shop->price }}</strong>


                            <span class="icon-cross" id="cart-btn-{{$shop->id}}">
                                <img src="images/cross.svg" class="img-fluid">
                            </span>

                        </a>
                    </div>
                @endforeach




            </div>
        </div>
    </div>


    <!-- Start Footer Section -->
    @include('webpages.includes.footer')
    <!-- End Footer Section -->


    <!-- Script Footer Section -->
    @include('webpages.includes.script')
    <script>
        $(document).ready(function() {

        });
    </script>
</body>

</html>
