$(document).ready(function() {
    $('#barang').on('click', function(event) {
        event.preventDefault();
      //var id = $(this).data('id');
      //$.get('/pembelian.show/' + id ,function (data) {
        var table = $("<table>").addClass("kop table");
        var headers = $("<thead><tr>").addClass("table-inverse");
          headers.append($("<th>").text("Nama Barang"));
          headers.append($("<th>").text("QTY"));
          headers.append($("<th>").text("Harga Beli"));
          headers.append($("<th>").text("Diskon"));
          headers.append($("<th>").text("Pajak"));
          headers.append($("<th>").text("Harga Pokok"));
          headers.append($("<th>").text("Harga Jual"));
          headers.append($("<th>").text("Total"));
          headers.append($("<th>").text("Retur"));
          table.append(headers);


          $.each(data.data, function (index, item) {
            //   var row = $("<tr>");
            //   row.append($("<td>").text(item.nama));
            //   row.append($("<td>").text(item.jumlah));
            //   row.append($("<td>").text(currency(Math.round(item.beli)).format()));
            //   row.append($("<td>").text(currency(Math.round(item.nilai_diskon)).format()));
            //   row.append($("<td>").text(currency(Math.round(item.nilai_pajak)).format()));
            //   row.append($("<td>").text(currency(Math.round(item.hppBeli)).format()));
            //   row.append($("<td>").text(currency(Math.round(item.jual)).format()));
            //   row.append($("<td>").text(currency(Math.round(item.sub)).format()));
            //   row.append($("<td>").html('<a href="" data-id="' + item.idBeli + '" class="badge badge-danger" data-toggle="modal" id="prosesRetur" data-target="#retur" >R</a>'));
            //   table.append(row);
          });
          $("#tbl_barang").html("");
          $("#tbl_barang").append(table);

    //   })

        });
 })
