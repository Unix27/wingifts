// Get the modal
var modal = document.getElementById('myModal');
var modal1 = document.getElementById('myModal1');

// Get the button that opens the modal
var btn = document.getElementById('myBtn');
var btn1 = document.getElementById('myBtn1');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName('close')[0];
var span2 = document.getElementsByClassName('close')[1];
var span3 = document.getElementsByClassName('close')[2];

console.log(span2);
document.getElementById('bclose').onclick = function () {
  modal.style.display = 'none';
  modal1.style.display = 'none';
};
document.getElementById('bclose1').onclick = function () {
  modal.style.display = 'none';
  modal1.style.display = 'none';
};
// When the user clicks on the button, open the modal
btn.onclick = function () {
  modal.style.display = 'block';
};
btn1.onclick = function () {
  modal1.style.display = 'block';
};
// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  console.log('JEJ');
  modal.style.display = 'none';
  modal1.style.display = 'none';
};
span3.onclick = function () {
  console.log('JEJ');
  modal.style.display = 'none';
  modal1.style.display = 'none';
};
span2.onclick = function () {
  console.log('JEJ');
  modal.style.display = 'none';
  modal1.style.display = 'none';
};
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal || event.target == modal1) {
    modal.style.display = 'none';
    modal1.style.display = 'none';
  }
};
window.onload = function () {};

$(document).ready(function () {
  $('#firstname').on('input', function (e) {
    if ($(this).val() == '') {
      $('.placeholder.firstname').show();
    } else {
      $('.placeholder.firstname').hide();
    }
  });
  $('#lastname').on('input', function (e) {
    if ($(this).val() == '') {
      $('.placeholder.lastname').show();
    } else {
      $('.placeholder.lastname').hide();
    }
  });
  $('#username').on('input', function (e) {
    if ($(this).val() == '') {
      $('.placeholder.email').show();
    } else {
      $('.placeholder.email').hide();
    }
  });
  $('#password').on('input', function (e) {
    if ($(this).val() == '') {
      $('.placeholder.password').show();
    } else {
      $('.placeholder.password').hide();
    }
  });
});

var video = document.getElementById('video1');
var image = document.querySelector('.img-fluid.load-show');
video.onended = function (e) {
  video.setAttribute('style', 'display:none');
  image.setAttribute('style', 'display:block');
};
