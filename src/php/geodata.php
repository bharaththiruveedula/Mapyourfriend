    <script>
      $(document).ready(function(){
        var name = '<?php echo $_SESSION['name'];?>';      
        var groupid = '<?php echo $_SESSION['groupid'];?>';
        $('#submit').click(function(){
                //console.log(name);
                var nickname = $('#nickname').val();
                var email = $('#email').val();
                $.ajax({
                    url : 'add_new_user.php',
                    type : "POST",
                    data : {name : name,groupid:groupid,nickname:nickname,email:email},
                    success : function(data){
                            if(data=='SUCCESS'){
                                $('#newuser').modal('hide');
                                alertify.log("You have successfully added "+nickname+" to your group");
                            }
                    },
                });
                return false;
        });
        $('#logout').click(function(){
            $.ajax("session.php")
                .done(function(){window.location.replace("http://localhost/Map-your-friend");}); 
        });
      });
    </script>
</head>
  <body style="font: 75% Lucida Grande, Trebuchet MS;margin:0">
      <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
              <div class="container">
                  <div class="nav-collapse">
                      <ul class="nav">
                          <li><a href="http://localhost/Map-your-friend">Welcome to Map Your Friend</a></li>
                          <li><a><?php echo $_SESSION['name'];?></a></li>
                          <li><a href="#newuser" data-toggle="modal" role="btn"b>Add a new user</a></li>
                      </ul>
                      <a class="btn btn-danger pull-right" id="logout">Log Out</a>
                  </div>
              </div>
          </div>
      </div>
      <div id="newuser" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="newuserLabel" aria-hidden="true">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="newuserLabel">Add a new User</h3>
          </div>
          <div class="modal-body">
              <form method="POST">
                  <label for="nickname">Nickname:</label>
                  <input type="text" id="nickname" name="nickname" placeholder="Enter the nick name"/>
                  <label for="email">Email:</label>
                  <input type="text" id="email" name="email" placeholder="Enter the email"/ >
          </div>
          <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              <button class="btn btn-primary" type="submit" id="submit">Add new user</button>
              </form>
          </div>
      </div>
