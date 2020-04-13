<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Blog</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{route('primary')}}"> <h1>My Blog</h1> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
              <li class="nav-item active"><a class="nav-link" href="{{route('primary')}}">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('pages.archive')}}">Archive</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('pages.contact')}}">Contact</a></li>
              @if (Route::has('login'))

              @auth
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
              </li>
              @else
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>

                  @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>
                  @endif
              @endauth

      @endif

            </ul>
            <ul class="nav navbar-nav navbar-right navbar-social">
              <li><a href="#"><i class="ti-facebook"></i></a></li>
              <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
              <li><a href="#"><i class="ti-instagram"></i></a></li>
              <li><a href="#"><i class="ti-skype"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================ Hero sm Banner start =================-->
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>Blog details</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb" style="font-weight: 700;-webkit-text-stroke: snow;">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm Banner end =================-->




  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <div class="main_blog_details">
                <img class="img-fluid" src="{{asset('storage/'.$post->image)}}" alt="img">
                <a href="#"><h4>{{$post->title}}</h4></a>
                <div class="user_details">
                  <div class="float-left">
                      @foreach ($tags as $tag)
                          @if ($post->hasTags($tag->id))

                          <a href="#">{{$tag->name}}</a>
                          @endif
                      @endforeach

                  </div>
                  <div class="float-right mt-sm-0 mt-3">
                    <div class="media">
                      <div class="media-body">
                        <h5>{{$post->user->name}}</h5>
                        <p>{{$post->created_at}}</p>
                      </div>
                      <div class="d-flex">
                        <img width="42" height="42" src="{{$user->profile->picture !=null ? asset('storage/'.$user->getPicture()):$user->getGravatar()}}" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                {!! $post->content !!}
               <div class="news_d_footer flex-column flex-sm-row">
                 <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>Lily and 4 people like this</a>
                 <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>06 Comments</a>
                 <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
               <a href="#"><i class="fab fa-facebook-f"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-dribbble"></i></a>
               <a href="#"><i class="fab fa-behance"></i></a>
             </div>
               </div>
              </div>


          <div class="navigation-area">
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                          <div class="thumb">
                              <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                          </div>
                          <div class="arrow">
                              <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                          </div>
                          <div class="detials">
                              <p>Prev Post</p>
                              <a href="#"><h4>A Discount Toner</h4></a>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                          <div class="detials">
                              <p>Next Post</p>
                              <a href="#"><h4>Cartridge Is Better</h4></a>
                          </div>
                          <div class="arrow">
                              <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                          </div>
                          <div class="thumb">
                              <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="comments-area">
                    <h4>05 Comments</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c1.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2020 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c2.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Elsie Cunningham</a></h5>
                                    <p class="date">December 4, 2020 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c3.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Annie Stephens</a></h5>
                                    <p class="date">December 4, 2020 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c4.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Maria Luna</a></h5>
                                    <p class="date">December 4, 2020 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c5.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Ina Hayes</a></h5>
                                    <p class="date">December 4, 2020 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form>
                        <div class="form-group form-inline">
                          <div class="form-group col-lg-6 col-md-6 name">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 email">
                            <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        </div>
                        <a href="#" class="button submit_btn">Post Comment</a>
                    </form>
                </div>
        </div>

       <!-- Start Blog Post Siddebar -->
       <div class="col-lg-4 sidebar-widgets">
        <div class="widget-wrap">
          <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <div class="form-group mt-30">
              <div class="col-autos">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Enter email'">
              </div>
            </div>
            <button class="bbtns d-block mt-20 w-100">Subcribe</button>
          </div>


          <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Catgory</h4>
            <ul class="cat-list mt-20">
                @foreach ($categories as $category)
                <li>
                  <a href="#" class="d-flex justify-content-between">
                    <p>{{$category->name}}</p>
                    <p>({{$category->posts->count()}})</p>
                  </a>
                </li>
                @endforeach
            </ul>
          </div>

          <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Latest Post</h4>
            <div class="popular-post-list">
                @foreach($latest as $item)

                <div class="single-post-list">
                  <div class="thumb">
                    <img class="card-img rounded-0" src="{{asset('storage/'.$item->image)}}" alt="">
                    <ul class="thumb-info">
                      <li><a href="#">{{$item->user->name}}</a></li>
                      <li><a href="#">{{$item->created_at->format('Y.m.d')}}</a></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="{{route('posts.show',$item->id)}}">
                      <h6>{{$item->title}}</h6>
                    </a>
                  </div>
                </div>
                @endforeach
            </div>
          </div>

            <div class="single-sidebar-widget tag_cloud_widget">
              <h4 class="single-sidebar-widget__title">Tags</h4>
              <ul class="list">
                  @foreach ($tags as $tag)

                  <li>
                      <a href="#">{{$tag->name}}</a>
                  </li>
                  @endforeach

              </ul>
            </div>
          </div>
        </div>
      </div>
    <!-- End Blog Post Siddebar -->
  </div>
</section>
<!--================ End Blog Post Area =================-->
</main>

<!--================ Start Footer Area =================-->
<footer class="footer-area section-padding">
<div class="container">
<div class="row">
  <div class="col-lg-3  col-md-6 col-sm-6">
    <div class="single-footer-widget">
      <h6>About Us</h6>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
        magna aliqua.
      </p>
    </div>
  </div>
  <div class="col-lg-4  col-md-6 col-sm-6">
    <div class="single-footer-widget">
      <h6>Newsletter</h6>
      <p>Stay update with our latest</p>
      <div class="" id="mc_embed_signup">

        <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
          method="get" class="form-inline">

          <div class="d-flex flex-row">

            <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
              required="" type="email">


            <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
            <div style="position: absolute; left: -5000px;">
              <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
            </div>

            <!-- <div class="col-lg-4 col-md-4">
                  <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                </div>  -->
          </div>
          <div class="info"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-3  col-md-6 col-sm-6">
    <div class="single-footer-widget mail-chimp">
      <h6 class="mb-20">Instragram Feed</h6>
      <ul class="instafeed d-flex flex-wrap">
        <li><img src="{{asset('img/instagram/i1.jpg')}}" alt=""></li>
        <li><img src="{{asset('img/instagram/i2.jpg')}}" alt=""></li>
        <li><img src="{{asset('img/instagram/i3.jpg')}}" alt=""></li>
        <li><img src="{{asset('img/instagram/i4.jpg')}}" alt=""></li>
        <li><img src="{{asset('img/instagram/i5.jpg')}}" alt=""></li>
        <li><img src="{{asset('img/instagram/i6.jpg')}}" alt=""></li>
        <li><img src="{{asset('img/instagram/i7.jpg')}}" alt=""></li>
        <li><img src="{{asset('img/instagram/i8.jpg')}}" alt=""></li>
      </ul>
    </div>
  </div>
  <div class="col-lg-2 col-md-6 col-sm-6">
    <div class="single-footer-widget">
      <h6>Follow Us</h6>
      <p>Let us be social</p>
      <div class="footer-social d-flex align-items-center">
        <a href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#">
          <i class="fab fa-dribbble"></i>
        </a>
        <a href="#">
          <i class="fab fa-behance"></i>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
  <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
</div>
</div>
</footer>
<!--================ End Footer Area =================-->

<script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
