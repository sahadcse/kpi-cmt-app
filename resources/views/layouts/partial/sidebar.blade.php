<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          KPI CMT
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item  {{ Request::is('admin/slider*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('slider.index')}}">
              <i class="material-icons">view_carousel</i>
              <p>Slider</p>
            </a>
          </li>
          <li class="nav-item  {{ Request::is('admin/news*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('news.index')}}">
              <i class="material-icons">view_carousel</i>
              <p>News</p>
            </a>
          </li>
          <li class="nav-item  {{ Request::is('admin/teacher*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('teacher.index')}}">
              <i class="material-icons">view_carousel</i>
              <p>Teacher</p>
            </a>
          </li>
        <li class="nav-item  {{ Request::is('admin/craft*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('craft.index')}}">
              <i class="material-icons">view_carousel</i>
              <p>Craft Instructor</p>
            </a>
           </li>
          <li class="nav-item  {{ Request::is('admin/staff*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('staff.index')}}">
              <i class="material-icons">view_carousel</i>
              <p>Staff</p>
            </a>
          </li> 
         <li class="nav-item  {{ Request::is('admin/calender*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('calender.index')}}">
              <i class="material-icons">view_carousel</i>
              <p>Academic Calender</p>
            </a>
          </li>
          <li class="nav-item  {{ Request::is('admin/routine*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('routine.index')}}">
              <i class="material-icons">view_carousel</i>
              <p>Routine</p>
            </a>
          </li>  
          <li class="nav-item  {{ Request::is('admin/result*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('result.index')}}">
              <i class="material-icons">view_carousel</i>
              <p>Result</p>
            </a>
          </li>
          <li class="nav-item  {{ Request::is('admin/student*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('student.index')}}">
              <i class="material-icons">view_carousel</i>
              <p>Student</p>
            </a>
          </li>
        </ul>
      </div>
    </div>