<!DOCTYPE html>
<html lang="en"> 
<head>
    <title><?=  $title; ?></title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="OYO STATE COLLEGE OF EDUCATION  LANLATE">
         
    <!-- FontAwesome JS-->
    <script defer src="<?= base_url('assets/plugins/fontawesome/js/all.min.js')?>"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= base_url('assets/css/portal.css')?>">

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		             
		            <div class="app-search-box col">
		              <strong style="font-size:25px"> <img src="<?= base_url('assets/images/schoollogo.jpg')?>" alt="logo" width="40" height="40">    OYO STATE COLLEGE OF EDUCATION, LANLATE</strong>
		            </div><!--//app-search-box-->
		            
		            <!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="<?= base_url('student')?>"><img class="logo-icon mr-2" src="<?= base_url('assets/images/schoollogo.jpg')?>" alt="logo"><span class="logo-text">COEL  </span></a>
	
		        </div><!--//app-branding-->  
		        
                