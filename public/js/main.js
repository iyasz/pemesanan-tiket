$(document).ready(function(){
  $("#inputSearchData").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#dataAll tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#inpSearchTiketPesawat").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#contentModalTiketPesawat .accordion-item .accordion-header .accordion-button").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function() {
  $('.form-select.start-city').select2();
});

$('#rupiahConvert').on('keydown', function(){
  var total = $('#rupiahResultConvert').val() - parseInt($('#totalAllPriceTransaksi').attr('data-total'));

  console.log(total)
  $('#kembaliTransaksiUserPayment').empty()
  $('#kembaliTransaksiUserPayment').text('IDR '+ parseInt(total).toLocaleString()).attr('data-total', total)
})

$('#btnPayNowTransaksi').on('click', function(){

  var names = Array.from(document.getElementsByName('name[]')).map(function(element) {
    return element.value;
  });

  var data = {
    id: $('#btnPayNowTransaksi').val(),
    names: names,
    total: $('#totalAllPriceTransaksi').data('total'),
    bayar: $('#rupiahResultConvert').val(),
    kembali: $('#kembaliTransaksiUserPayment').data('total'),
    payment_method: $('#selectPaymentMethod').val(),
};

axios.post("/pembayaran/confirm", data)
    .then(function(response) {
        console.log(response);
        window.location.href = "/transaksi";
    })
    .catch(function(error) {
        console.error(error);
    });

})

$('#totalCalcButtonTransaksi').on('click', function(){
  var totalValue = parseInt($('#rupiahResultConvert').val()) - parseInt($('#totalAllPriceTransaksi').attr('data-total')) ;
  $('#kembaliTransaksiUserPayment').text('IDR '+ totalValue.toLocaleString())
  $('#kembaliTransaksiUserPayment').attr('data-total', totalValue)
  
})

$('#btnAddNameTransaksi').on('click', function() {

  var calc = parseInt($('#totalAllPriceTransaksi').attr('data-total'));
  var calcReal = parseInt($('#totalAllPriceTransaksi').attr('data-real'));

  calc += calcReal;
  $('#totalAllPriceTransaksi').attr('data-total', calc).text('IDR ' + calc.toLocaleString());

  var row = $('#nameDetailTransaksi');
  var content = `
  <div class="col-lg-6 col-12 mb-2">
    <p class="fs-s-sm fw-300 mb-1">Nama</p>
    <input type="text" name="name[]" id="" class="form-control fs-s-sm">
  </div>
  `
  row.append(content);
});


function getValueFromModalTransaksi(id){
  $.ajax({
    type: 'get',
    url: '/value/search/tiket-pesawat',
    data: {
      id: id,
    },
    success: function(e){
      console.log(e)
      var price = parseFloat(e.harga)
      var formattedPrice = price.toLocaleString()
      $('#btnAddNameTransaksi').removeAttr('disabled'); 
      $('#btnPayNowTransaksi').removeAttr('disabled'); 
      $('#totalCalcButtonTransaksi').removeAttr('disabled'); 
      $('#rupiahConvert').removeAttr('readonly'); 
      $('#priceTiketPesawat').html('IDR '+ formattedPrice); 
      $('#totalAllPriceTransaksi').html('IDR '+ formattedPrice); 
      $('#totalAllPriceTransaksi').attr('data-total', e.harga); 
      $('#totalAllPriceTransaksi').attr('data-real', e.harga); 
      $('#searchTiketPesawat').val(e.maskapai +' - '+ 'From ' + e.start_city + ' To ' + e.city_destination);
      $('#btnPayNowTransaksi').attr('value', e.id); 
    }
  })
}


$('#btnSearchTiketPesawat').on('click', function(){
  $('#contentModalTiketPesawat').html(`
    <div class="text-center">   
      <div class="spinner-border m-2" role="status"></div>
    </div>
  `);
  axios({
    method: "get",
    url: "/search/tiket-pesawat",
})
    .then(function (response) {
      $('#contentModalTiketPesawat').html('')
        console.log(response.data)
        var element = $('#accordionTiketPesawat');
        $.each(response.data, function(i, result) {
          var HargaValue = parseFloat(result.harga);
          const formattedHarga = HargaValue.toLocaleString();
        
          var content = `
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${i}" aria-expanded="false" aria-controls="collapse${i}">
                    ${result.maskapai}
                  </button>
                </h2>
                <div id="collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionTiketPesawat${i}">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col-6 mb-2">
                        <h5 class="fs-s-sm mb-0">From City</h5>
                      </div>
                      <div class="col-6 mb-2">
                        <p class="fs-s-sm mb-0">${result.start_city}</p>
                      </div>
                      <div class="col-6 mb-2">
                        <h5 class="fs-s-sm mb-0">Destination City </h5>
                      </div>
                      <div class="col-6 mb-2">
                        <p class="fs-s-sm mb-0">${result.city_destination}</p>
                      </div>
                      <div class="col-6 mb-2">
                        <h5 class="fs-s-sm mb-0">Harga</h5>
                      </div>
                      <div class="col-6 mb-2">
                        <p class="fs-s-sm mb-0">Rp. ${formattedHarga}</p>
                      </div>
                      <div class="col-6 mb-2">
                        <h5 class="fs-s-sm mb-0">Total Penumpang</h5>
                      </div>
                      <div class="col-6 mb-2">
                        <p class="fs-s-sm mb-0">${result.total_penumpang}</p>
                      </div>
                      <div class="col-6 mb-2">
                        <h5 class="fs-s-sm mb-0">Jadwal Penerbangan</h5>
                      </div>
                      <div class="col-6 mb-2">
                        <p class="fs-s-sm mb-0">${result.jam_penerbangan}</p>
                      </div>
                      <div class="col-12 mb-2">
                        <div class="text-end">
                          <button class="btn btn-primary btn-sm fs-s-sm" data-bs-dismiss="modal" onclick="getValueFromModalTransaksi('${result.id}')">Pilih</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          `;
        
          element.append(content);
        });
        
        
    })
    .catch(function (error) {
        
    });
})

var rupiah = document.getElementById("rupiahConvert");
var rupiahCalc = document.getElementById("rupiahResultConvert");

rupiah.addEventListener("keyup", function(e) {
  rupiah.value = formatRupiah(this.value, "");

});


/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^.\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

     if (ribuan) {
    separator = sisa ? "," : "";
    rupiah += separator + ribuan.join(",");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
}

rupiah.addEventListener("keyup", function() {
    rupiahCalc.value = rupiah.value;
    rupiahCalc.value = rupiahCalc.value.replace(/,/g, "");
});

$('#switch-transit').on('change', function() {
    var checkboxValue = $(this).prop('checked');
    var element = $('#transitValue');
    if (checkboxValue) {
        element.removeClass('d-none')
        element.addClass('d-block');
    } else {
        element.removeClass('d-block')
        element.addClass('d-none');
        element.val('')
    }
});



// iziToast.show({
//     title: "success",
//     message: "LO KONTOL",
//     position: "topCenter",
//     drag: false,
//     pauseOnHover: false,
//     color: "green",
//     iconUrl: null,
//     timeout: 4100,
// });