<?php 
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
      <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
  

      <li class="nav-item active">
        <a class="nav-link" href="moderators.php">
        <i class="fas fa-gavel"></i>
          <span>Moderators</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="score.php">
        <i class="fas fa-sort-numeric-up-alt"></i>
          <span>Score</span></a>
      </li>


    

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
            <div class="row">
               <h3 class="col-md-12" style="color:black">Add Moderator </h3>
               <form action="include/signup.inc.php" class="w-100" method="POST">
                 <div class="form-group col-md-6">
                      <label>Name</label>
                      <input class="form-control" type="text" name="name" placeholder="Name"/>
                  </div>
                  <div class="col-md-6"></div>
                  <div class="form-group col-md-6">
                      <label>Email ID</label>
                      <input class="form-control" type="email" name="email" placeholder="Email ID"/>
                  </div>
                  <div class="col-md-6"></div>
                  <div class="form-group col-md-6">
                      <label>Password</label>
                      <input class="form-control" type="password" name="password" placeholder="Password"/>
                  </div>
                  <div class="col-md-6"></div>
                  <div class="form-group col-md-6">
                      <label>Sector</label><br>
                      <select name="sector">
                          <option value="Agriculture">AGRICULTURE</option>
                          <option value="Auto & Transportation">AUTO & TRANSPORTATION</option>
                          <option value="Cleantech">CLEANTECH</option>
                          <option value="Consumer">CONSUMER</option>
                          <option value="Education">EDUCATION</option>
                          <option value="Hardware">HARDWARE</option>
                          <option value="Food"> FOOD</option>
                          <option value="Fashion">FASHION</option>
                          <option value="Fintech">FINTECH</option>
                          <option value="Lifescience">LIFESCIENCES</option>
                          <option value="Manufacturing">MANUFACTURING</option>
                          <option value="Media"> MEDIA </option>
                          <option value="Real estate">REAL ESTATE</option>
                          <option value="Services">SERVICES</option>
                          <option value="Logistics">LOGISTICS</option>
                          <option value="Tech / Software">TECH/SOFTWARE</option>
                          <option value="Retail">RETAIL</option>
                          <option value="Automation">AUTOMATION</option>
                          <option value="Others">OTHERS</option>
                      </select>
                  </div>
                  <div class="col-md-6"></div>
                  <div class="col-md-12">
                    <button name="submit" class="btn btn-success"><i class="fas fa-plus"></i> Add </button>
                  </div>                 
               </form>
           </div>
       </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>Copyright &copy; Startup India - Gujrat 2020</span>
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
