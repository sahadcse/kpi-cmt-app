@extends('layouts.front.front-layout')

@section('content')

      <!-- DEMO1 HTML STARTS HERE *-->
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
          <!-- DEMO1 HTML END HERE *** -->
      <!-- slider area -->
      <section class="section-padding slider-area">
        <div class="container">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div id="particles-js" class="div"></div>

            <div class="carousel-inner" >
              @foreach($sliders as $slider)
              {{-- <div class="slider_title">
                <h1>{{ $slider->title }}</h1>
                <p>{{ $slider->sub_title}}</p>
              </div> --}}
              @endforeach
              @foreach($sliders as $slider)
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('uploads/slider/'. $slider->image)}}" alt="First slide">
              </div>
              @endforeach
            </div>
            
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </section>
      <!-- end slider area -->

      <!-- tab notice-board section -->
      <section class="section-padding news-area">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
            <!-- About us area -->
              <div class="about-us-area">
                <div class="about-title nb-title">
                  <h4>Welcome to Department of CMT</h4>
                </div>
                <div class="about-us-img">
                  <img src="{{ asset('frontend/img/slider3.jpg')}}">
                </div>
                <div class="about-us-description">
                  <p>Department of Computer Technology of KPI, started its academic activities from September 26, 1999 with the aim of quality education as well as cutting edge researches in the branches of Computer Science and Engineering. The department regularly offers postgraduate (M.Sc. and Ph.D.) and undergraduate (B.Sc.) programs. Only top ranked brilliant students are enrolled in this department through a competitive admission test. At present, yearly intake of this department is around 160 including 120 fixed undergraduate intakes. The department has well equipped different laboratories and a System Development Centre to increase the expertise of students practically along with theoretical knowledge <a href="#" target="-_blank">Read More...</a></p>
                </div>
              </div>
              <!-- About us area end -->
              <!-- VC message area -->
              <div class="message-section">
                <div class="message-title nb-title">
                  <h4>Message from Departmental Head</h4>
                </div>
                <div class="vc-message-area">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="{{ asset('frontend/img/shakhawat.jpg')}}" class="vc-img" style="height: 80px;">
                      <small style="font-size: 8px;">ENG. SHAKHAWAT HOSSAIN</small>
                    </div>
                    <div class="col-md-10">
                      <div class="vc-message">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                      </div>
                      <div class="readmore-btn">
                        <a href="#" target="_blank" class="btn btn-primary">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- VC message area end -->
            </div>
            <div class="col-md-4">
              <div class="news_event_notice_area">
                <div class="nb-title">
                  <h4>Notice Board</h4>
                </div>
                <div class="notice-board">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">News</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <marquee direction="up" onmouseover="this.stop()" scrollamount="3" onmouseleave="this.start()">
                       @foreach($newses as $news)
                        <div class="media">
                          <div class="date-news">
                            <small>{{$news->created_at}}</small>
                          </div>
                          <div class="news_notice_event_title">
                            <a href="{{asset('uploads/news/'.$news->document)}}">
                              {{$news->title}}
                            </a>
                          </div>
                        </div>
                      @endforeach
                      </marquee>
                      <div class="news_btn_area">
                        <a href="#"><button class="btn btn-primary">All News</button></a>
                      </div>
                      
                    </div>
                    {{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <marquee direction="up" onmouseover="this.stop()" scrollamount="3" onmouseleave="this.start()"> 
                        <div class="media">
                          <div class="date-news">
                            <p>14 sep</p>
                            <p>2021</p>
                          </div>
                          <div class="news_notice_event_title">
                            <a href="#">
                              Admission is goin on. Don't waste time.Admission is goin on.
                            </a>
                          </div>
                        </div>
                        <div class="media">
                          <div class="date-news">
                            <p>14 sep</p>
                            <p>2021</p>
                          </div>
                          <div class="news_notice_event_title">
                            <a href="#">
                              Admission is goin on. Don't waste time.Admission is goin on.
                            </a>
                          </div>
                        </div>
                        <div class="media">
                          <div class="date-news">
                            <p>14 sep</p>
                            <p>2021</p>
                          </div>
                          <div class="news_notice_event_title">
                            <a href="#">
                              Admission is goin on. Don't waste time.Admission is goin on.
                            </a>
                          </div>
                        </div>
                        <div class="media">
                          <div class="date-news">
                            <p>14 sep</p>
                            <p>2021</p>
                          </div>
                          <div class="news_notice_event_title">
                            <a href="#">
                              Admission is goin on. Don't waste time.Admission is goin on.
                            </a>
                          </div>
                        </div>
                      </marquee>
                      <div class="news_btn_area">
                        <a href="#"><button class="btn btn-primary">All Events</button></a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <marquee direction="up" onmouseover="this.stop()" scrollamount="3" onmouseleave="this.start()"> 
                        <div class="media">
                          <div class="date-news">
                            <p>14 sep</p>
                            <p>2021</p>
                          </div>
                          <div class="news_notice_event_title">
                            <a href="#">
                              Admission is goin on. Don't waste time.Admission is goin on.
                            </a>
                          </div>
                        </div>
                        <div class="media">
                          <div class="date-news">
                            <p>14 sep</p>
                            <p>2021</p>
                          </div>
                          <div class="news_notice_event_title">
                            <a href="#">
                              Admission is goin on. Don't waste time.Admission is goin on.
                            </a>
                          </div>
                        </div>
                        <div class="media">
                          <div class="date-news">
                            <p>14 sep</p>
                            <p>2021</p>
                          </div>
                          <div class="news_notice_event_title">
                            <a href="#">
                              Admission is goin on. Don't waste time.Admission is goin on.
                            </a>
                          </div>
                        </div>
                        <div class="media">
                          <div class="date-news">
                            <p>14 sep</p>
                            <p>2021</p>
                          </div>
                          <div class="news_notice_event_title">
                            <a href="#">
                              Admission is goin on. Don't waste time.Admission is goin on.
                            </a>
                          </div>
                        </div>
                      </marquee> 
                      <div class="news_btn_area">
                        <a href="#"><button class="btn btn-primary">All Notices</button></a>
                      </div>
                    </div> --}}

                  </div>
                </div>
              </div> 
              <!-- News area end -->
              <!-- Facebook post area -->
              <div class="facebook-post-area">
                <div class="follow-title nb-title">
                  <h4>Calender</h4>
                </div>
                <div class="calendar">
                  <div class="header">
                    <a data-action="prev-month" href="javascript:void(0)" title="Previous Month"><i></i></a>
                    <div class="text" data-render="month-year"></div>
                    <a data-action="next-month" href="javascript:void(0)" title="Next Month"><i></i></a>
                  </div>
                  <div class="months" data-flow="left">
                    <div class="month month-a">
                      <div class="render render-a"></div>
                    </div>
                    <div class="month month-b">
                      <div class="render render-b"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- News area end -->
 
@endsection