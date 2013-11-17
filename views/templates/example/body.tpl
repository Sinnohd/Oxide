<body>
<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
<div class="container-fluid">
    <a class="brand" href="#">{$brand}</a>
    <div class="nav-collapse">
    <ul class="nav">
        <li><a class="" id="home" href="#home">Home</a></li>
        <li><a class="" id="files" href="#files">Files</a></li>
        <li class="dropdown">
                <a class="dropdown-toggle" id="drop" role="button" data-toggle="dropdown" href="#">Dropdown Menue Sample <b class="caret"></b></a>
                <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop">
                  <li><a id="one" tabindex="-1" href="#one">one</a></li>
                  <li><a id="two" tabindex="-1" href="#two">two</a></li>
                  <li><a id="three" tabindex="-1" href="#three">three</a></li>
                  <li class="divider"></li>
                  <li><a tabindex="-1" href="#">Separated link</a></li>
               </ul>
        </li>
        <li><a href="controller/user/logout?{$sid}">Logout</a></li>
    </ul>
    </div><!--/.nav-collapse -->
</div>
</div>
</div>

<!-- Main container to work in -->
<div class="container-fluid" id="main">

</div> 

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="libs/bootstrap/js/jquery.js"></script>
<script src="libs/bootstrap/js/bootstrap.js"></script>
<script src="views/templates/example/js/main.js"></script>


</body>
