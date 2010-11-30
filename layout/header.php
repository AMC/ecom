<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="author" content="Lane-Enterprises, design: Ronda Hutchings, coding: Andrew Canfield" />
  <meta name="Location" content="Global" />
  <meta name="MSSmartTagsPreventParsing" content="TRUE" />
  <meta name="Security" content="Public" />
  <meta name="robots" content="index,follow" />
  <meta name="googlebot" content="noodp" />
  <link rel="shortcut icon" href="favicon.ico" />
  <meta name="description" content="<?php echo $description ?>" />
  <meta name="keywords" content="<?php echo $keywords ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>
    <?php if(isset($page_title)) {echo "$page_title"; } else { echo "SafariStuff.com"; } ?>
	</title>
	
	
	
  
  <?php foreach ($stylesheets as $stylesheet) { ?>
    <?php echo "<link href='stylesheets/$stylesheet' rel='stylesheet' type='text/css' />"; }   ?>
    
  <?php foreach ($javascripts as $javascript) { ?>
    <?php echo "<script type='text/javascript' src='javascript/$javascript' /></script>"; }   ?>
    


  	<script type="text/javascript" src="javascript/jquery.1.4.2.js"></script>
  	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
  	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.1.js"></script>
  	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.1.css" media="screen" />

  	<script type="text/javascript">
  	<!--
  		$(document).ready(function() {

  			$("a[rel=image_gallery]").fancybox({
  				'transitionIn'		: 'elastic',
  				'transitionOut'		: 'elastic',
  				'titlePosition' 	: 'inside',
  				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
  					return '<span id="fancybox-title-over"> Image Title </span>';
  				}
  			});
  			
  			$("#login").fancybox({
        	'scrolling'		: 'no',
        	'titleShow'		: false,
        	'onClosed'		: function() {
        	    $("#login_error").hide();
        	}
        });
  		});
  		
      function MM_swapImgRestore() { //v3.0
        var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
      }
      function MM_preloadImages() { //v3.0
        var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
          var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
          if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
      }

      function MM_findObj(n, d) { //v4.01
        var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
          d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
        if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
        for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
        if(!x && d.getElementById) x=d.getElementById(n); return x;
      }

      function MM_swapImage() { //v3.0
        var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
         if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
      }
    
      jQuery.fn.initMenu = function() {  
          return this.each(function(){
              var theMenu = $(this).get(0);
              $('.acc_item', this).hide();
              $('li.expand > .acc_item', this).show();
              $('li.expand > .acc_item', this).prev().addClass('active');
              $('li a', this).click(
                  function(e) {
                      e.stopImmediatePropagation();
                      var theElement = $(this).next();
                      var parent = this.parentNode.parentNode;
                      if($(parent).hasClass('noaccordion')) {
                          if(theElement[0] === undefined) {
                              window.location.href = this.href;
                          }
                          $(theElement).slideToggle('normal', function() {
                              if ($(this).is(':visible')) {
                                  $(this).prev().addClass('active');
                              }
                              else {
                                  $(this).prev().removeClass('active');
                              }    
                          });
                          return false;
                      }
                      else {
                          if(theElement.hasClass('acc_item') && theElement.is(':visible')) {
                              if($(parent).hasClass('collapsible')) {
                                  $('.acc_item:visible', parent).first().slideUp('normal', 
                                  function() {
                                      $(this).prev().removeClass('active');
                                  }
                              );
                              return false;  
                          }
                          return false;
                      }
                      if(theElement.hasClass('acc_item') && !theElement.is(':visible')) {         
                          $('.acc_item:visible', parent).first().slideUp('normal', function() {
                              $(this).prev().removeClass('active');
                          });
                          theElement.slideDown('normal', function() {
                              $(this).prev().addClass('active');
                          });
                          return false;
                      }
                  }
              }
          );
      });
      };

      $(document).ready(function() {$('.acc_menu').initMenu();});  
    //-->
  	</script>

</head>

<body>
	<div id="header">
	<a href="index.php"> 
	  <img src="images/logo2.png" alt="Safari Stuff logo" /> 
	</a>
</div>

