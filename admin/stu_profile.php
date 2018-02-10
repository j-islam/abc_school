<?php
session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['pass'])){
  header('Location: ../index.php');
}


else {
  include("dbconfig.php");

  $admin_id = $_SESSION['id'];
  $admin_pass = $_SESSION['pass'];

  $sql = "SELECT * FROM admin_login WHERE id = '$admin_id' AND pass = '$admin_pass' ";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) <= 0) {
    session_unset();
    session_destroy();
    header('Location: ../loginprocess.php');
  }
mysqli_close($conn);
}
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
if (isset($_GET['id'])) {
  $sid = $_GET['id'];
  include("dbconfig.php");
  $sql = "SELECT * FROM present_student WHERE sid = '$sid'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<title>".$row['fname']." ".$row['lname']." - ABC School</title>";
    }
  }
}
else {
  echo "<title>Invalid User - ABC School</title>";
}
  ?>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><img src="images/abc_logo.png" alt="ABC School" style="width:67px;height:45px;"><span>ABC School</span></a>
            </div>

            <div class="clearfix"></div>


            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-user"></i> Stuffs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Teaching Stuffs</a></li>
                      <li><a>Genaral Stuffs</a></li>
                      <li><a>Add Stuffs</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-mortar-board"></i> Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>Present Students<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="stu_c06_view.php">Class 06</a>
                            </li>
                            <li><a href="stu_c07_view.php">Class 07</a>
                            </li>
                            <li><a href="stu_c08_view.php">Class 08</a>
                            </li>
                            <li><a href="stu_c09_view.php">Class 09</a></li>
                            <li><a href="stu_c10_view.php">Class 10</a></li>
                          </ul>
                        </li>
                        <li><a href="applied_students.php">Applied Students</span></a></li>
                        <li><a href="add_student.php">Add Student</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-calculator"></i> Payments <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a >Stuffs <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="payment_stuff_teaching.php">Teaching Stuff</a>
                            </li>
                            <li><a href="payment_stuff_genaral.php">Genaral Stuff</a>
                            </li>
                          </ul>
                        </li>
                      <li><a>Students</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart"></i> Results <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="stu_result_c06.php">Class 06</a></li>
                      <li><a href="stu_result_c07.php">Class 07</a></li>
                      <li><a href="stu_result_c08.php">Class 08</a></li>
                      <li><a href="stu_result_c09.php">Class 09</a></li>
                      <li><a href="stu_result_c10.php">Class 10</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              
              <div class="menu_section">
                <h3>Notices</h3>
                <ul class="nav side-menu">
                  <li><a href="notice.php"><i class="fa fa-bullhorn"></i> All Notices</a></li>
                  <li><a><i class="fa fa-plus"></i> Update Notice</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt="">Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>

        

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Student Profile</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
              <?php
              if (isset($_GET['id'])) {
                $sid = $_GET['id'];

                include("dbconfig.php");
                $sql = "SELECT * FROM present_student WHERE sid = '$sid'" or die(mysqli_error());
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) < 0){
                  die("<h3>Invalid ID, Try again!</h3>");
                }
              }
              else {
                die("<h3>Invalid user, Try again!</h3>");
              }
                ?>

                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <img class="img-responsive avatar-view" src="<?php  echo "getprofileimage.php?id=$sid";?>" alt="Avatar">
                        </div>
                      </div>

                      <?php
                      function bdayCalculate($data){
                        $data = (date('Y') - date('Y',strtotime($data)));
                        echo $data." years old";
                        return;
                      }

                      function getFullClassName($data){
                        switch ($data) {
                          case 'c06':
                            echo "<a href='stu_result_c06.php'>Class 06</a>";
                            return;
                          case 'c07':
                            echo "<a href='stu_result_c07.php'>Class 07</a>";
                            return;
                          case 'c08':
                            echo "<a href='stu_result_c08.php'>Class 08</a>";
                            return;
                          case 'c09':
                            echo "<a href='stu_result_c09.php'>Class 09</a>";
                            return;
                          case 'c10':
                            echo "<a href='stu_result_c10.php'>Class 10</a>";
                            return;
                        }
                      }

                      function getClassNo($data){
                        $data = substr($data, 1);
                        return $data;
                      }

                      $sql = "SELECT * FROM present_student WHERE sid = '$sid'" or die(mysqli_error());
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {
                          $classNo = getClassNo($row['chooseclass']);
                          echo "<h3>".$row['fname']." ".$row['lname']."</h3>";
                          echo "<ul class='list-unstyled user_data'>
                        <li><h4><i class='fa fa-mortar-board user-profile-icon'></i> ".$row['sid']."</h4></li>
                        <li><h4><i class='fa fa-university user-profile-icon'></i> ";
                        getFullClassName($row['chooseclass']);
                        echo "</h4></li>
                        <li><i class='fa fa-user user-profile-icon'></i> ";
                        bdayCalculate($row['birthday']);
                        echo "</li>
                        <li><i class='fa fa-map-marker user-profile-icon'></i> ".$row['presentadrs']."</li>
                        <li class='m-top-xs'>
                          <i class='fa fa-phone user-profile-icon'></i> ".$row['phoneno']."
                        </li>
                      </ul>";
                        }
                      }
                        ?>

                      <a class="btn btn-success"><i class="fa fa-paper-plane m-right-xs"></i> Message</a>
                      <br />

                      <h4>Skills</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                        <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation & Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul>

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Marks</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Payments</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Detailed Info</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Subject Code</th>
                                  <th>CT01</th>
                                  <th>Mid Term</th>
                                  <th>CT02</th>
                                  <th>Assignment</th>
                                  <th>Final Term</th>
                                  <th>Condition</th>
                                </tr>
                              </thead>
                              <tbody>

                              <?php
                              function passORfail($data){
                              $data = floatval($data);
                              if ($data >= 40) {
                                $passed = "class = 'progress-bar progress-bar-success'  data-transitiongoal = '$data'";
                                return;
                              }
                              else {
                                $failed = "class = 'progress-bar progress-bar-danger'  data-transitiongoal = '$data'";
                                return;
                                }
                              }
                              function selectSub($data1, $data2, $id){
                                $subCode = $data1 . $data2;
                                $lowSubCode = strtolower($subCode);
                                $year = date("Y");
                                $grade_conn= mysqli_connect("localhost","root","") or die ("could not connect to MySQL!"); 

                                mysqli_select_db($grade_conn, "abc_school_grades") or die ("no Database");

                                $sql1 = "SELECT * FROM $lowSubCode WHERE sid = '$id' AND year = '$year'";
                                $grades = mysqli_query($grade_conn, $sql1) or die(mysqli_error());

                                if(mysqli_num_rows($grades) > 0){
                                  while ($row = mysqli_fetch_assoc($grades)) {
                                    $totalMarks = floatval($row['ct1']) + floatval($row['ct2']) + floatval($row['mid']) + floatval($row['assign']);
                                    echo "
                                    <tr>
                                    <td>$subCode</td>
                                    <td>".$row['ct1']."</td>
                                    <td>".$row['mid']."</td>
                                    <td>".$row['ct2']."</td>
                                    <td>".$row['assign']."</td>
                                    <td>".$row['final']."</td>
                                    <td class='vertical-align-mid'>
                                      <div class='progress'>
                                        <div "; passORfail($totalMarks);
                                    echo "></div>
                                      </div>
                                      <small>Total Marks : $totalMarks</small>
                                    </td>
                                  </tr>";
                                  return;
                                  }
                                }
                              }

                              selectSub("BNG", $classNo, $sid);
                              selectSub("ENG", $classNo, $sid);
                              selectSub("MAT", $classNo, $sid);
                              selectSub("SOC", $classNo, $sid);
                              selectSub("SCI", $classNo, $sid);
                                ?>
                                
                              </tbody>
                            </table>

                            <div class="row no-print">
                              <div class="col-xs-12">
                                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                <button onclick="location.href = 'report_generate.php?id=<?php echo $sid; ?>'" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Report Card</button>
                              </div>
                            </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <ul class="messages">
                              <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">24</h3>
                                  <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading">Desmond Davison</h4>
                                  <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                  <br />
                                  <p class="url">
                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                    <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                  </p>
                                </div>
                              </li>
                              <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading">Brian Michaels</h4>
                                  <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="#" data-original-title="">Download</a>
                                  </p>
                                </div>
                              </li>
                              <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">24</h3>
                                  <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading">Desmond Davison</h4>
                                  <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                  <br />
                                  <p class="url">
                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                    <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                  </p>
                                </div>
                              </li>
                            </ul>

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <table class="table">
                              <tbody>
                              <?php
                              $year = date("Y");
                              $grade_conn= mysqli_connect("localhost","root","") or die ("could not connect to MySQL!"); 

                              mysqli_select_db($grade_conn, "abc_school") or die ("no Database");

                              $sql1 = "SELECT * FROM present_student WHERE sid = '$sid' AND year = '$year'";
                              $grades = mysqli_query($grade_conn, $sql1) or die(mysqli_error());

                              if(mysqli_num_rows($grades) > 0){
                                while ($row = mysqli_fetch_assoc($grades)) {
                                  echo "
                                  <tr>
                                  <th>Student ID</th>
                                  <td>".$row['sid']."</td>
                                  </tr>
                                  <tr>
                                  <th>First Name</th>
                                  <td>".$row['fname']."</td>
                                  </tr>
                                  <tr>
                                  <th>Last Name</th>
                                  <td>".$row['lname']."</td>
                                  </tr>
                                  <tr>
                                  <th>Gender</th>
                                  <td>".$row['gender']."</td>
                                  </tr>
                                  <tr>
                                  <th>Phone No</th>
                                  <td>".$row['phoneno']."</td>
                                  </tr>
                                  <tr>
                                  <th>Email Address</th>
                                  <td>".$row['email']."</td>
                                  </tr>
                                  <tr>
                                  <th>Birthday</th>
                                  <td>".$row['birthday']."</td>
                                  </tr>
                                  <tr>
                                  <th>Father's Name</th>
                                  <td>".$row['fathersname']."</td>
                                  </tr>
                                  <tr>
                                  <th>Mother's Name</th>
                                  <td>".$row['mothersname']."</td>
                                  </tr>
                                  <tr>
                                  <th>Present Address</th>
                                  <td>".$row['presentadrs']."</td>
                                  </tr>
                                  <tr>
                                  <th>Parmanent Address</th>
                                  <td>".$row['permanentadrs']."</td>
                                  </tr>
                                  <tr>
                                  <th>Profile updated at</th>
                                  <td>".$row['timestamp']."</td>
                                  </tr>
                                  ";
                                }
                              }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ABC School Web Application - Developed by Prosenjit Chowdhury.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>