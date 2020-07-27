$(document).ready(function() {
    $('a.register-window').click(function() {
        //lấy giá trị thuộc tính href - chính là phần tử "#login-box"
        var registerBox = $(this).attr('href');
 
        //cho hiện hộp đăng nhập trong 300ms
        $(registerBox).fadeIn(300);
 
        // thêm phần tử id="over" vào sau body
        $('body').append('<div id="over">');
        $('#over').fadeIn(300);
 
        return false;
 });
 
 // khi click đóng hộp thoại
 $(document).on('click', "a.close, #over", function() {
       $('#over, .register').fadeOut(300 , function() {
           $('#over').remove();
       });
      return false;
 });
});