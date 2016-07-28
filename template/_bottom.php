          </section>

          <footer id="footer">
               <p>Copyright (c) 2012-2013, Lebaze Admin Templates. All rights reserved.</p>
          </footer>
          
          <!-- Older IE Message -->
          <!--[if lt IE 9]>
               <div class="ie-block">
                   <h1 class="Ops">Ooops!</h1>
                   <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                   <ul class="browsers">
                       <li>
                           <a href="https://www.google.com/intl/en/chrome/browser/">
                               <img src="img/browsers/chrome.png" alt="">
                               <div>Google Chrome</div>
                           </a>
                       </li>
                       <li>
                           <a href="http://www.mozilla.org/en-US/firefox/new/">
                               <img src="img/browsers/firefox.png" alt="">
                               <div>Mozilla Firefox</div>
                           </a>
                       </li>
                       <li>
                           <a href="http://www.opera.com/computer/windows">
                               <img src="img/browsers/opera.png" alt="">
                               <div>Opera</div>
                           </a>
                       </li>
                       <li>
                           <a href="http://safari.en.softonic.com/">
                               <img src="img/browsers/safari.png" alt="">
                               <div>Safari</div>
                           </a>
                       </li>
                       <li>
                           <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                               <img src="img/browsers/ie.png" alt="">
                               <div>Internet Explorer(New)</div>
                           </a>
                       </li>
                   </ul>
                   <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
               </div>   
          <![endif]-->
          
          <!-- Template skin customize(you can remove this anytime)
          <div class="template-customize hidden-xs">
               <i class="icon-cogs" id="tc-toggle"></i>
               <ul data-elem="body">
                    <li class="header">Body</li>
                    <li><img src="img/body-bg/cloth.png" alt=""></li>
                    <li><img src="img/body-bg/stripes.png" alt=""></li>
                    <li><img src="img/body-bg/bluetec.png" alt=""></li>
                    <li><img src="img/body-bg/cement.png" alt=""></li>
                    <li><img src="img/body-bg/fabric.png" alt=""></li>
                    <li><img src="img/body-bg/fabric-2.png" alt=""></li>
                    <li><img src="img/body-bg/floor.png" alt=""></li>
                    <li><img src="img/body-bg/leather.png" alt=""></li>
                    <li><img src="img/body-bg/pixel.png" alt=""></li>
                    <li><img src="img/body-bg/tactile.png" alt=""></li>
               </ul>
               <ul data-elem="content">
                    <li class="header">Content</li>
                    <li><img src="img/content-bg/content-bg.jpg" alt=""></li>
                    <li><img src="img/content-bg/lines.png" alt=""></li>
                    <li><img src="img/content-bg/cloth.png" alt=""></li>
                    <li><img src="img/content-bg/grid.png" alt=""></li>
                    <li><img src="img/content-bg/gray-leather.png" alt=""></li>
                    <li><img src="img/content-bg/jean.png" alt=""></li>
                    <li><img src="img/content-bg/light.png" alt=""></li>
                    <li><img src="img/content-bg/subtle.png" alt=""></li>
               </ul>
          </div>-->
          
          <!-- Javascipt -->
          <script src="js/jquery-1.10.2.min.js"></script>
          <script src='js/jquery-ui-1.10.3.min.js'></script>
          <script src="js/chart/highcharts.js"></script>
          <script src="js/chart/modules/exporting.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script src="js/feeds.js"></script>
          <script src="js/chosen.js"></script>
          <script src="js/shadowbox.js"></script>
          <script src="js/sparkline.min.js"></script>
          <script src="js/masonry.min.js"></script>
          <script src="js/enscroll.min.js"></script>
          <script src='js/calendar.min.js'></script>
          <script src='js/datatables.min.js'></script>
          <script src='js/autosize.min.js'></script>
          <script src='js/select.min.js'></script>
          <script src="js/toggler.min.js"></script>
          <script src="js/datetimepicker.min.js"></script>
          <script src="js/colorpicker.min.js"></script>
          <script src="js/fileupload.min.js"></script>
          <script src="js/media-player.js"></script>
          <script src="js/validation/validate.min.js"></script>
          <script src="js/validation/validationEngine.min.js"></script>
          <script src="js/functions.js"></script>
          
          <script type="text/javascript">
               $(document).ready(function(){
                    $('.template-customize ul li').click(function(){
                         var getElem = $(this).closest('ul').attr('data-elem');
                         var target = (getElem == "body") ? "body, #leftbar, #rightbar" : "#content";
                         
                         var src = $(this).find('img').attr('src');
                         var bg = 'url('+src+')';
                         $(target).css('background', bg)
                    });
                    
                    $('#tc-toggle').click(function(){
                         $('.template-customize').css('height','auto');
                    });
                    
                    $(document).mouseup(function (e) {
                         var container = $(".template-customize");
                         if (container.has(e.target).length === 0) {
                               container.height(0);
                         }
                    });
               });
     
               //Masonry for widgets
               $(window).load(function(){
                    $('.m-container').masonry({
                         itemSelector: '.masonry'
                    });  
               });
            
          </script>
     </body>
</html>
               