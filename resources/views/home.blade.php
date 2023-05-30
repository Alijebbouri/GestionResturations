@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h1>Welcome to our Restaurant</h1>
          <p>Delicious dishes prepared with love.</p>
          <div class="col">
            <h2>About Us</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin cursus varius justo sed pharetra.
            Suspendisse vel risus et neque efficitur iaculis. Duis auctor pellentesque erat, id dictum felis
            fringilla et. Donec convallis lacus vitae massa ultrices, non mollis massa pellentesque. Sed
            ultrices dui vel pharetra rutrum.</p>
          </div>
          <a href={{route('menus.index')}} class="btn btn-primary">Voir le Menu</a>
        </div>
        <div class="col-lg-6">
            <img src="{{asset('images/restaurant.jpg')}}" alt="restaurant Image" class="img-fluid" height="350">
        </div>
      </div>
      <div class="col-lg-6">
        <h2>Contact Us</h2>
        <p>Feel free to reach out to us for any inquiries or reservations.</p>
        <ul class="list-unstyled">
          <li><i class="fas fa-map-marker-alt"></i> 123 Main Street, berkane, morocco</li>
          <li><i class="fas fa-phone"></i> 0766426687</li>
          <li><i class="fas fa-envelope"></i> lecoin@email.com</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Footer -->
  @endsection
  @section('footer')
  <footer class="footer bg-dark text-white text-center py-4 ">
    <div class="container">
        <div class="row">
            <div class="col">
                <p>&copy; 2023 Restaurant le Coin. All rights reserved.</p>
            </div>
        </div>

    </div>
  </footer>
  @endsection

