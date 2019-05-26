// let mahasiswa = {
//     nama: "David Pramono",
//     nik: "0110782",
//     email: "dapram12@gmail.com"
// }
// console.log(JSON.stringify(mahasiswa));


//AJAX - vanilla javascript
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);
//     }
// }
// xhr.open('GET', 'coba.json', true); //true == async
// xhr.send();


//JQuery
$.getJSON('coba.json', function (data) {
    console.log(data);
});