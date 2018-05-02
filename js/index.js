$('.form').find('input, textarea').on('keyup blur focus', function (e) {

  var $this = $(this),
    label = $this.prev('label');

  if (e.type === 'keyup') {
    if ($this.val() === '') {
      label.removeClass('active highlight');
    } else {
      label.addClass('active highlight');
    }
  } else if (e.type === 'blur') {
    if ($this.val() === '') {
      label.removeClass('active highlight');
    } else {
      label.removeClass('highlight');
    }
  } else if (e.type === 'focus') {

    if ($this.val() === '') {
      label.removeClass('highlight');
    }
    else if ($this.val() !== '') {
      label.addClass('highlight');
    }
  }

});

$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});

$('#signupbtn').on('click', function (e) {
  var formData = {
    name : $('#name').val(),
    address : $('#address').val(),
    email : $('#email').val(),
    password : $('#password').val()
  }

  console.log(formData)
  $.ajax({
    type: 'POST',
    url: 'register_user.php',
    data: formData,
    datatype: 'json',
    encode: true
}).done(function (res) {
    // window.location.href = "index.html"
    console.log(res)
    if('{"success":1}'){
      alert("registration successfull" )
    } else {
      alert("registration failed" )
    }
  });
})

$('#signinbtn').on('click', function (e) {
  e.preventDefault()
  var formData = {
    email : $('#signinEmail').val(),
    password : $('#signinPassword').val()
  }

  console.log(formData)
  $.ajax({
    type: 'POST',
    url: 'user_login.php',
    data: formData,
    datatype: 'json',
    encode: true
}).done(function (res) {
  if(res == '{"success":"0#"}'){
    alert("incorrect email/password")
  } else {
    window.location.href = "hotels.html"
  }
    console.log(res)
  });
})