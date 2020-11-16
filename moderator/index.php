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
    <?php include_once 'nav.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include_once 'profile.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php include_once 'sections.php'; ?>
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">IDEATORS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ENTREPRENUER</a>
                    </li>
                 
                  </ul>
          <!-- Content Row --> 

          <!-- Content Row -->
                   <!-- Page Heading -->
                  

                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <!-- DataTales Example -->
                       <div class="card shadow mb-4">
                         <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Applications</h6>
                         </div>
                         <div class="card-body">
                           <div class="table-responsive">
                             <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                               <thead>
                                 <tr>
                                   <th>User Id</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Phone Number</th>
                                   <th>Second Phone Number</th>
                                   <th>Company Name</th>
                                 </tr>
                               </thead>
                               <tfoot>
                                 <tr>
                                   <th>User Id</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Phone Number</th>
                                   <th>Second Phone Number</th>
                                   <th>Company Name</th>
                                 </tr>
                               </tfoot>
                               <tbody>
                                <?php
                                  $stmt = $mysqli->prepare("SELECT COUNT(*) AS total_mods FROM moderator");
                                  $stmt->execute();
                                  $result = $stmt->get_result()->fetch_assoc();
                                  $total_mods = $result['total_mods'];
                                  $stmt = $mysqli->prepare("SELECT u.userid, type, first_name, last_name, email, phone, phone2, company_name, moderator FROM users u JOIN extras e ON u.userid = e.userid JOIN company c ON u.userid = c.userid JOIN profiles p ON c.userid = p.userid JOIN attachments a ON a.userid = u.userid JOIN business b ON b.userid = u.userid LEFT OUTER JOIN assigned asg ON u.userid = asg.userid AND sector=? ORDER BY created_on ASC");
                                  $stmt->bind_param('s', $_SESSION['sector']);                                  
                                  $stmt->execute();
                                  $result = $stmt->get_result();
                                  $i = 0;
                                  while($row = $result->fetch_assoc()) {
                                    if ($row['type'] == 'ideator' && ($row['moderator'] == $_SESSION['userid'] || ($row['moderator'] == NULL && $i % $total_mods == ($_SESSION['userid'] - 1)))) {
                                      if ($row['moderator'] == NULL) {
                                        $stmt = $mysqli->prepare("INSERT INTO assigned (userid, moderator) VALUES (?, ?)");
                                        $stmt->bind_param('ss', $row['userid'], $_SESSION['userid']);
                                        $stmt->execute();                                        
                                      }

                                ?>
                                  <tr>
                                    <td><a href="application.php?userid=<?php echo $row['userid']; ?>"><?php echo $row['userid']; ?></a></td>
                                    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['phone2']; ?></td>
                                    <td><?php echo $row['company_name']; ?></td>
                                  </tr>
                                <?php
                                  }
                                  $i++;  
                                  }                            
                                ?>
                               </tbody>
                             </table>
                           </div>
                         </div>
                       </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <!-- DataTales Example -->
                       <div class="card shadow mb-4">
                         <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Applications</h6>
                         </div>
                         <div class="card-body">
                           <div class="table-responsive">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                               <thead>
                                 <tr>
                                   <th>User Id</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Phone Number</th>
                                   <th>Second Phone Number</th>
                                   <th>Company Name</th>
                                 </tr>
                               </thead>
                               <tfoot>
                                 <tr>
                                   <th>User Id</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Phone Number</th>
                                   <th>Second Phone Number</th>
                                   <th>Company Name</th>
                                 </tr>
                               </tfoot>
                               <tbody>
                                <?php
                                  $stmt = $mysqli->prepare("SELECT u.userid, type, first_name, last_name, email, phone, phone2, company_name, moderator FROM users u JOIN extras e ON u.userid = e.userid JOIN company c ON u.userid = c.userid JOIN profiles p ON c.userid = p.userid JOIN attachments a ON a.userid = u.userid JOIN business b ON b.userid = u.userid LEFT OUTER JOIN assigned asg ON u.userid = asg.userid AND sector=? ORDER BY created_on ASC");
                                  $stmt->bind_param('s', $_SESSION['sector']);                                  
                                  $stmt->execute();
                                  $result = $stmt->get_result();
                                  $i = 0;
                                  while($row = $result->fetch_assoc()) {
                                    if ($row['type'] == 'entreprenuer' && ($row['moderator'] == $_SESSION['userid'] || ($row['moderator'] == NULL && $i % $total_mods == ($_SESSION['userid'] - 1)))) {
                                      if ($row['moderator'] == NULL) {
                                        $stmt = $mysqli->prepare("INSERT INTO assigned (userid, moderator) VALUES (?, ?)");
                                        $stmt->bind_param('ss', $row['userid'], $_SESSION['userid']);
                                        $stmt->execute();                                        
                                      }

                                ?>
                                  <tr>
                                    <td><a href="application.php?userid=<?php echo $row['userid']; ?>"><?php echo $row['userid']; ?></a></td>
                                    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['phone2']; ?></td>
                                    <td><?php echo $row['company_name']; ?></td>
                                  </tr>
                                <?php
                                  }
                                  $i++;  
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
</body>

</html>
