
function openNav() {
  document.getElementById("mySidebar").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.getElementById("closebtn1").style.display= "none";
  document.getElementById("todo-btn").style.marginRight= "100px";
  document.getElementById("card-size").style.width= "65rem";
  document.getElementById("card-size2").style.width= "40rem";
  document.getElementById("card-size3").style.width= "60rem";

}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "";
  document.getElementById("closebtn1").style.display= "";
  document.getElementById("todo-btn").style.marginRight= "";


}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}