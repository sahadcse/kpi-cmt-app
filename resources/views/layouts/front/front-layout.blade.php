 <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}" >
    <link href="{{ asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/OwlCarousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/OwlCarousel/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/breaking-news-ticker.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">

    <title>Welcome to kpi- CMT</title>

  </head>
  <body>

      <!-- header area --> 
      <section class=" section-padding header-top"></section>
      <!-- end header top -->
      <section class="header-nav">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
            <a class="navbar-brand" href="#">
              <img src="{{ asset('frontend/img/logo.png')}}" style="width: 300px; height: 60px; padding-left: 0px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    About
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('preface')}}">Preface</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('msvs')}}">Mission & Vission</a>
                    <div class="dropdown-divider"></div>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('teacher')}}">Teachers</a>
                </li><li class="nav-item">
                  <a class="nav-link" href="{{route('craft')}}">Craft Instructor</a>
                </li><li class="nav-item">
                  <a class="nav-link" href="{{route('staff')}}">Staff</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Student Section
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('calender')}}">Academic Calender</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('routine')}}">Routine</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('result') }}">Result</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{  route('student') }}">Student</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
                
              </ul>
              <!-- <form class="form-inline my-2 my-lg-0 src-form-group">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <a href="#"><i class="fa fa-search search-btn"></i></a>
              </form> -->
            </div>
          </nav>
        </div>
      </section>
      <!-- end hader nav -->
      {{--  <!-- DEMO1 HTML STARTS HERE *-->
        <!-- *********************** -->
        <div class="container">
        <div class="breaking-news-ticker" id="newsTicker1">
          <div class="bn-label">Latest News</div>
          <div class="bn-news">
            <ul>
              @foreach($newses as $news)
              <li><a href="{{asset('uploads/news/'.$news->document)}}">{{$news->title}}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="bn-controls">
            <button><span class="bn-arrow bn-prev"></span></button>
            <button><span class="bn-action"></span></button>
            <button><span class="bn-arrow bn-next"></span></button>
          </div>
        </div>
        </div>
          <!-- *********************** -->
          <!-- DEMO1 HTML END HERE *** --> --}}





      @yield('content')





           <!-- footer area -->
      <section class="footer-down">
        <div class="container footer-bottom">
          <div class="row">
            <div class="col-md-12">
              <p class="bottom-top">Department of Computer Technology (CMT), Khulna Polytechnic Institute (KPI)<br>
              Khulna-9203,Bangladesh, Phone: +88041-774318, +88041-769471-Ext-350 Fax: +880-41-774403
              <a href="#" class="email">Email Us</a>
              </p>
              <p>&copy 2021 All rights reserved</p>
            </div>
          </div>
        </div>
      </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('frontend/js/popper.4.3.1.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/OwlCarousel/owl.carousel.min.js')}}"></script>

    <!-- partucels area -->
    <script src="{{ asset('frontend/js/particles.js')}}"></script>
    <script src="{{ asset('frontend/js/app.js')}}"></script>
    <script src="{{ asset('frontend/js/breaking-news-ticker.min.js')}}"></script>
    
    <!-- partucels area end-->
    <script src="{{ asset('frontend/js/main.js')}}"></script>
    <script>
      $('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          nav:false,
          autoplay: false,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:3
              }
          }
      }) 
     </script>
     <script>
     jQuery(document).ready(function($){
      $('#newsTicker1').breakingNews({
        scrollSpeed: 1,
        radius:0,
      });
     });
       
     </script>
          <!---------------------------------- calender js strt -------------------------------------------->
     <script>
    var Calendar = function(t) {
        this.divId = t.RenderID ? t.RenderID : '[data-render="calendar"]', this.DaysOfWeek = t.DaysOfWeek ? t.DaysOfWeek : ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], this.Months = t.Months ? t.Months : ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var e = new Date;
        this.CurrentMonth = e.getMonth(), this.CurrentYear = e.getFullYear();
        var r = t.Format;
        this.f = "string" == typeof r ? r.charAt(0).toUpperCase() : "M"
    };
    Calendar.prototype.nextMonth = function() {
        11 == this.CurrentMonth ? (this.CurrentMonth = 0, this.CurrentYear = this.CurrentYear + 1) : this.CurrentMonth = this.CurrentMonth + 1, this.divId = '[data-active="false"] .render', this.showCurrent()
    }, Calendar.prototype.prevMonth = function() {
        0 == this.CurrentMonth ? (this.CurrentMonth = 11, this.CurrentYear = this.CurrentYear - 1) : this.CurrentMonth = this.CurrentMonth - 1, this.divId = '[data-active="false"] .render', this.showCurrent()
    }, Calendar.prototype.previousYear = function() {
        this.CurrentYear = this.CurrentYear - 1, this.showCurrent()
    }, Calendar.prototype.nextYear = function() {
        this.CurrentYear = this.CurrentYear + 1, this.showCurrent()
    }, Calendar.prototype.showCurrent = function() {
        this.Calendar(this.CurrentYear, this.CurrentMonth)
    }, Calendar.prototype.checkActive = function() {
        1 == document.querySelector(".months").getAttribute("class").includes("active") ? document.querySelector(".months").setAttribute("class", "months") : document.querySelector(".months").setAttribute("class", "months active"), "true" == document.querySelector(".month-a").getAttribute("data-active") ? (document.querySelector(".month-a").setAttribute("data-active", !1), document.querySelector(".month-b").setAttribute("data-active", !0)) : (document.querySelector(".month-a").setAttribute("data-active", !0), document.querySelector(".month-b").setAttribute("data-active", !1)), setTimeout(function() {
            document.querySelector(".calendar .header").setAttribute("class", "header active")
        }, 200), document.querySelector("body").setAttribute("data-theme", this.Months[document.querySelector('[data-active="true"] .render').getAttribute("data-month")].toLowerCase())
    }, Calendar.prototype.Calendar = function(t, e) {
        "number" == typeof t && (this.CurrentYear = t), "number" == typeof t && (this.CurrentMonth = e);
        var r = (new Date).getDate(),
            n = (new Date).getMonth(),
            a = (new Date).getFullYear(),
            o = new Date(t, e, 1).getDay(),
            i = new Date(t, e + 1, 0).getDate(),
            u = 0 == e ? new Date(t - 1, 11, 0).getDate() : new Date(t, e, 0).getDate(),
            s = "<span>" + this.Months[e] + " &nbsp; " + t + "</span>",
            d = '<div class="table">';
        d += '<div class="row head">';
        for (var c = 0; c < 7; c++) d += '<div class="cell">' + this.DaysOfWeek[c] + "</div>";
        d += "</div>";
        for (var h, l = dm = "M" == this.f ? 1 : 0 == o ? -5 : 2, v = (c = 0, 0); v < 6; v++) {
            d += '<div class="row">';
            for (var m = 0; m < 7; m++) {
                if ((h = c + dm - o) < 1) d += '<div class="cell disable">' + (u - o + l++) + "</div>";
                else if (h > i) d += '<div class="cell disable">' + l++ + "</div>";
                else {
                    d += '<div class="cell' + (r == h && this.CurrentMonth == n && this.CurrentYear == a ? " active" : "") + '"><span>' + h + "</span></div>", l = 1
                }
                c % 7 == 6 && h >= i && (v = 10), c++
            }
            d += "</div>"
        }
        d += "</div>", document.querySelector('[data-render="month-year"]').innerHTML = s, document.querySelector(this.divId).innerHTML = d, document.querySelector(this.divId).setAttribute("data-date", this.Months[e] + " - " + t), document.querySelector(this.divId).setAttribute("data-month", e)
    }, window.onload = function() {
        var t = new Calendar({
            RenderID: ".render-a",
            Format: "M"
        });
        t.showCurrent(), t.checkActive();
        var e = document.querySelectorAll(".header [data-action]");
        for (i = 0; i < e.length; i++) e[i].onclick = function() {
            if (document.querySelector(".calendar .header").setAttribute("class", "header"), "true" == document.querySelector(".months").getAttribute("data-loading")) return document.querySelector(".calendar .header").setAttribute("class", "header active"), !1;
            var e;
            document.querySelector(".months").setAttribute("data-loading", "true"), this.getAttribute("data-action").includes("prev") ? (t.prevMonth(), e = "left") : (t.nextMonth(), e = "right"), t.checkActive(), document.querySelector(".months").setAttribute("data-flow", e), document.querySelector('.month[data-active="true"]').addEventListener("webkitTransitionEnd", function() {
                document.querySelector(".months").removeAttribute("data-loading")
            }), document.querySelector('.month[data-active="true"]').addEventListener("transitionend", function() {
                document.querySelector(".months").removeAttribute("data-loading")
            })
        }
    };
     </script>
     <!---------------------------------- calender js end ---------------------------------------------->
  </body>
</html>