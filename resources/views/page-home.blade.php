{{--
  Template Name: Home
--}}
@extends('layouts.app-empty')

@section('content')
<style>
  body,
  main {
      position: fixed;
      min-height: 100vh;
      width: 100%;
      color: #fff;
      background: #232526;  /* fallback for old browsers */
  }
  .welcome {
      position: absolute;
      width: 100%;
      top: 50%;
      padding-left: 40px; padding-right: 40px;
      transform: translate(0, -50%);
  }
  h1 {
      font-family: "Helvetica Neue", "Arial";
      font-size: 64px;
      font-weight: 600;
      text-align: center;
  }
  .login {
    outline: none;
    box-shadow: none;
    display: block;
    padding: 10px 15px;
    width: 320px;
    border-radius: 4px;
    margin-top: 2rem;
    background-color: #303030;
    color: #fff;
    border: 1px solid #393939;
    margin-left: auto;
    margin-right: auto;
    transition: background-color 0.24s ease, box-shadow 0.24s ease;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
  }
  .login:hover {
      text-decoration: none;
      color: #fff;
      background-color: #1e1e1e;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  }
  .welcome-cover,
  .welcome-cover-bg,
  .welcome-cover-overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
  }
  .welcome-cover-bg {
      object-fit: cover;
  }
  .welcome-cover-overlay {
      background-color: #303030;
      opacity: 0.85;
  }
  .main-wrap {
    position: relative;
    transform: translate(0, 40px);
    opacity: 0;
    transition:
      transform 0.48s cubic-bezier(0.075, 0.82, 0.165, 1),
      opacity 0.38s linear;
  }
  .main-wrap.in {
    transform: translate(0, 0px);
    opacity: 1;
  }
  .logo-wrap {
    position: relative;
    width: 380px;
    height: 100px;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  #trueLottie {
    position: absolute;
    left: 50%; top: -155px;
    width: 380px;
    margin-left: -190px;
  }
</style>

{{--
    This welcome cover element demonstrate auto-loading SASS/Javascript
    with external dependencies (https://github.com/verlok/lazyload).
    The styles and scripts that enables this functionalities are in
    - resources/assets/scripts/autoload/_lazy-load.js
    - resources/assets/styles/autoload/_lazy-load.scss
--}}
<div class="welcome-cover">
    <img class="welcome-cover-bg lazy zoom"
        data-src="https://source.unsplash.com/random/1200x800/"
        data-srcset="
            https://source.unsplash.com/random/480x320/ 480w,
            https://source.unsplash.com/random/600x400/ 600w,
            https://source.unsplash.com/random/1200x800/ 1200w
        ">
    <div class="welcome-cover-overlay"></div>
</div>
<div class="welcome">
    <div class="main-wrap" id="mainWrap">
      <h1>{{ $welcome }}</h1>
      <div class="mt-4 text-center">
          <a href="/wp-admin"
              class="login">
              Login to Wordpress Admin
          </a>
      </div>
    </div>
</div>
<script>
window.setTimeout(function () {
  document.getElementById('mainWrap').classList.add('in')
}, 250);
</script>

@endsection
