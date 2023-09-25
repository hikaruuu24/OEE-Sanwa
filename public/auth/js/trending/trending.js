
function fix_val(val, del = 2) {
    val = parseInt(val)
   if (val != undefined || val != null) {
       var rounded = val.toFixed(del).toString().replace('.', ","); // Round Number
       return numberWithCommas(rounded); // Output Result
   }

}

function numberWithCommas(x) {
   return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
