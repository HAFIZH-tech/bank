window.addEventListener(("scroll"),()=>{
  document.querySelector("#Home h1").style.marginTop = `${window.scrollY * 1.5}px`
  document.querySelector("#Mountain1").style.marginBottom = `${106 - window.scrollY}px`
  document.querySelector("#leftCloud").style.marginLeft = `-${window.scrollY}px`
  document.querySelector("#mainCloud").style.marginTop = `-${window.scrollY}px`
  document.querySelector("#rightCloud").style.marginRight = `-${window.scrollY}px`
})


var popup = document.getElementById(".popup");

// Ambil formulir topup
var topupForm = document.querySelector(".form");

// Fungsi untuk menampilkan formulir topup
function tampilkanForm() {
    var topupForm = document.querySelector(".form");
    if (topupForm) {
        topupForm.style.display = "block";
    }
}

// Fungsi untuk menyembunyikan formulir topup
function hide() {
  var topupForm = document.querySelector(".form");
    if (topupForm) {
        topupForm.style.display = "none";
    }
}

function redirectWithDraw() {
  window.location = "tarik.php";
}
