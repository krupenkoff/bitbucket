//авторизация
$('.loginbtn').click(function(e){
 e.preventDefault();
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();
 
    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success: function (data) {
          if (data.status===true) {
                document.location.href = 'profile.php';
          } else {
                $('.msg').removeClass('none').text(data.message);
          }
        }
    });
});
//регистрация
$('.regbtn').click(function(e){
   e.preventDefault();

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        confirm_password = $('input[name="confirm_password"]').val(),
        email = $('input[name="email"]').val(),
        name = $('input[name="name"]').val();
        
    $.ajax({
        url: 'vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        data: {
        login: login,
        password: password,
        confirm_password: confirm_password, 
        email: email,
        name: name            
        },
        success: function (data) {
          if (data.status===true) {
                document.location.href = 'index.php';
          } else {
                $('.msg').removeClass('none').text(data.message);
          }
        }
    });
});



