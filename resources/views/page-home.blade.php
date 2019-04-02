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
  .welcome-logo {
      position: relative;
      display: block;
      width: 90px;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
      margin-bottom: 1rem;
      padding-bottom: 1rem;
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
    <img class="welcome-logo" 
        src="@asset('images/common/true-logo-white.svg')" 
        alt="True" 
        class="img-fluid">
    <h1>{{ $welcome }}</h1>
    <div class="text-center mt-4">
        <a href="/trueadmin"
            class="login">
            Login to Wordpress Admin
        </a>
        <div class="mt-3">
            <i class="fab fa-wordpress-simple fa-3x" style="opacity: 0.3;"></i> 
        </div>
    </div>
</div>
@endsection