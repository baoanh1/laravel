
  <div id="id02" class="modal">
  
  <form id="signup" class="modal-content" method="POST" action="{{route('signupUser')}}">
  @csrf
    <div class="container">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h3 class="text-center">Đăng ký tài khoản mới</h3>
      <hr>
      <input type="text" placeholder="Nhập Tên" name="name" required>
      <input type="text" placeholder="Số ĐT/Email" name="email" required>

      <input type="password" placeholder="Mật Khẩu" name="password" required>

      <input type="password" placeholder="Nhật Lại Mật khẩu" name="password-confirm" required>
      
      <br>
      <span>Thông tin cá nhân (Tuỳ chọn)</span>
       <br>
      <input class="col-sm-12" placeholder="Nhập ngày sinh" type="date" name="bday">
<br>

        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> ghi nhớ

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Hủy</button>
        <button type="submit" class="signupbtn">Đăng Ký</button>
      </div>

      <hr class="half-rule"/>

<div class= "divider"></div>
      <span class="">
    <span>Bạn đã có tài khoản?</span>
    <a href="" class="registerBtn OverlayTrigger">Đăng nhập</a>
  </span>
    </div>
  </form>
</div>


<!-- @if(session()->has('message'))
    <script>
    $(function() {
      $('.modal').modal('show');
    });
</script>
@endif -->

