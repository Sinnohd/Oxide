// initialize...
$(document).ready(function() {
   $('#main').load('views/templates/example/home.tpl');
   $('#home').toggleClass("active");
});

$('#home').live('click', function() {
    $('#main').load('views/templates/example/home.tpl');
});

$('#files').live('click', function() {
    $('#main').load('views/templates/example/files.tpl');
});


$('#one').live('click', function() {
    $('#main').load('views/templates/example/one.tpl');
});

$('#two').live('click', function() {
    $('#main').load('views/templates/example/two.tpl');
});

$('#three').live('click', function() {
    $('#main').load('views/templates/example/three.tpl');
});


