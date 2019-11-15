<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @php wp_head() @endphp
  <script type="text/javascript">
    window.ajaxurl = '{{ admin_url('admin-ajax.php') }}';
    window.jsonurl = '{{ rest_url() }}';
  </script>
</head>
