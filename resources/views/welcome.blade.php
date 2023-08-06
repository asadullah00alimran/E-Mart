@extends('main_layouts.app')

@section('slider')
<div id="header-carousel" class="carousel slide" data-ride="carousel">
    @if (Session::get('success_order'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Your order has been placed !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (Session::get('empty_cart'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Your cart is empty !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="carousel-inner">
        <div class="carousel-item active" style="height: 410px;">
            <img class="img-fluid" src="{{asset('slider_images/slider-3.jpg')}}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                    {{-- <a href="#" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                </div>
            </div>
        </div>
        <div class="carousel-item" style="height: 410px;">
            <img class="img-fluid" src="{{asset('slider_images/slider-4.jpg')}}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                    {{-- <a href="#" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                </div>
            </div>
        </div>
        <div class="carousel-item" style="height: 410px;">
            <img class="img-fluid" src="{{asset('slider_images/slider-5.jpg')}}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                    {{-- <a href="#" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                </div>
            </div>
        </div>
        <div class="carousel-item" style="height: 410px;">
            <img class="img-fluid" src="{{asset('slider_images/slider-6.jpg')}}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                    {{-- <a href="#" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
@endsection
@section('nav')
<nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
@endsection
@section('content')


<!-- New Arrival Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">New Arrival</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @php
        $products = DB::table('products')->where('product_status','Enable')->where('product_delete',1)->orderBy('id','DESC')->limit(4)->get();
        @endphp
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{asset($product->product_image)}}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $product->product_name }}</h6>
                    <div class="d-flex justify-content-center">
                        @if ($product->product_discount>0)
                        <h6 class="text-primary">{{ $product->product_discount_price }} BDT </h6><h6 class="text-muted ml-2"><del>{{ $product->product_price }} BDT</del></h6>
                        @else
                        <h6 class="text-primary">{{ $product->product_price }} BDT</h6>
                        @endif
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('product_details',$product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a href="{{ route('add_to_cart',$product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- New Arrival Products End -->



<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                <!--<img src="public/slider_images/slider-6.jpg" alt="">-->
                <!--img/offer-1.png-->
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                    <a href="#" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                <img src="img/offer-2.png" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                    <a href="#" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->



<!-- Trendy Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @php
            $products = DB::table('products')->where('product_status','Enable')->where('product_delete',1)->inRandomOrder()->limit(4)->get();
        @endphp
        @foreach ($products as $product)


        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{asset($product->product_image)}}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $product->product_name }}</h6>
                    <div class="d-flex justify-content-center">
                        @if ($product->product_discount>0)
                        <h6 class="text-primary">{{ $product->product_discount_price }} BDT </h6><h6 class="text-muted ml-2"><del>{{ $product->product_price }} BDT</del></h6>
                        @else
                        <h6 class="text-primary">{{ $product->product_price }} BDT</h6>
                        @endif

                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('product_details',$product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a href="{{ route('add_to_cart',$product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
<!-- Trendy Products End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        @php
            $categories = DB::table('categories')->where('category_status','Enable')->where('category_delete',1)->get();
        @endphp
        @foreach ($categories as $category)
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column text-center">
                @php
                    $products = DB::table('products')->where('product_status','Enable')->where('product_delete',1)->where('category_id',$category->id)->get();
                @endphp
                
                <div class="flip-box">
                    <div class="flip-box-inner">
                        <div class="flip-box-front">
                            <a href="{{ route('category_product',$category->id) }}" class="cat-img position-relative overflow-hidden mb-3 text-decoration-none">
                                <h3 class="font-weight-semi-bold mt-5">{{ $category->category_name }}</h5>
                            </a>
                        </div>
                        <div class="flip-box-back">
                          <h3 class="text-center mt-5">{{$products->count()}} Products</h2>
                        </div>
                  </div>
                </div>
                
                <!--<p class="text-right">{{$products->count()}} Products</p>-->
                <!--<a href="{{ route('category_product',$category->id) }}" class="cat-img position-relative overflow-hidden mb-3 text-decoration-none">-->
                <!--    <h5 class="font-weight-semi-bold m-0">{{ $category->category_name }}</h5>-->
                <!--</a>-->

            </div>
        </div>
        @endforeach

    </div>
</div>
<!-- Categories End -->



<!-- Womens Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Womens Collections</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @php
        $products = DB::table('products')->where('product_status','Enable')->where('category_id',2)->orderBy('id','DESC')->limit(4)->get();
        @endphp
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{asset($product->product_image)}}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $product->product_name }}</h6>
                    <div class="d-flex justify-content-center">
                        @if ($product->product_discount>0)
                        <h6 class="text-primary">{{ $product->product_discount_price }} BDT </h6><h6 class="text-muted ml-2"><del>{{ $product->product_price }} BDT</del></h6>
                        @else
                        <h6 class="text-primary">{{ $product->product_price }} BDT</h6>
                        @endif
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('product_details',$product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a href="{{ route('add_to_cart',$product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Womens Products End -->



<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">No Compromise in Quality</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Minimal Shipping Cost</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">30-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Live Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Baby Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Baby Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @php
        $products = DB::table('products')->where('product_status','Enable')->where('category_id',3)->orderBy('id','DESC')->limit(4)->get();
        @endphp
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{asset($product->product_image)}}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $product->product_name }}</h6>
                    <div class="d-flex justify-content-center">
                        @if ($product->product_discount>0)
                        <h6 class="text-primary">{{ $product->product_discount_price }} BDT </h6><h6 class="text-muted ml-2"><del>{{ $product->product_price }} BDT</del></h6>
                        @else
                        <h6 class="text-primary">{{ $product->product_price }} BDT</h6>
                        @endif
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('product_details',$product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a href="{{ route('add_to_cart',$product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Baby Products End -->



<!-- Subscribe Start -->
<div class="container-fluid bg-secondary my-5">
    <div class="row justify-content-md-center px-xl-5">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center mb-2 pb-2">
                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
            </div>
            <form action="#">
                <div class="input-group">
                    <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                    <div class="input-group-append">
                        <button class="btn btn-primary px-4">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Subscribe End -->



<!-- blog area Start -->
<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__title-wrapper text-center mb-55">
                    <div class="section__title mb-10">
                        <h2 class="section-title px-5"><span class="px-2">Our Blog Posts</span></h2>
                        <h2 class=""></h2>
                    </div>
                    <div class="section__sub-title">
                        <p>Mirum est notare quam littera gothica quam nunc putamus parum claram!</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <!--<h3 class="mb-3">Carousel cards title </h3>-->
            </div>
                    <div class="col-6 text-right">
            <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('blog_posts\blog-1.jpg')}}">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('blog_posts\blog-2.jpg')}}">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('blog_posts\blog-3.jpg')}}">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('blog_posts/blog-4.png')}}">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('blog_posts/blog-5.jpg')}}">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('blog_posts/blog-6.jpg')}}">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- <div class="carousel-item">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog area end -->


<!-- Vendor Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="vendor-item border p-4">
                    <img src="{{asset('logos/vendor_logo/aarong-logo.png')}}" class="w-50">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('logos/vendor_logo/easy.png')}}" class="w-75">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('logos/vendor_logo/Richman.png')}}" class="w-100">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('logos/vendor_logo/logo-png_kazi-1.png')}}" class="w-100">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('logos/vendor_logo/Oxygen-01.jpg')}}" class="w-100">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('logos/vendor_logo/unnamed-1.png')}}" class="w-100">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('logos/vendor_logo/aarong-logo.png')}}" class="w-50">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('logos/vendor_logo/easy.png')}}" class="w-75">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('logos/vendor_logo/Richman.png')}}" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->
@endsection
