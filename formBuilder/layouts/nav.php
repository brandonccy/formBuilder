<!-- Static navbar -->
<nav class="navbar navbar-default" style="opacity: 1;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        
        <?php $btnStyle="";$textStyle="";if($page=="home"){ $btnStyle="active";$textStyle="color: #c7703a;"; } ?>
        <li class="<?=$btnStyle?>"><a href="/formBuilder" style="<?=$textStyle?>"><i class="fa fa-home"></i> Home 首頁</a></li>
        
        <?php if($adminlogin<>""){ ?>

          <?php $btnStyle="";$textStyle="";if($page=="create"){ $btnStyle="active";$textStyle="color: #c7703a;"; } ?>
          <li class="<?=$btnStyle?>"><a href="?page=create" style="<?=$textStyle?>"><i class="fa fa-plus"></i> Create 建立</a></li>

          <?php $btnStyle="";$textStyle="";if($page=="list"){ $btnStyle="active";$textStyle="color: #c7703a;"; } ?>
          <li class="<?=$btnStyle?>"><a href="?page=list" style="<?=$textStyle?>"><i class="fa fa-list"></i> List 列單</a></li>

          <?php $btnStyle="";$textStyle="";if($page=="profile"){ $btnStyle="active";$textStyle="color: #c7703a;"; } ?>
          <li class="<?=$btnStyle?>"><a href="?page=profile" style="<?=$textStyle?>"><i class="fa fa-user"></i> Profile 賬號</a></li>

          <?php $btnStyle="";$textStyle=""; $textStyle="color: red;"; ?>
          <li class="<?=$btnStyle?>"><a href="?page=logout" style="<?=$textStyle?>"><i class="fa fa-lock"></i> Logout 登出</a></li>

        <?php } ?>

      </ul>

        <div class="pull-right">

        </div>

    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>