<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body <?php body_class() ?>>
    @yield('content')
    @php do_action('get_footer') @endphp
    @php wp_footer() @endphp
  </body>
</html>
