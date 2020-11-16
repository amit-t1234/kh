<?php 
  session_start();

  include_once 'include/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KH</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        
        <div class="sidebar-brand-text mx-3"><img class="img-fluid" src="img/logo.png"> </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
           <!-- Topbar -->
           <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>
            </form>
  
       
  
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
  
             
  
     
  
              <!-- Nav Item - Messages -->
               
  
              <div class="topbar-divider d-none d-sm-block"></div>
  
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
  
            </ul>
  
          </nav>
        <!-- End of Topbar -->
      <div class="container pb-3">
        <form action="include/score.inc.php" method="POST">
        <div class="row mt-3" style="color:black;font-weight:bold;">
             <div class="col-md-4">Field</div>
             <div class="col-md-4">Value</div>
             <div class="col-md-4">Score</div>
           </div>
            <?php
              $stmt = $mysqli->prepare("SELECT * FROM score WHERE track=1");
              $stmt->execute();
              $result = $stmt->get_result();
              $score = $result->fetch_assoc();
              $stmt = $mysqli->prepare("SELECT * FROM score WHERE track=?");
              $stmt->bind_param('s', $_GET['userid']);              
              $stmt->execute();
              $result = $stmt->get_result();
              $get = $result->fetch_assoc();                           
              $stmt = $mysqli->prepare("SELECT * FROM Users u JOIN Extras e ON u.userid = e.userid AND u.userid=? JOIN company c ON u.userid = c.userid JOIN Profiles p ON c.userid = p.userid JOIN Attachments a ON a.userid = u.userid JOIN Business b ON b.userid = u.userid AND sector=? ORDER BY created_on ASC");
              $stmt->bind_param('ss', $_GET['userid'], $_SESSION['sector']);
              $stmt->execute();
              $result = $stmt->get_result();
              $row = $result->fetch_assoc();
            ?> 
            <?php if ($score['first_name']) { ?>         
              <div class="row mt-3">
               <div class="col-md-4">Name</div>
               <div class="col-md-4"><?php echo $row["first_name"].' '.$row["last_name"] ?></div>
               <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['first_name']))? $get['first_name']: 0; ?>" max="<?php echo $score['first_name']; ?>" name="first_name"> / <?php echo $score['first_name']; ?> </div>
             </div>
           <?php } ?>
            <?php if ($score['type']) { ?>         
              <div class="row mt-3">
               <div class="col-md-4">Type</div>
               <div class="col-md-4"><?php echo $row["type"] ?></div>
               <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['type']))? $get['type']: 0; ?>" max="<?php echo $score['type']; ?>" name="type"> / <?php echo $score['type']; ?> </div>
             </div>
           <?php } ?>           
            <?php if ($score['dob']) { ?>                    
              <div class="row mt-3">
               <div class="col-md-4">Date of Birth</div>
               <div class="col-md-4"><?php echo $row["dob"] ?></div>
               <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['dob']))? $get['dob']: 0; ?>" max="<?php echo $score['dob']; ?>" name="dob"> / <?php echo $score['dob']; ?> </div>
              </div>
            <?php } ?>
            <?php if ($score['gender']) { ?>                    
              <div class="row mt-3">
                <div class="col-md-4">Gender</div>
                <div class="col-md-4"><?php echo $row["gender"] ?></div>
                <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['gender']))? $get['gender']: 0; ?>" max="<?php echo $score['gender']; ?>" name="gender"> / <?php echo $score['gender']; ?> </div>
              </div>
            <?php } ?>
            <?php if ($score['email']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Email ID</div>
             <div class="col-md-4"><?php echo $row["email"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['email']))? $get['email']: 0; ?>" max="<?php echo $score['email']; ?>" name="email"> / <?php echo $score['email']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['phone']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Phone Number</div>
             <div class="col-md-4"><?php echo $row["phone"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['phone']))? $get['phone']: 0; ?>" max="<?php echo $score['phone']; ?>" name="phone"> / <?php echo $score['phone']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['phone2']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Alternative Phone Number</div>
             <div class="col-md-4"><?php echo $row["phone2"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['phone2']))? $get['phone2']: 0; ?>" max="<?php echo $score['phone2']; ?>" name="phone2"> / <?php echo $score['phone2']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['company_name']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Company Name</div>
             <div class="col-md-4"><?php echo $row["company_name"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['company_name']))? $get['company_name']: 0; ?>" max="<?php echo $score['company_name']; ?>" name="company_name"> / <?php echo $score['company_name']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['nature']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Company Nature</div>
             <div class="col-md-4"><?php echo $row["nature"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['nature']))? $get['nature']: 0; ?>" max="<?php echo $score['nature']; ?>" name="nature"> / <?php echo $score['nature']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['incorporated_on']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Incorporated On</div>
             <div class="col-md-4"><?php echo $row["incorporated_on"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['incorporated_on']))? $get['incorporated_on']: 0; ?>" max="<?php echo $score['incorporated_on']; ?>" name="incorporated_on"> / <?php echo $score['incorporated_on']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['founders_count']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Founder Count</div>
             <div class="col-md-4"><?php echo $row["founders_count"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['founders_count']))? $get['founders_count']: 0; ?>" max="<?php echo $score['founders_count']; ?>" name="founders_count"> / <?php echo $score['founders_count']; ?> </div>
           </div>
         <?php } ?>
