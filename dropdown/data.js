var a = {
    Cars: [{
        "nama": "Bandung",
        "ID": "1"
    }, {
        "nama": "Surabaya",
        "ID": "2"
    }, {
        "nama": "Kediri",
        "ID": "3"
    }, {
        "nama": "Bali",
        "ID": "4"
    }]
};
$.each(a.Cars, function (key, value) {
    $("#imgDropdown").append($('<option></option>').val(value.nama).html(value.nama));
});
