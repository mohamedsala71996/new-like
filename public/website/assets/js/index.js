let Home = document.getElementById("Home");
let Help = document.getElementById("Help");
let Profits = document.getElementById("Profits");

function handelClick(type){
    let listItem = document.getElementById(type);
    Home.classList.remove("active");
    Help.classList.remove("active");
    Profits.classList.remove("active");
    listItem.classList.add("active");

}


document.getElementById("imageBox").addEventListener("click", function() {
  document.getElementById("imageInput").click();
});

document.getElementById("imageInput").addEventListener("change", function() {
  var file = this.files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function(event) {
      document.getElementById("imagePreview").src = event.target.result;
      document.getElementById("imagePreview").style.display = "block";
    };
    reader.readAsDataURL(file);
  }
});
