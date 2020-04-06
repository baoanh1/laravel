<div class='row'>
  <div id="id01" class="modal">
  
  <form id="login" class="modal-content" method="POST" action="{{url('loginform')}}">
    @csrf
    <div class="container">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h3 class="text-center">Đăng Nhập</h3>

      <!-- <button type="button" class="close" ata-dismiss="modal" aria-label="Close"> -->

  <!-- <span aria-hidden="true">&times;</span> -->
</button>
      <input type="text" class="textCtrl floatInput" placeholder="Số ĐT/Email của bạn" name="email" required>

      <input type="password" placeholder="Mật khẩu của bạn" name="password" required>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Ghi nhớ

      </label>

      <p>Bạn chưa có tài khoản? Đăng ký <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancel-login-btn">Hủy</button>
        <button type="submit" class="loginbtn">Đăng Nhập</button>
      </div>
<hr class="half-rule"/>

<div class= "divider"></div>
      <span class="text-form">
    <span>Bạn chưa có tài khoản?</span>
    <a href="" class="registerBtn OverlayTrigger">Đăng ký</a>
  </span>


    </div>
  </form>
</div>
</div>

