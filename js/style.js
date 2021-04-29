
//media affect for menu bar for smaller size(tablet,mobile)
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "sectionmenu") {
    x.className += " responsive";
  } else {
    x.className = "sectionmenu";
  }
}
