var current = 1;
var n = 1;
var howMany = 4;
showDiv(current);

function currentDiv(n) {
  showDiv(current = n);
}

function showDiv() {
  var i;
  var x = document.getElementsByClassName("content");
  var dots = document.getElementsByClassName("dots");

  if (n > x.length) {current = 1}
  if (n < 1) {current = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[current-1].style.display = "block";

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
    dots[i].className = dots[i].className.replace(" first-title", "");
    dots[i].className = dots[i].className.replace(" second-title", "");
    dots[i].className = dots[i].className.replace(" third-title", "");
    dots[i].className = dots[i].className.replace(" fourth-title", "");
    x[i].className = x[i].className.replace(" first-content", "");
    x[i].className = x[i].className.replace(" second-content", "");
    x[i].className = x[i].className.replace(" third-content", "");
    x[i].className = x[i].className.replace(" fourth-content", "");
  }
  dots[current-1].className += " active";
  if (current==1) {
    dots[current-1].className += " first-title";
    x[current-1].className += " first-content";
  }
  if (current==2) {
    dots[current-1].className += " second-title";
    x[current-1].className += " second-content";
  }
  if (current==3) {
    dots[current-1].className += " third-title";
    x[current-1].className += " third-content";
  }
  if (current==4) {
    dots[current-1].className += " fourth-title";
    x[current-1].className += " fourth-content";
  }
  console.log(current);
  current++;
  if(current>howMany) {
    current=1;
  }
}
setInterval(showDiv, 4000);