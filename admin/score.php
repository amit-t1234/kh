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
  

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="moderators.php">
          <i class="fas fa-gavel"></i>
          <span>Moderators</span></a>
      </li>
      <li class="nav-item active">
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
        <form action="include/moderator.inc.php" method="POST">
        <div class="row mt-3" style="color:black;font-weight:bold;">
             <div class="col-md-2">Active/Inactive</div>
             <div class="col-md-4">Item</div>
             <div class="col-md-4">Score</div>
           </div>
            <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" name="aadhar_number[]" value="true" /></div>
             <div class="col-md-4">Aadhar Number</div>
             <div class="col-md-4"><input class="form-control" type="number" name="aadhar_number[]" placeholder="50"/></div>
           </div>
           <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" name="first_name[]" value="true" /></div>
             <div class="col-md-4">Name</div>
             <div class="col-md-4"><input class="form-control" type="number" name="first_name[]" placeholder="50"/></div>
           </div>
                   <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" name="do[]b" value="true" /></div>
             <div class="col-md-4">Date of Birth</div>
             <div class="col-md-4"><input class="form-control" type="number" name="dob[]" placeholder="50"/></div>
           </div>
                   <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" name="gender[]" value="true" /></div>
             <div class="col-md-4">Gender</div>
             <div class="col-md-4"><input class="form-control" type="number" name="gender[]" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" name="email[]" value="true" /></div>
             <div class="col-md-4"> Email ID</div>
             <div class="col-md-4"><input class="form-control" type="number" name="email[]" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" name="phone[]" /></div>
             <div class="col-md-4"> Phone Number</div>
             <div class="col-md-4"><input class="form-control" type="number" name="phone[]" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" name="phone2[]" /></div>
             <div class="col-md-4"> Alternative Phone Number</div>
             <div class="col-md-4"><input class="form-control" type="number" name="phone2[]" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Company Name</div>
             <div class="col-md-4"><input class="form-control" type="number" name="company_name" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Company Nature</div>
             <div class="col-md-4"><input class="form-control" type="number" name="nature" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Incorporated On</div>
             <div class="col-md-4"><input class="form-control" type="number" name="incorporated_on" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Founder Count</div>
             <div class="col-md-4"><input class="form-control" type="number" name="founder_count" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Pitch Deck</div>
             <div class="col-md-4"><input class="form-control" type="number" name="pitch_deck" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Aadhar Image</div>
             <div class="col-md-4"><input class="form-control" type="number" name="aadhar_img" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Video</div>
             <div class="col-md-4"><input class="form-control" type="number" name="Video" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Images</div>
             <div class="col-md-4"><input class="form-control" type="number" name="image" placeholder="50"/></div>
           </div>
                   <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4">Sector</div>
             <div class="col-md-4"><input class="form-control" type="number" name="sector" placeholder="50"/></div>
           </div>
                   <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4">Category</div>
             <div class="col-md-4"><input class="form-control" type="number" name="category" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Idea</div>
             <div class="col-md-4"><input class="form-control" type="number" name="idea" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Solution To </div>
             <div class="col-md-4"><input class="form-control" type="number" name="solution_to" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> How it solves</div>
             <div class="col-md-4"><input class="form-control" type="number" name="your_solution" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Competitors</div>
             <div class="col-md-4"><input class="form-control" type="number" name="competitors" placeholder="50"/></div>
           </div>
                   <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4">Last Funding </div>
             <div class="col-md-4"><input class="form-control" type="number" name="last_funding" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Revenue</div>
             <div class="col-md-4"><input class="form-control" type="number" name="revenue" placeholder="50"/></div>
           </div>
                  <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Funds Needed</div>
             <div class="col-md-4"><input class="form-control" type="number" name="kuberan_house" placeholder="50"/></div>
           </div>
            <div class="row mt-3">
             <div class="col-md-2"><input type="checkbox" /></div>
             <div class="col-md-4"> Share offered</div>
             <div class="col-md-4"><input class="form-control" type="number" name="share" placeholder="50"/></div>
           </div>
           <button class="btn btn-lg btn-success">Apply</button>
         </form>
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