<!--             <div class="row mt-3">

             <div class="col-md-4"> Pitch Deck</div>
             <div class="col-md-4"><?php echo $row["pitch_deck"] ?></div>
             <div class="col-md-4"><input type="number" name="score"> / 50 </div>
           </div>
            <div class="row mt-3">

             <div class="col-md-4"> Aadhar Image</div>
             <div class="col-md-4"><?php echo $row["aadhar_img"] ?></div>
             <div class="col-md-4"><input type="number" name="score"> / 50 </div>
           </div>
            <div class="row mt-3">

             <div class="col-md-4"> Video</div>
             <div class="col-md-4"><?php echo $row["video"] ?></div>
             <div class="col-md-4"><input type="number" name="score"> / 50 </div>
           </div>
            <div class="row mt-3">

             <div class="col-md-4"> Images</div>
             <div class="col-md-4"><?php echo $row["image"] ?></div>
             <div class="col-md-4"><input type="number" name="score"> / 50 </div>
           </div> -->
            <?php if ($score['sector']) { ?>           
             <div class="row mt-3">
             <div class="col-md-4">Sector</div>
             <div class="col-md-4"><?php echo $row["sector"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['sector']))? $get['sector']: 0; ?>" max="<?php echo $score['sector']; ?>" name="sector"> / <?php echo $score['sector']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['category']) { ?>           
             <div class="row mt-3">

             <div class="col-md-4">Category</div>
             <div class="col-md-4"><?php echo $row["category"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['category']))? $get['category']: 0; ?>" max="<?php echo $score['category']; ?>" name="category"> / <?php echo $score['category']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['idea']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Idea</div>
             <div class="col-md-4"><?php echo $row["idea"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['idea']))? $get['idea']: 0; ?>" max="<?php echo $score['idea']; ?>" name="idea"> / <?php echo $score['idea']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['solution_to']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Solution To </div>
             <div class="col-md-4"><?php echo $row["solution_to"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['solution_to']))? $get['solution_to']: 0; ?>" max="<?php echo $score['solution_to']; ?>" name="solution_to"> / <?php echo $score['solution_to']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['your_solution']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> How it solves</div>
             <div class="col-md-4"><?php echo $row["your_solution"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['your_solution']))? $get['your_solution']: 0; ?>" max="<?php echo $score['your_solution']; ?>" name="your_solution"> / <?php echo $score['your_solution']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['competitors']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Competitors</div>
             <div class="col-md-4"><?php echo $row["competitors"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['competitors']))? $get['competitors']: 0; ?>" max="<?php echo $score['competitors']; ?>" name="competitors"> / <?php echo $score['competitors']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['last_funding']) { ?>           
              <div class="row mt-3">

             <div class="col-md-4">Last Funding </div>
             <div class="col-md-4"><?php echo $row["last_funding"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['last_funding']))? $get['last_funding']: 0; ?>" max="<?php echo $score['last_funding']; ?>" name="last_funding"> / <?php echo $score['last_funding']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['revenue']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Revenue</div>
             <div class="col-md-4"><?php echo $row["revenue"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['revenue']))? $get['revenue']: 0; ?>" max="<?php echo $score['revenue']; ?>" name="revenue"> / <?php echo $score['revenue']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['kuberan_house']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Funds Needed</div>
             <div class="col-md-4"><?php echo $row["kuberan_house"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['kuberan_house']))? $get['kuberan_house']: 0; ?>" max="<?php echo $score['kuberan_house']; ?>" name="kuberan_house"> / <?php echo $score['kuberan_house']; ?> </div>
           </div>
         <?php } ?>
            <?php if ($score['share']) { ?>           
            <div class="row mt-3">

             <div class="col-md-4"> Share offered</div>
             <div class="col-md-4"><?php echo $row["share"] ?></div>
             <div class="col-md-4"><input type="number" min="0" value="<?php echo (isset($get['share']))? $get['share']: 0; ?>" max="<?php echo $score['share']; ?>" name="share"> / <?php echo $score['share']; ?> </div>
           </div>
         <?php } ?>
          <input type="hidden" name="track" value="<?php echo $row['userid']; ?>">
           <button name="submit" value="submit" class="btn btn-lg btn-success">Submit</button>
           <button name="submit" value="escalate" class="btn btn-lg btn-primary">Escalate</button>
        </div>
        <!-- Begin Page Content -->
    
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Kuberan's House 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
    <!-- Bootstrap core JavaScript--> 
  
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

  <script type="text/javascript">
        
  </script>

</body>

</html>
