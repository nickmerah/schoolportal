<!DOCTYPE html>
<html lang="en">

  
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo isset($title)?$title:"Conamkat"?> - Generic Payments</title>
  <meta name="description" content="Katsina State College of Nursing and Midwifery CONAMKAT">
  
  <link rel="stylesheet" href="<?= base_url('assets/css/materialize.min.css');?>">

<style type="text/css">
html,
body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
}
.margin {
  margin: 0 !important;
}
a:link {
	color: #093;
}
h1 {
	font-size: 4.2px;
}
h2 {
	font-size: 3.56px;
}
h3 {
	font-size: 2.92px;
}
h4 {
	font-size: 2.28px;
}
h5 {
	font-size: 1.64px;
}
h6 {
	font-size: 1px;
}
</style>
<script type="text/JavaScript">
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });
  
  
  $(document).ready(function(){
    $('select').formSelect();
  });

  $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
  
  var instance = M.FormSelect.getInstance(elem);
</script>
                
  
</head>