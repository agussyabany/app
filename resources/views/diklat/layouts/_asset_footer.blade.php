<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<!-- jQuery -->
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>

<script>
$(document).ready( function () {
    $('#pemateriTable').DataTable();
} );
</script>

<script>
  $(document).ready(function() {
    $('#divisiTable').DataTable({
      "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],  // Menambahkan opsi entries per page
      "pageLength": 10 // Default 10 entries per page
    });
  });
</script>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- tablejs -->

<script src="{{ asset('assets/LiveLine/dist/js/bagian.js')}}"></script>

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

//MODAL EDIT
$('#edit_pemateri').on('click', function() {
                    //alert("modal");
                   $('#modal-default').modal('show');
                   $('#judulmodalPemateri').empty();
                   $('#judulmodalPemateri').append('Edit Data Pemateri');
            });



$('#edit_bagian').on('click', function() {
                    //alert("modal");
                   $('#modal-default').modal('show');
                   $('#judulmodalbagian').empty();
                   $('#judulmodalbagian').append('Tambah Data Bagian');
            });


         


});

$('.select2').select2({
            placeholder: "Pilih jabatan", // Placeholder yang akan ditampilkan
            allowClear: true // Menambahkan tombol clear (hapus pilihan)
        });
</script>

<script>
    $(document).on('click', '.edit_pemateri', function() {
        const id = $(this).data('id');
        const namaPemateri = $(this).data('pemateri');
        const asal = $(this).data('asal');

        // Mengisi input di modal dengan data yang diambil
        $('#inputNamaPemateri').val(namaPemateri);
        $('#inputAsalPemateri').val(asal);

        // Mengatur action form dengan ID pemateri yang akan diupdate
        $('#editForm').attr('action', '/pemateri/' + id);
    });
</script>




       
   



    

</script>