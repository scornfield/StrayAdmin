<!DOCTYPE html>
<html>
     <head>
         <title>Stray Baseball Administrator Portal</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="description" content="Stray Baseball Administrator Portal">
          <meta name="keywords" content="Stray Baseball, Administrator Portal, Info Center">
          <meta charset="UTF-8">
         
          <!-- CSS -->
          <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
          <link href="css/calendar.min.css" rel="stylesheet">
          <link href="css/icomoon.min.css" rel="stylesheet">
          <link href="css/media-player.min.css" rel="stylesheet">
          <link href="css/file-manager.min.css" rel="stylesheet">
          <link href="css/form.min.css" rel="stylesheet">
          <link href="css/style.min.css" rel="stylesheet">
               
          <!-- The following CSS codes are used to display the template customization in this page. You can remove these codes anytime
          <style type="text/css">
               .template-customize {
                    position: fixed;
                    bottom: 0;
                    right: 35px;
                    background: #000;
                    background: rgba(0,0,0,0.9);
                    width: 154px;
                    z-index: 10000;
                    border: 2px solid #B6B6B6;
                    border-bottom: 0;
                    border-radius: 1px;
                    box-shadow: 0 0 10px #000;
                    height: 0;
               }
               
               .template-customize i {
                    font-size: 30px;
                    position: absolute;
                    color: #000;
                    top: -46px;
                    left: 49px;
                    padding: 10px 10px 4px 10px;
                    border-radius: 100% 100% 0 0;
                    background: #fff;
                    background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #FFFFFF),color-stop(1, #B6B6B6));
                    background-image: -o-linear-gradient(bottom, #FFFFFF 0%, #B6B6B6 100%);
                    background-image: -moz-linear-gradient(bottom, #FFFFFF 0%, #B6B6B6 100%);
                    background-image: -webkit-linear-gradient(bottom, #FFFFFF 0%, #B6B6B6 100%);
                    background-image: -ms-linear-gradient(bottom, #FFFFFF 0%, #B6B6B6 100%);
                    background-image: linear-gradient(to bottom, #FFFFFF 0%, #B6B6B6 100%);
               }
               
               .template-customize i:hover {
                    cursor: pointer;
                    color: #3748d4;
               }
               
               .template-customize ul {
                    list-style: none;
                    float: left;
                    margin: 10px 0 10px 20px;
                    padding: 0;
               }
               
               .template-customize ul li {
                    width: 45px;
                    height: 30px;
                    overflow: hidden;
                    margin-bottom: 2px;
               }
               
               .template-customize ul li:hover {
                    cursor: pointer;
                    opacity: 0.8;
               }
          </style>-->
    </head>
    <body>
          <!-- Header -->
          <header id="header" class="clearfix">
               <!-- Logo -->
               <a href="index.html" class="logo shadowed">
                    Stray Baseball Admin Center | Mid-West Baseball League
               </a>
               
               <div class="dropdown profile-menu shadowed">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <img src="img/profile-pics/profile-pic.png" alt="" class="profile-pic">
                    </a>
                    <ul class="dropdown-menu pull-right text-right">
                         <li><a href="">Update Profile</a></li>
                         <li><a href="">Notifications & Updates</a></li>
                         <li><a href="">Settings</a></li>
                         <li class="divider"></li>
                         <li><a href="">Sign-Out</a></li>
                    </ul>
               </div>
               
               <ul class="nav nav-pills pull-right shadowed" id="top-menu">
                    <li><a href="#">Home</a></li>
                    <li class="dropdown">
                         <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                              <li><a href="">Action</a></li>
                              <li><a href="">Another action</a></li>
                              <li><a href="">Something else here</a></li>
                              <li class="divider"></li>
                              <li><a href="">Separated link</a></li>
                         </ul>
                    </li>
                    <li><a href="#">Users</a></li>
               </ul>
               
               <!-- TODO: Decide whether we actually want search -->
               <form class="form-inline top-search shadowed">
                    <input type="text" class="form-control" placeholder="Search for anything...">
                    <button type="submit"><i class="icon-search"></i></button>
               </form>
               
               <!-- TODO: Decide whether we actually want messaging/notifications -->
               <div class="updates shadowed pull-right">
                    <ul class="list-unstyled list-inline">
                         <li class="dropdown">
                              <a href="" data-toggle="dropdown" class="messages ttips" title="Messages" data-placement="bottom">
                                   <img src="img/message.png" alt="">
                              </a>
                              <div class="dropdown-menu">
                                   <div class="updates-header">
                                        <span class="pull-left">Inbox <a href="#">(45)</a></span>
                                        <span class="pull-right"><a href="">Send new</a></span>
                                        <div class="clearfix"></div>
                                   </div>
                                   <div class="listview overflow">
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 David Villa <span class="date">2 Hrs ago</span><br>
                                                 <span class="shortline">Lorem ipsum dolor sit amet, per cu sole...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Jason Statom <span class="date">5 Hrs ago</span><br>
                                                 <span class="shortline" class="shortline">Vandy come to ipsum seen tuooth ya so...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Lilly Jackson <span class="date">9 Hrs ago</span><br>
                                                 <span class="shortline" class="shortline">Far schools wen smoothness prope soom...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Vin Diesal <span class="date">06 Nov</span><br>
                                                 <span class="shortline" class="shortline">Dolor boom with your cool sindims to the...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Jason Statom <span class="date">5 Hrs ago</span><br>
                                                 <span class="shortline" class="shortline">Vandy come to ipsum seen tuooth ya so...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Lilly Jackson <span class="date">9 Hrs ago</span><br>
                                                 <span class="shortline" class="shortline">Far schools wen smoothness prope soom...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Vin Diesal <span class="date">06 Nov</span><br>
                                                 <span class="shortline" class="shortline">Dolor boom with your cool sindims to the...</span>
                                             </div>
                                        </a>
                                   </div>

                                   <div class="updates-footer">
                                        <a href="">See All</a>
                                   </div>
                              </div>
                         </li>
                         <li class="dropdown">
                              <a href="" class="notifications ttips" data-toggle="dropdown" title="Notifications" data-placement="bottom">
                                   <img src="img/updates.png" alt="">
                              </a>
                              <div class="dropdown-menu">
                                   <div class="updates-header">
                                        <span class="pull-left">Notifications</span>
                                        <span class="pull-right"><a href="">Settings</a></span>
                                        <div class="clearfix"></div>
                                   </div>
                                   
                                   <div class="listview overflow">
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 David Villa <span class="date">2 Hrs ago</span><br>
                                                 <span class="shortline">Lorem ipsum dolor sit amet, per cu sole...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Jason Statom <span class="date">5 Hrs ago</span><br>
                                                 <span class="shortline" class="shortline">Vandy come to ipsum seen tuooth ya so...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Lilly Jackson <span class="date">9 Hrs ago</span><br>
                                                 <span class="shortline" class="shortline">Far schools wen smoothness prope soom...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Vin Diesal <span class="date">06 Nov</span><br>
                                                 <span class="shortline" class="shortline">Dolor boom with your cool sindims to the...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Jason Statom <span class="date">5 Hrs ago</span><br>
                                                 <span class="shortline" class="shortline">Vandy come to ipsum seen tuooth ya so...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Lilly Jackson <span class="date">9 Hrs ago</span><br>
                                                 <span class="shortline" class="shortline">Far schools wen smoothness prope soom...</span>
                                             </div>
                                        </a>
                                        <a class="media" href="">
                                             <img class="media-object pull-left" src="img/profile-pics/1.jpg" alt="">
                                             <div class="media-body">
                                                 Vin Diesal <span class="date">06 Nov</span><br>
                                                 <span class="shortline" class="shortline">Dolor boom with your cool sindims to the...</span>
                                             </div>
                                        </a>
                                   </div>

                                   <div class="updates-footer">
                                        <a href="">See All</a>
                                   </div>
                              </div>
                         </li>
                    </ul>
               </div>
               
          </header>
          
          <section id="main" role="main">
               
               <!-- Left Sidebar -->
               <aside id="leftbar" class="pull-left">
                    <div class="sidebar-container">
                         <!-- Main Menu -->
                         <ul class="side-menu shadowed">
                              <li>
                                  <a class="active" href="index.php"><i class="icon-home"></i>Home</a>
                              </li>
                              <li>
                                 <a href="players.php"><i class="icon-user"></i>Players</a>
                              </li>
                              <li>
                                  <a href="teams.php"><i class="icon-users"></i>Teams</a>
                              </li>
                              <li>
                                  <a href="trade.php"><i class="icon-loop"></i>Trade</a>
                              </li>
                              <li class="submenu">
                                  <a href="draft.php"><i class="icon-numbered-list"></i>Draft</a>
                                  <ul>
                                       <li><a href="sidebar-widgets.html">Setup New Draft</a></li>
                                       <li><a href="content-widgets.html">Start Current Draft</a></li>
                                   </ul>
                              </li>
                              <li class="submenu">
                                   <a href=""><i class="icon-cog"></i>Admin Tools</a>
                                   <ul>
                                       <li><a href="sidebar-widgets.html">Users</a></li>
                                       <li><a href="content-widgets.html">Permissions</a></li>
                                       <li><a href="content-widgets.html">Calendar</a></li>
                                       <li><a href="content-widgets.html">To-Do List</a></li>
                                   </ul>
                              </li>
                         </ul>
                    </div>
                    <span id="leftbar-toggle" class="visible-xs sidebar-toggle">
                         <i class="icon-angle-right"></i>
                    </span>
               </aside>
               
               <!-- Right Sidebar -->
               <aside id="rightbar" class="pull-right">
                    <div class="sidebar-container">
                         <!-- Date + Clock -->
                         <div class="clock shadowed">
                              <div id="date"></div>
                              <div id="time">
                                   <span id="hours"></span>
                                   :
                                   <span id="min"></span>
                                   :
                                   <span id="sec"></span>
                              </div>
                         </div>
                         
                         <!-- Calendar -->
                         <div class="shadowed side-calendar">
                              <div id="sidebar-calendar"></div>
                         </div>
                         
                         <!-- Progress bar -->
                         <!-- TODO: Decide what to put here -->
                         <div class="shadowed side-progress">
                              <h3 class="title">Progress Bar</h3>
                              <div class="side-border">
                                   Joomla Website Development
                                   <div class="progress">
                                        <a href="#" data-toggle="tooltip" title="60%" class="yellow progress-bar ttips" style="width: 60%;">
                                             <span class="sr-only">60% Complete</span>
                                        </a>
                                   </div>
                              </div>
                              <div class="side-border">
                                   Opencart E-Commerce Website
                                   <div class="progress">
                                        <a href="#" data-toggle="tooltip" title="43%" class="green ttips progress-bar" style="width: 43%;">
                                             <span class="sr-only">43% Complete</span>
                                        </a>
                                   </div>
                              </div>
                              <div class="side-border">
                                   Social Media API
                                   <div class="progress">
                                        <a href="#" data-toggle="tooltip" title="81%" class="blue ttips progress-bar" style="width: 81%;">
                                             <span class="sr-only">81% Complete</span>
                                        </a>
                                   </div>
                              </div>
                              <div class="side-border">
                                   VB.Net Software Package
                                   <div class="progress">
                                        <a href="#" data-toggle="tooltip" title="10%" class="yellow ttips progress-bar" style="width: 10%;">
                                             <span class="sr-only">10% Complete</span>
                                        </a>
                                   </div>
                              </div>
                              <div class="side-border">
                                   Chrome Extension
                                   <div class="progress">
                                        <a href="#" data-toggle="tooltip" title="95%" class="ttips progress-bar red" style="width: 95%;">
                                             <span class="sr-only">95% Complete</span>
                                        </a>
                                   </div>
                              </div>
                         </div>
               
                         <!-- Counts -->
                         <ul class="counts shadowed">
                              <li>
                                  <span class="big-text">23500+</span>
                                  <span class="sub-text">Facebook Likes</span>
                              </li>
                              <li>
                                  <span class="big-text">125600+</span>
                                  <span class="sub-text">Twitter Followers</span>
                              </li>
                              <li>
                                  <span class="big-text">362</span>
                                  <span class="sub-text">Support Tickets</span>
                              </li>
                         </ul>

                         <!-- Notification -->
                         <div class="notification shadowed">
                              <ul class="tab">
                                   <li class="active">
                                        <a href="#inbox"><i class="icon-spinner-5"></i> Inbox</a>
                                   </li>
                                   <li>
                                        <a href="#notification"><i class="icon-earth"></i> Notifications</a>
                                   </li>
                              </ul>
                                 
                              <div class="tab-content">
                                   <div class="tab-pane active" id="inbox">
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/5.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">Hay I just talk to Wendy...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/2.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">We have something to do...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/4.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">How do you do...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/1.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">What's up buddy? I won't...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/3.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">Just check this up for...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        
                                        <a class="show-more" href="#">See All</a>
                                   </div>
                                   <div class="tab-pane" id="notification">
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/1.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">David responded to you...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/2.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">Wrndy like you post...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/3.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">Jonathan completed the task...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/5.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">Malinda responded to you...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/1.jpg" alt="">
                                             </a>
                                             <div class="media-body">
                                                  <a href="#">Henry poke you back...</a>
                                                  <small>4 hours ago</small>
                                             </div>
                                        </div>
                                        <a class="show-more" href="#">See All</a>
                                   </div>
                              </div>  
                         </div>
                    </div>
                    
                    <span id="rightbar-toggle" class="hidden-lg sidebar-toggle">
                         <i class="icon-angle-left"></i>
                    </span>
               </aside>