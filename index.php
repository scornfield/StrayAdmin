<?php include('template/_top.php'); ?>
               
               <!-- Content -->
               <section id="content" class="container">
                    <!-- Shortcuts -->
                    <div class="shortcut-area">
                         <a class="shortcut" href="">
                              <i class="icon-user"></i>
                              <span class="title">Players</span>
                         </a>
                         <a class="shortcut" href="">
                              <i class="icon-users"></i>
                              <span class="title">Teams</span>
                         </a>
                         <a class="shortcut" href="">
                              <i class="icon-loop"></i>
                              <span class="title">Trades</span>
                              <span class="s-counts red">14</span>
                         </a>
                         <a class="shortcut" href="">
                              <i class="icon-numbered-list"></i>
                              <span class="title">Drafts</span>
                         </a>
                         <a class="shortcut" href="">
                              <i class="icon-calendar-2"></i>
                              <span class="title">Calendar</span>
                              <span class="s-counts blue">2</span>
                         </a>
                    </div>
                    
                    <!-- Main Graph -->
                    <div class="block">
                         <h2>League Statistics</h2>
                         <div class="config">                        
                              <a href="" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                   <i class="icon-loop-2"></i>
                              </a>
                              
                              <a href="" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                   <i class="icon-wrench"></i>
                              </a>
                         </div>
                         <div class="media">
                              <div class="pull-left sub-graph hidden-xs">
                                   <div class="sub-item">
                                        <div id="site-impressions" class="tiny-charts"></div>
                                        <small class="small">Admin Logins</small>
                                   </div>
                                   
                                   <div class="sub-item">
                                        <div id="site-bandwith" class="tiny-charts"></div>
                                        <small class="small">Total Changes</small>
                                   </div>
                                   
                                   <div class="sub-item">
                                        <div id="side-pie2" class="tiny-charts side-pie-tiny"></div>
                                        <div id="side-pie3" class="tiny-charts side-pie-tiny"></div>
                                        <small class="small">Percentage difference</small>
                                   </div>
                              </div>
                              <div id="areaChart" class="main-graph media-body"></div>
                         </div>
                         
                    </div>
                    
                    <div class="row m-container">
                         <!-- Today's Activity -->
                         <div class="col-md-6 masonry listview-block">
                              <div class="block">
                                   <h2>Today's Activity</h2>
                                   <div class="config">                        
                                        <a href="" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                             <i class="icon-loop-2"></i>
                                        </a>
                                        <a href="" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                             <i class="icon-wrench"></i>
                                        </a>
                                   </div>
                                  
                                   <div class="listview activity">
                                        <div class="media">
                                             <div class="number red pull-left">4</div>
                                             <div class="media-body">
                                                 <span>User Logins</span>
                                             </div>
                                        </div>

                                        <div class="media">
                                             <div class="number green pull-left">3</div>
                                             <div class="media-body">
                                                 <span>Trades</span>
                                             </div>
                                        </div>
                                        
                                        <div class="media">
                                             <div class="number blue pull-left">12</div>
                                             <div class="media-body">
                                                 <span>Player Updates</span>
                                             </div>
                                        </div>
                                        
                                        <div class="media">
                                             <div class="number yellow pull-left">1</div>
                                             <div class="media-body">
                                                 <span>Team Updates</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    
                         <!-- Recent Posts -->
                         <div class="col-md-6 masonry listview-block">
                              <div class="block">
                                   <h2>Latest League Activity</h2>
                                   <div class="config">                        
                                        <a href="" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                             <i class="icon-loop-2"></i>
                                        </a>
                                      
                                        <a href="" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                             <i class="icon-wrench"></i>
                                        </a>
                                   </div>
                                   
                                   <div class="listview">
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/2.jpg" alt="" class="poster-pic">
                                             </a>
                                             <div class="media-body">
                                                  <small>2 Hours before by <a href="#">Stray</a></small>
                                                  <a href="#" class="post-title">Updated Miguel Cabrera</a>
                                                  <div class="btn-group controls">
                                                       <a href="#" data-toggle="tooltip" data-original-title="Edit" class="ttips btn btn-gr-gray btn-xs"><i class="icon-pencil"></i></a> 
                                                  </div>
                                             </div>
                                        </div>
                                        
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/2.jpg" alt="" class="poster-pic">
                                             </a>
                                             <div class="media-body">
                                                  <small>4 Hours before by <a href="#">Stray</a></small>
                                                  <a href="#" class="post-title">Confirmed Trade between Detroit and Chicago</a>
                                             </div>
                                        </div>
                                        
                                        <div class="media">
                                             <a class="pull-left" href="#">
                                                  <img src="img/profile-pics/3.jpg" alt="" class="poster-pic">
                                             </a>
                                             <div class="media-body">
                                                  <small>2 Days ago by <a href="#">Steven Cornfield</a></small>
                                                  <a href="#" class="post-title">Created User: Stray</a>
                                                  <div class="btn-group controls">
                                                       <a href="#" data-toggle="tooltip" data-original-title="Edit" class="ttips btn btn-gr-gray btn-xs"><i class="icon-pencil"></i></a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         
                         <!-- Quick Post 
                         <div class="col-md-6 masonry">
                              <div class="block">
                                   <h2>Post an Article</h2>
                                   <div class="config">                        
                                        <a href="" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                             <i class="icon-loop-2"></i>
                                        </a>
                                        <a href="" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                             <i class="icon-wrench"></i>
                                        </a>
                                   </div>
                                   <form id="quick-post" class="block-body form-validation">
                                        <div class="form-group">
                                             <label for="articleTitle">Article Title</label>
                                             <input type="text" class="form-control input-sm validate[required] input-sm" id="articleTitle" placeholder="eg: My first post">
                                        </div>
                                        
                                        <div class="form-group">
                                             <label>Alias</label>
                                             <input type="text" class="form-control input-sm validate[required] input-sm" placeholder="eg: My-first-post">
                                        </div>
                                          
                                        <div class="form-group">
                                             <label>Category</label><br/>
                                             <select class="select" data-style="btn-gr-gray">
                                                  <option>Category 1</option>
                                                  <option>Category 2</option>
                                                  <option>Category 3</option>
                                                  <option>Category 4</option>
                                                  <option>Category 5</option>
                                                  <option>Category 6</option>
                                             </select>
                                        </div>
                                        
                                        <div class="form-group">
                                             <label for="post">Post</label>
                                             <textarea class="form-control input-sm validate[required] input-sm" id="post" placeholder="eg. Lorem ipsum dolor sit amet, consectetur adipiscing elit..."></textarea>
                                        </div>
     
                                        <input type="submit" class="btn btn-primary btn-xs" value="PUBLISH">
                                        <input type="submit" class="btn btn-success btn-xs" value="SAVE">
                                          
                                   </form>
                              </div>
                         </div>-->
                             
                         <!-- Todo List -->
                         <div class="col-md-6 masonry">
                              <div class="block">
                                   <h2>Todo Lists</h2>
                                   <div class="config">
                                        <a href="" data-original-title="Add&nbsp;New" class="ttips" data-toggle="modal" data-target="#addNew-todo">
                                            <i class="icon-plus add-new-todo"></i>
                                        </a>
                                        <a href="" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                            <i class="icon-loop-2"></i>
                                        </a>
                                        <a href="" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                            <i class="icon-wrench"></i>
                                        </a>
                                   </div>
                                   <div class="listview todo-list">
                                        <div class="media">
                                             <label class="pull-left">
                                                  <input class="check-all" type="checkbox" value="" checked>
                                             </label>
                                             <div class="media-body">
                                                 Nulla vel metus scelerisque ante sollicitudin commodo purus
                                                  <div class="list-options">
                                                      <button class="btn btn-gr-gray btn-sm">Delete</button>
                                                  </div>
                                             </div>
                                        </div>
       
                                       <div class="media">
                                             <label class="pull-left">
                                                   <input class="check-all" type="checkbox" value="">
                                             </label>
                                             <div class="media-body">
                                                 Per an error perpetua, fierent fastidii recteque ad pro. Mei id brute intellegam<br/>
                                                 <small> An erant explicari salutatus duo, sumo doming delicata in cum. Eos at augue viderer principes</small><br/>
                                             </div>
                                             <div class="list-options">
                                                 <button class="btn btn-gr-gray btn-sm">Delete</button>
                                             </div>
                                       </div>
                                       
                                       <div class="media">
                                             <label class="pull-left">
                                                   <input class="check-all" type="checkbox" value="">
                                             </label>
                                             <div class="media-body">
                                                 Inermis patrioque temporibus at ius, eos ei case partem blandit<br/>
                                                 <small>Sumo doming delicata in cum. Eos at augue viderer principes</small>
                                             </div>
                                             <div class="list-options">
                                                 <button class="btn btn-gr-gray btn-sm">Delete</button>
                                             </div>
                                       </div>
                                       
                                       <div class="media">
                                             <label class="pull-left">
                                                   <input class="check-all" type="checkbox" value="">
                                             </label>
                                             <div class="media-body">
                                                 Billa vel metus scelerisque ante sollicitudin commodo<br/>
                                                 <small>Lorem ipsum dolor sit amet, per cu solet docendi</small>
                                             </div>
                                             <div class="list-options">
                                                 <button class="btn btn-gr-gray btn-sm">Delete</button>
                                             </div>
                                       </div>
                                       
                                       <div class="media">
                                             <label class="pull-left">
                                                   <input class="check-all" type="checkbox" value="">
                                             </label>
         
                                             <div class="media-body">
                                                 Per an urbanitas elaboraret qui, et dicit sadipscing vel
                                             </div>
                                             <div class="list-options">
                                                 <button class="btn btn-gr-gray btn-sm">Delete</button>
                                             </div>
                                       </div>
                                       
                                       <div class="media">
                                             <label class="pull-left">
                                                   <input class="check-all" type="checkbox" value="">
                                             </label>
                                             <div class="media-body">
                                                 Per an error perpetua, fierent fastidii recteque ad pro<br/>
                                                 <small> An erant explicari salutatus duo, sumo doming delicata in cum. Eos at augue viderer principes</small><br/>
                                             </div>
                                             <div class="list-options">
                                                 <button class="btn btn-gr-gray btn-sm">Delete</button>
                                             </div>
                                       </div>
                                   </div>
                              </div>
                              
                              <!-- Add new todo list modal -->
                              <div class="modal fade" id="addNew-todo">
                                   <div class="modal-dialog modal-narrow">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                 <h4 class="modal-title">Add New Todo List</h4>
                                             </div>
                                             <form class="form-horizontal form-validation" role="form">
                                                  <div class="modal-body"> 
                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">Name</label>
                                                            <div class="col-md-10">
                                                                 <input type="text" class="form-control validate[required] input-sm" placeholder="...">
                                                            </div>
                                                      </div>
          
                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">Detail</label>
                                                            <div class="col-md-10">
                                                                 <textarea class="form-control auto-size input-sm" placeholder="Optional"></textarea>
                                                            </div>
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <button type="button" class="btn btn-sm" data-dismiss="modal">Cancel</button>
                                                       <input type="submit" class="btn btn-sm" value="Add">
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                          </div>

                         
                    </div>
               </section>
          </section>
          
<?php include('template/_bottom.php'); ?>