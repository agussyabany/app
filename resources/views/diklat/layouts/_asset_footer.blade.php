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
<script src="{{ asset('assets/LiveLine/dist/js/pages/dashboard2.js')}}"></script>

<!-- DataTables CSS Yang Sebelumnya--> 
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"> -->
<!-- DataTables JS Yang Baru-->
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> -->

<!--Data table-->
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('assets/LiveLine/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset('assets/LiveLine/dist/js/pegawai.js')}}"></script>










<script>   

       


    $(document).ready(function() {

        $('.select2-class').select2({
        placeholder: 'Pilih Opsi',
        width: 'resolve' // Menyesuaikan lebar dropdown
    });

            //BUTTON MENU SIDEBAR
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

            
            $('#tambahDataPegawai').on('click', function() {
                    //alert("modal");
                    $('#modalPegawai').modal('show');
                    $('#judulModalPegawai').empty();
                    $('#judulModalPegawai').append(" Tambah 2 Data Pegawai");
            });
            
            // $('#editDataPegawai').on('click', function() {
            //         //alert("modal");
            //         $('#modalPegawai').modal('show');
            //         $('#judulModalPegawai').empty();
            //         $('#judulModalPegawai').append(" edit Data Pegawai");
            // });
            
            $(document).on('click', '.edit-pegawai', function() {
                // Ambil data dari tombol Edit
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var nip = $(this).data('nip');
                var jabatan = $(this).data('jabatan');
                var bagian = $(this).data('bagian');
                var img = $(this).data('img');

                // Isi form di modal dengan data yang diambil
                $('#idPegawai').val(id);
                $('#namaPegawai').val(nama);
                $('#nipPegawai').val(nip);
                $('#jabatanPegawai').val(jabatan);
                $('#bagianPegawai').val(bagian);

                // Ubah judul modal menjadi "Edit Data Pegawai"
                $('#judulModalPegawai').text('Edit Data Pegawai');
                
                // Tampilkan modal
                $('#modalPegawai').modal('show');
            });


                 // Inisialisasi untuk Jabatan
                 $('#selectpegawai').select2({
                placeholder: "Pilih Jabatan",
                allowClear: true
            });

            // Inisialisasi untuk Divisi/Departemen
            $('#selectdepartemen').select2({
                placeholder: "Pilih Departemen",
                allowClear: true
            });


            // $('#edit_pemateri').on('click', function() {
            //         //alert("modal");
            //         $('#modalPemateri').modal('show');
            //         $('#judulModalPemateri').empty();
            //         $('#judulModalPemateri').append("Edit Data Pemateri");
            // });

            // $('#tambahDataPelatihan').on('click', function() {
            //         //alert("modal");
            //         $('#modalDataDiklat').modal('show');
            //         $('#judulModalDataDiklat').empty();
            //         $('#judulModalDataDiklat').append(" Tambah Data Diklat");
            // });

            
            // // Inisialisasi untuk Divisi Diklat
            // $('#selectdivisi').select2({
            //     placeholder: "Pilih Divisi",
            //     allowClear: true
            // });

            // $('#edit_divisidiklat').on('click', function() {
            //         //alert("modal");
            //         $('#myTable').modal('show');
            //         $('#judulModalDivisiDiklat').empty();
            //         $('#judulModalDivisiDiklat').append("Edit Data Divisi Diklat");
            //         });

            //         $('#pegawaiTable').DataTable({
            //             "paging": true,
            //             "searching": true,
            //             "ordering": true,
            //             "info": true
            //         })

                /
})
</script>
