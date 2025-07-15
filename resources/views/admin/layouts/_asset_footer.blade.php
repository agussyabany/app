<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
{{-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script> --}}
<script>
    const BASE_URL = "{{ config('app.url') }}";
</script>   

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/myjs/asetkib.js') }}"></script>
<script src="{{ asset('assets/myjs/funct.js') }}"></script>
<script src="{{ asset('assets/myjs/asetmaster.js')}}"></script>
<script>
    $(document).ready(function() {
        var on =  JSON.parse("{{ json_encode($on) }}");
            if (on === 1) {$('#barang').addClass('text-start btn btn-primary hoverable');}
            if (on === 2) {$('#departemen').addClass('text-start btn btn-primary hoverable');}
            if (on === 3) {$('#divisi').addClass('text-start btn btn-primary hoverable');}
            if (on === 4) {$('#ruang').addClass('text-start btn btn-primary hoverable');}
            if (on === 5) {$('#sdm').addClass('text-start btn btn-primary hoverable');}
            if (on === 6) {$('#lokasi').addClass('text-start btn btn-primary hoverable');}
            if (on === 7) {$('#dokumen').addClass('text-start btn btn-primary hoverable');}
            if (on === 8) {$('#bahan').addClass('text-start btn btn-primary hoverable');}
            if (on === 9) {$('#aktiva').addClass('text-start btn btn-primary hoverable');}
            if (on === 10) {$('#tanah').addClass('text-start btn btn-primary hoverable');}
            if (on === 11) {$('#mesin').addClass('text-start btn btn-primary hoverable');}
            if (on === 12) {$('#gedung').addClass('text-start btn btn-primary hoverable');}
            if (on === 13) {$('#jalan').addClass('text-start btn btn-primary hoverable');}
            if (on === 14) {$('#tetap').addClass('text-start btn btn-primary hoverable');}
            if (on === 15) {$('#konstruksi').addClass('text-start btn btn-primary hoverable');}
            if (on === 16) {$('#kir').addClass('text-start btn btn-primary hoverable');}
            if (on === 17) {$('#nilai').addClass('text-start btn btn-primary hoverable');}
        });
</script>
<script>
    $(document).ready(function () {
        $('.select2').each(function () {
            $(this).select2({
                dropdownParent: $(this).closest('.modal'), // otomatis cari modal terdekat
                width: 'resolve'
            });
        });
    });
</script>
