<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- General JS Scripts -->
<script src="{{ asset('vendors/template/dist/modules/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/template/dist/modules/popper.js') }}"></script>
<script src="{{ asset('vendors/template/dist/modules/tooltip.js') }}"></script>
<script src="{{ asset('vendors/template/dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/template/dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('vendors/template/dist/modules/moment.min.js') }}"></script>
<script src="{{ asset('vendors/template/dist/js/stisla.js') }}"></script>

@yield('additional_js')

<!-- Template JS File -->
<script src="{{ asset('vendors/template/dist/js/scripts.js') }}"></script>
<script src="{{ asset('vendors/template/dist/js/custom.js') }}"></script>

@yield('script')