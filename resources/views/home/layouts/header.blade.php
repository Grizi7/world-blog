<div class="header_section">
   <div class="header_main">
      <div class="mobile_menu">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.html">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="services.html">Services</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="blog.html">Blog</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="contact.html">Contact</a>
                  </li>
                  @if (Route::has('login'))
                     @auth
                     <li class="nav-link" >
                        <div class="dropdown">
                           <a class="dropdown-toggle" style="color:white!important" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ Auth::user()->name }}
                           </a>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                              <li class="dropdown-item"><a href="{{route('profile.edit')}}">Profile</a></li>
                              {{-- <li class="dropdown-item"><a href="">Profile</a></li> --}}
                              <form method="POST" action="{{ route('logout') }}">
                                 @csrf

                                 <li class="dropdown-item"><a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"">Logout</a></li>
                              
                              </form>
                           </ul>
                        </div>
                     </li>
                     @else
                        <li class="nav-item">
                           <a class="nav-link " href="{{route('login')}}">Login</a>
                        </li>
                     @endauth
                  @endif
               </ul>
            </div>
         </nav>
      </div>
      <div class="container-fluid">
         <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
         <div class="menu_main">
            <ul>
               <li class="active"><a href="index.html">Home</a></li>
               <li><a href="about.html">About</a></li>
               <li><a href="services.html">Services</a></li>
               <li><a href="blog.html">Blog</a></li>
               <li><a href="contact.html">Contact us</a></li>
               @if (Route::has('login'))
                  @auth
                     <li>
                        <div class="dropdown">
                           <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ Auth::user()->name }}
                           </a>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li class="dropdown-item"><a href="{{route('profile.edit')}}">Profile</a></li>
                              {{-- <li class="dropdown-item"><a href="">Profile</a></li> --}}
                              <form method="POST" action="{{ route('logout') }}">
                                 @csrf

                                 <li class="dropdown-item"><a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"">Logout</a></li>
                              
                              </form>
                           </ul>
                        </div>
                     </li>
                     
                  @else
                     <li><a href="{{route('login')}}">Login</a></li>
                  @endauth
               @endif
            </ul>
         </div>
      </div>
   </div>
   <!-- banner section start -->
   <div class="banner_section layout_padding">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <h1 class="banner_taital">Adventure</h1>
                  <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority have sufferedThere are ma available, but the majority have suffered</p>
                  <div class="read_bt"><a href="#">Get A Quote</a></div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <h1 class="banner_taital">Adventure</h1>
                  <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority have sufferedThere are ma available, but the majority have suffered</p>
                  <div class="read_bt"><a href="#">Get A Quote</a></div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <h1 class="banner_taital">Adventure</h1>
                  <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority have sufferedThere are ma available, but the majority have suffered</p>
                  <div class="read_bt"><a href="#">Get A Quote</a></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- banner section end -->
</div>
      