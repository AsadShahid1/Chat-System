<?Php                  
  include 'db.php';
  $obj = new Database('batch' , 'chat_system');
  $users = $obj->chat_user();
  $obj1 = new Database('batch' , 'groups');
  $groups = $obj1->chat_user();
  
   ?>
  




<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="user.css">
<link rel="shortcut icon" href="../img/online-form.png" type="image/x-icon">
<title>Chatting Form</title>
</head>
<body>
<div class="container mt-5">
<h3 class=" text-center">Chat System</h3>
<div class="messaging">
      <div class="inbox_msg">  
      <div class="inbox_people">
          <div class="headind_srch">
          <nav class="navbar row navbar-dark bg-dark">
            <a class="navbar-brand col-4">CHAT APP</a>
            <input class="form-control col-4" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success col-3" type="submit">Search</button>            
        </nav>
          </div>

      <div class="container">
        <br>
           <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#cam"><i class="fa fa-camera"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">USERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">GROUPS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#status">STATUS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">CALLS</a>
          </li>
        </ul>
         
           <!-- Tab panes -->
      <div class="tab-content">
             <div id="cam" class="container tab-pane fade"><br>
               <h3>camera</h3>
               <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
             </div>
             <div id="home" class="container tab-pane active"><br>
             <div class="inbox_chat">
                     <?php
                         foreach($users as $user){
                     ?>
                
                  <div class="chat_list chat_user" data-id="<?= $user['id'] ?>" data-name="<?= $user['first'] . " " .$user['last']?>">
                    <div class="chat_people">
                      <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                      <div class="chat_ib">
                        <h5><?= $user['first']." ".$user['last'] ?> <span class="chat_date">Dec 25</span></h5>
                        <p>Test, which is a new approach to have all solutions 
                          astrology under one roof.</p>
                      </div>
                    </div>
                  </div>  
            <?php
                }
            ?>
          </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>groups</h3>
      <div class="inbox_chat">
                     <?php
                         foreach($groups as $group){
                     ?>
                
                  <div class="chat_list group_list" data-id="<?= $group['id'] ?>" data-name="<?= $group['name'] ?>">
                    <div class="chat_people">
                      <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                      <div class="chat_ib">
                        <h5><?= $group['name'] ?> <span class="chat_date">Dec 25</span></h5>
                        <p>Test, which is a new approach to have all solutions 
                          astrology under one roof.</p>
                      </div>
                    </div>
                  </div>  
            <?php
                }
            ?>
          </div>
      <button type="button" class="btn btn-outline-success text-white"><a href="groupcreate.php">Create Group</a></button>
    </div>
    <div id="status" class="container tab-pane fade"><br>
      <h3>status</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>calls</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>

        </div>
         
        <div class="mesgs">
          <div class="user_log">

          </div>
          <hr>
          <div class="msg_history">
            
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="hidden" id="rec_id">
              <input type="text" class="write_msg" id="message" placeholder="Type a message" />
              <button class="msg_send_btn msg_group_btn" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <p class="text-center top_spac"> Design by <a target="_blank" href="https://www.linkedin.com/in/sunil-rajput-nattho-singh/">Asad Shahid</a></p>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="chatsignup.js"></script>

    </body>
   
    </html>

