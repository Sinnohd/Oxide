<?php if(!class_exists('raintpl')){exit;}?><body>
    <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <ul class="nav">
        <li class="active">
          <a class="" id="home" href="#home">Home</a>
        </li>
        <li>
          <a class="" id="partitions" href="#partitions">Partitions</a>
        </li>
        <li>
          <a class="" id="viewer" href="#viewer">MFS Viewer</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="#">Help</a>
            </li>
            <li>
              <a href="controller/user/logout?<?php echo $sid;?>">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- Main container to work in -->
<div class="container-fluid" id="main">

</div> 
</body>