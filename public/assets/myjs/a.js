$.ajax({
    data: {
        lokasi: $('#lokasi_a').val(),
        kode: $('#kode').val(),
        tahun:$('#tahun').val(),
        nama:$('#nama').val(),
        guna:$('#guna').val(),

        no_tunjuk:$('#no_tunjuk').val(),
        tgl_tunjuk:$('#tgl_tunjuk').val(),
        luas_tunjuk:$('#luas_tunjuk').val(),

        sertifikat:$('#sertifikat').val(),
        tgl_sertifikat:$('#tgl_sertifikat').val(),
        luas_sertifikat:$('#luas_sertifikat').val(),

        no_gambar:$('#no_gambar').val(),
        tgl_gambar:$('#tgl_gambar').val(),
        luas_gambar:$('#luas_gambar').val(),

        hak:$('#hak').val(),
        asal:$('#asal').val(),
        pemilik:$('#pemilik').val(),
        nilai_a:$('#nilai_a').val(),
        nilai_now:$('#nilai_now').val(),
        ket:$('#ket').val(),
        img: base64Image
    },

})
