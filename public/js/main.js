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

$('#btnAddNameTransaksi').on('click', function(){
  var row = $('#nameDetailTransaksi');
  var content = `
  <div class="col-lg-6 col-12 mb-2">
    <p class="fs-s-sm fw-300 mb-1">Nama</p>
    <input type="text" name="name" id="" class="form-control fs-s-sm">
  </div>
  `
  row.append(content);
})

function getValueFromModalTransaksi(id){
  axios({
    method: "get",
    url: "/value/search/tiket-pesawat",
    data: {
        id: id,
    },
})
    .then(function (response) {
      console.log(response)
    })
    .catch(function (error) {
        
    });
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
                          <button class="btn btn-primary btn-sm fs-s-sm" onclick="getValueFromModalTransaksi('${result.id}')">Pilih</button>
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