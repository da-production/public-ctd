<!-- jQuery 3 -->
<script src="{{ asset('assets/vendor_components/jquery/dist/jquery.js') }}"></script>

<!-- popper -->
<script src="{{ asset('assets/vendor_components/popper/dist/popper.min.js') }}"></script>

<!-- Bootstrap 4.0-->
<script src="{{ asset('assets/vendor_components/bootstrap/dist/js/bootstrap.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>

<!--amcharts charts -->
<script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
<script src="http://www.amcharts.com/lib/3/gauge.js" type="text/javascript"></script>
<script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
<script src="http://www.amcharts.com/lib/3/amstock.js" type="text/javascript"></script>
<script src="http://www.amcharts.com/lib/3/pie.js" type="text/javascript"></script>
<script src="http://www.amcharts.com/lib/3/plugins/animate/animate.min.js" type="text/javascript"></script>
<script src="http://www.amcharts.com/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
<script src="http://www.amcharts.com/lib/3/themes/patterns.js" type="text/javascript"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script>	

<!-- webticker -->
<script src="{{ asset('assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js') }}"></script>

<!-- EChartJS JavaScript -->
<script src="{{ asset('assets/vendor_components/echarts-master/dist/echarts-en.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/echarts-liquidfill-master/dist/echarts-liquidfill.min.js') }}"></script>

<!-- This is data table -->
<script src="{{ asset('assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js') }}"></script>

<!-- Crypto_Admin App -->
<script src="{{ asset('assets/js/template.js') }}"></script>


{{-- sweat alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/imask"></script>
<!-- Crypto_Admin for demo purposes -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
<script src="{{ asset('js/myscript.js') }}"></script>

@yield('scripts')