<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/LiveLine/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/LiveLine/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/Liveline/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/Liveline/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/LiveLine/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('assets/LiveLine/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/LiveLine/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/LiveLine/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/LiveLine/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets/LiveLine/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('asssts/LiveLine/dist/js/pages/dashboard2.js')}}"></script>

<script>    
    $(document).ready(function() {
   var on =JSON.parse("{{json_encode($on)}}");
   console.log(on)
   if (on ===1 )
    {
        $("#pegawai").addClass('nav-link active');
        $("#master").addClass("menu-open");
    }
   if (on ===2 ) 
   {
    $("#pemateri").addClass('nav-link active');
    $("#master").addClass("menu-open");
}
   if (on ===3 ) 
   {
    $("#divisidiklat").addClass('nav-link active');
    $("#master").addClass("menu-open");
}
   if (on ===4 ) 
   {
    $("#datadiklat").addClass('nav-link active');
    $("#pelatihan").addClass("menu-open");
}
});


</script>