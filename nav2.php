   <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
		
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
          <img  "type="image/png" width=60px height=50px src="favicon.png" style="padding-right:5px"></img>
		  <a class="navbar-brand" href="Dashboard.php">Edubase</a>
        </div>
		
		
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="Dashboard.php">Home</a></li>
           <!-- <li><a href="timetable.php">TIme-table</a></li>
			  <li><a href="schedule.php">Exam-Schedule</a></li>
			  -->
				<li><a href="notices.php">Notice-Board</a></li>
			    <li><a href="discussion.php">Discussion</a></li>
				  <li><a href="feedback_signup.php">Feedbacks</a></li>
				  <li><a href="send_message.php">Send Message</a></li>
				  <li><a href="downloads.php">Downloads</a></li>
				  <?php
				if($_SESSION['role']=='teacher')
					echo '<li><a href="analysis.php">Analysis</a></li>';
				?>
				      <li><a href="aboutus.php">About us</a></li>
                <li><a href="contactus.php">Contact us</a></li>
				
		
				
				
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
              <ul class="dropdown-menu">
			     <li><a href="#"><font style="text-transform: capitalize;">Hi <?php echo $_SESSION['username']?> .!</font></a></li>
				 <li><a href="display_inbox.php">View Inbox</a></li>
				 <li><a href="display.php">View Profile</a></li>
                <li><a href="
				<?php
				if($_SESSION['role']=='student')
					echo "student_edit.php";
				else
					echo "teacher_edit.php";
				?>
				">Edit Profile</a></li>
		
                <li class="divider"></li>
				<li><a href="logout.php">Logout</a></li>
				   <li class="divider"></li>
				<li><a href="delete_account.php">Delete Account</a></li>
              </ul>
            </li>
			  
          </ul>
        </div><!--/.nav-collapse -->
		
      </div>
    </nav>
		