<link href="../Pront_Asset/css/mycss/mycss.css" rel="stylesheet" type="text/css" media="all" />
<link href="../Pront_Asset/css/bootstrap.min.css" rel="stylesheet" />
<link href="../Pront_Asset/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <div class="wrapper">
<div class="row">
    <div class="col-md-3">
        <nav class="navbar bg-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link 3</a>
            </li>
          </ul>
        </nav>
        <div class="mainnav" id="mainnav">
        <ul id="nav" class="navbar-nav menu">
            <li class="nav-item">
                <a href="/tong-quan" class="nav-link">Tổng quan</a>
            </li>
             <li class="nav-item">

                
                <a class="nav-link subparenttc active" href="/tong-thau-thi-cong">Tổng thầu Thiết kế - thi công </a>

                
            </li>
            <li class="nav-item">
                
                <a class="nav-link subparentxl" hrefs="/hoat-dong-xay-lap" style="color: #03853d; cursor: pointer;" onclick="$('#submenuhdxl').toggle('slow');">Hoạt động xây lắp </a>
                <ul id="submenuhdxl" class="sub-menu" style="display: block;">
                    
                    <li><a class="subhdxl" href="/-hoat-dong-xay-lap/thi-cong-cao-tang">Thi công cao tầng</a></li>
                    
                    <li><a class="subhdxl" href="/-hoat-dong-xay-lap/thi-cong-ha-tang--giao-thong">Thi công hạ tầng / Giao thông</a></li>
                    
                    <li><a class="subhdxl" href="/-hoat-dong-xay-lap/thi-cong-co-dien">Thi công cơ điện</a></li>
                    
                    <li><a class="subhdxl" href="/-hoat-dong-xay-lap/cong-nghe-silic-form">Công nghệ Silic form</a></li>
                    
                </ul>
                
            </li>

           

            <li class="nav-item">
                
                <a class="nav-link subparentdds" hrefs="/bat-dong-san" style="color: #03853d; cursor: pointer;" onclick="$('#submenubds').toggle('slow');">Hoạt động Đầu tư</a>
                <ul id="submenubds" class="sub-menu" style="display: none">
                    
                    <li><a class="subds" href="/-bat-dong-san/dau-tu-bat-dong-san">Đầu tư bất động sản</a></li>
                    
                    <li><a class="subds" href="/-bat-dong-san/dau-tu-khac">Đầu tư khác</a></li>
                    
                </ul>
                
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/tin-tuc">Tin tức</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/van-ban">Văn bản - Tài liệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/quan-he-cong-dong">Quan hệ cổ đông</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tuyen-dung">Tuyển dụng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/don-vi-thanh-vien">Đơn vị thành viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/lien-he">Liên hệ</a>
            </li>
        </ul>
        <div class="search-contaiter">
            <div class="search-form">

                <input type="text" class="form-control" id="seachkey" name="" placeholder="">
                <button onclick="seach()" class="btn btn-secondary d-none">Search</button>
                <script>
                    $('#seachkey').on('keydown', function (e) {
                        if (e.which == 13) {
                            seach();
                        }
                    });
                    function seach() {
                        var value = $('#seachkey').val();
                        window.location.href = "/Form/TimKiem.aspx?key=" + value;
                    }
                    $(function () {
                        var current = location.pathname;
                        $('#nav li a').each(function () {
                            var $this = $(this);

                            $this.removeClass('active');
                            var data = $this.data("href");
                            if ($this.attr('data-href') == undefined) {
                                data = "";
                            }

                            //alert($this.attr('href') + "-" + data );
                            if ($this.attr('href') != undefined) {
                                if ($this.attr('href').indexOf(current) !== -1 || data.indexOf(current) !== -1) {

                                    if ($this.hasClass("subhdxl")) {
                                        $(".subparentxl").addClass('active');
                                        $('#submenuhdxl').toggle('slow');
                                    }
                                    else if ($this.hasClass("subhdtc")) {
                                        $(".subparenttc").addClass('active');
                                        $('#submenutc').toggle('slow');
                                    }
                                    else if ($this.hasClass("subhdds")) {
                                        $(".subparentdds").addClass('active');
                                        $('#submenubds').toggle('slow');
                                    }
                                    else {
                                        $this.addClass('active');
                                    }

                                }
                            }
                        })
                    })
                </script>

            </div>
        </div>
        <!-- .search-contaiter -->
        <div class="language-container" style="display:none">
            <a href="#" title="Việt Nam">
                <img src="/Theme/img/upload/vi.jpg" style="width: 35px" alt="Viet Nam"></a>
            <a href="#" title="English">
                <img src="/Theme/img/upload/en.jpg" style="width: 35px" alt="English"></a>
        </div>

    </div>
    </div>
    <div class="col-md-9">
      <div class="container-slide">
      <div id="demo" class="carousel slide" data-ride="carousel">

                  <!-- Indicators -->
                  <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                  </ul>
                  
                  <!-- The slideshow -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="../Pront_Asset/images/1.jpg" class="img-fruid" alt="Los Angeles">
                    </div>
                    <div class="carousel-item">
                      <img src="../Pront_Asset/images/2.jpg" class="img-fruid" alt="Chicago" >
                    </div>
                    <div class="carousel-item">
                      <img src="../Pront_Asset/images/4.jpg" class="img-fruid" alt="New York">
                    </div>
                  </div>
                  
                  <!-- Left and right controls -->
                  <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>
                </div>
        </div>
        @foreach($product as $pro)
                <div class="col-md-4">
                    <article class="box-thumnail">
                        <a href="/du-an/du-an-59-63-huynh-thuc-khang-71">
                            <img class="img-thumbnail" src="{{asset('/')}}/{{$pro->Image}}/"alt="Image">
                        </a>
                        <h3 class="mb-0 text-center cate">
                            <a href="/du-an/du-an-59-63-huynh-thuc-khang-71" class="title-news">Dự án 59-63 Huỳnh Thúc Kháng<strong class="location d-block">Hà Nội</strong>
                            </a>
                        </h3>
                    </article>
                </div>
                @endforeach
    </div>

</div>
</div>