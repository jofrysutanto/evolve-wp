@extends('layouts.app-empty')

@section('content')
  @if (!have_posts())
  <div class="fourohfour">
    <div class="fourohfour__inner">
        <div class="fourohfour__content">
          <h1>Page not found</h1>
          <h2>404</h2>
          <p>
              Sorry, we can't find the page that you're looking for.
          </p>
          <div class="mt-3">
              <a href="{{ site_url() }}" 
                class="">
                Return to Home
              </a>
          </div>
        </div>
    </div>
  </div>
  @endif
@endsection
