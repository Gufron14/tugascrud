    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid ">
        <div class="container-fluid text-center mt-3">
          <a class="navbar-brand fw-bold" href="{{ url('/') }}">{GufronDroid}</a>
          <p class="text-light">Menyediakan berbagai Aplikasi Android Premium</p>
          <a href=" {{ route('logout') }} ">Logout</a>
        </div>
      </nav> --}}

      <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href=" {{ route('applications') }} " class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4 fw-bold"> {{ Auth::user()->name }}📱</span>
          </a>
    
          <ul class="nav nav-pills">
            <li class="nav-item {{ Request::path() == 'applications' ? 'active' : '' }}">
              <a href="{{ route('applications') }}" class="nav-link">Applications</a></li>
            <li class="nav-item {{ Request::path() == 'addCategory' ? 'active' : '' }}">
              <a href="{{ route('addCategory') }}" class="nav-link">Categories</a></li>
            <li class="nav-item {{ Request::path() == 'cart' ? 'active' : '' }}">
              <a href="{{ route('cartsPage')}}" class="nav-link">Cart</a></li>
          </ul>
          
            <div class="col-md-3 text-end">
            <a href=" {{ route('logout') }} ">
              <button type="button" class="btn btn-outline-primary me-2">Logout</button>
            </a>
        </header>
      </div>