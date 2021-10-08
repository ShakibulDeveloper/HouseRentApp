<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  @include('backend.layout.styles')
  <!-- end plugin css -->

  @stack('plugin-styles')

  @yield('extra_css')

  <!-- common css -->
  <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->
<style>
  .page-item.active .page-link{
    background-color: #4e5bf2;
    border-color: #4e5bf2;
    color: #fff!important;
  }
  .pagination .page-item .page-link{
    color: #4e5bf2;
  }
  div.dataTables_wrapper div.dataTables_paginate ul.pagination{
    display: none;
  }
  div.dataTables_wrapper div.dataTables_info {
	margin-bottom: 15px;
}

</style>
  @stack('style')

</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('backend/assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">
    @include('backend.layout.sidebar')
    <div class="page-wrapper">
      @include('backend.layout.header')
      <div class="page-content">
        @yield('content')
      </div>
      @include('backend.layout.footer')
    </div>
  </div>

    <!-- base js -->
    @include('backend.layout.scripts')
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>


    <!-- end common js -->

    @stack('custom-scripts')






  <script>
$(function() {
  'use strict';

  $(function() {
    $('#dataTableExample').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    $('#dataTableExample').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });

});
  </script>

<script src="{{ asset('backend/js/ajax.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>

@yield('extra_js')

</body>
</html>
