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
          <div>
            <div class="filters text-right" style="margin-top: -45px;"><a  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-filter"></i> &nbsp; Filters </a></div>
            <br>
            <div class="collapse row" style="padding: 0px 30px 20px 30px;" id="collapseExample">
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="0" type="checkbox" id="inlineCheckbox0" value="option1" checked>
              <label class="form-check-labe" for="inlineCheckbox0">User Id</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="1" type="checkbox" id="inlineCheckbox1" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox1">Name</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="2" type="checkbox" id="inlineCheckbox2" value="option1">
              <label class="form-check-label" for="inlineCheckbox2">Dob</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="3" type="checkbox" id="inlineCheckbox3" value="option1">
              <label class="form-check-label" for="inlineCheckbox3">Gender</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="4" type="checkbox" id="inlineCheckbox4" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox4">Email</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="5" type="checkbox" id="inlineCheckbox5" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox5">Phone Number</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="6" type="checkbox" id="inlineCheckbox6" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox6">Second Phone Number</label>
            </div><br>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="7" type="checkbox" id="inlineCheckbox7" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox7">Company Name</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="8" type="checkbox" id="inlineCheckbox8" value="option1">
              <label class="form-check-label" for="inlineCheckbox8">Nature</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="9" type="checkbox" id="inlineCheckbox9" value="option1">
              <label class="form-check-label" for="inlineCheckbox9">Incorporated On</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="10" type="checkbox" id="inlineCheckbox10" value="option1">
              <label class="form-check-label" for="inlineCheckbox10">Founder Count</label>
            </div><br>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="11" type="checkbox" id="inlineCheckbox11" value="option1">
              <label class="form-check-label" for="inlineCheckbox11">Pitch Deck</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="12" type="checkbox" id="inlineCheckbox12" value="option1">
              <label class="form-check-label" for="inlineCheckbox12">Aadhar Image</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="13" type="checkbox" id="inlineCheckbox13" value="option1">
              <label class="form-check-label" for="inlineCheckbox13">Videos</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="14" type="checkbox" id="inlineCheckbox14" value="option1">
              <label class="form-check-label" for="inlineCheckbox14">Images</label>
            </div><br>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="15" type="checkbox" id="inlineCheckbox15" value="option1">
              <label class="form-check-label" for="inlineCheckbox15">Sector</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="16" type="checkbox" id="inlineCheckbox16" value="option1">
              <label class="form-check-label" for="inlineCheckbox16">Category</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="17" type="checkbox" id="inlineCheckbox17" value="option1">
              <label class="form-check-label" for="inlineCheckbox17">Idea</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="18" type="checkbox" id="inlineCheckbox18" value="option1">
              <label class="form-check-label" for="inlineCheckbox18">Solution To?</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="19" type="checkbox" id="inlineCheckbox19" value="option1">
              <label class="form-check-label" for="inlineCheckbox19">How It Solves?</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="20" type="checkbox" id="inlineCheckbox20" value="option1">
              <label class="form-check-label" for="inlineCheckbox20">Competitors?</label>
            </div><br>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="21" type="checkbox" id="inlineCheckbox21" value="option1">
              <label class="form-check-label" for="inlineCheckbox21">Last Funding</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="22" type="checkbox" id="inlineCheckbox22" value="option1">
              <label class="form-check-label" for="inlineCheckbox22">Revenue</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="23" type="checkbox" id="inlineCheckbox23" value="option1">
              <label class="form-check-label" for="inlineCheckbox23">Fund Needed From Us</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="24" type="checkbox" id="inlineCheckbox24" value="option1">
              <label class="form-check-label" for="inlineCheckbox24">Share</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="25" type="checkbox" id="inlineCheckbox25" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox25">Moderator No.</label>
            </div>            
            </div>
        </div>

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
                                   <th>Dob</th>
                                   <th>Gender</th>
                                   <th>Email</th>
                                   <th>Phone Number</th>
                                   <th>Second Phone Number</th>
                                   <th>Company Name</th>
                                   <th>Nature</th>
                                   <th>Incorporated On</th>
                                   <th>Founder Count</th>
                                   <th>Pitch Deck</th>
                                   <th>Aadhar Image</th>
                                   <th>Videos</th>
                                   <th>Images</th>
                                   <th>Sector</th>
                                   <th>Category</th>
                                   <th>Idea</th>
                                   <th>Solution To?</th>
                                   <th>How It Solves?</th>
                                   <th>Competitors?</th>
                                   <th>Last Funding</th>
                                   <th>Revenue</th>
                                   <th>Funded Needed from Us</th>
                                   <th>Share</th>
                                   <th>Moderator No.</th>
                                 </tr>
                               </thead>
                               <tfoot>
                                 <tr>
                                   <th>User Id</th>
                                   <th>Name</th>
                                   <th>Dob</th>
                                   <th>Gender</th>
                                   <th>Email</th>
                                   <th>Phone Number</th>
                                   <th>Second Phone Number</th>
                                   <th>Company Name</th>
                                   <th>Nature</th>
                                   <th>Incorporated On</th>
                                   <th>Founder Count</th>
                                   <th>Pitch Deck</th>
                                   <th>Aadhar Image</th>
                                   <th>Videos</th>
                                   <th>Images</th>
                                   <th>Sector</th>
                                   <th>Category</th>
                                   <th>Idea</th>
                                   <th>Solution To?</th>
                                   <th>How It Solves?</th>
                                   <th>Competitors?</th>
                                   <th>Last Funding</th>
                                   <th>Revenue</th>
                                   <th>Fund Needed from Us</th>
                                   <th>Share</th>
                                   <th>Moderator No.</th>
                                 </tr>
                               </tfoot>
                               <tbody>
                                <?php
                                  $stmt = $mysqli->prepare("SELECT COUNT(*) AS total_mods FROM moderator");
                                  $stmt->execute();
                                  $result = $stmt->get_result()->fetch_assoc();
                                  $total_mods = $result['total_mods'];
                                  $stmt = $mysqli->prepare("SELECT u.userid, type, first_name, last_name, dob, gender, email, phone, phone2, company_name, nature, incorporated_on, founders_count, pitch_deck, aadhar_img, video, img1, img2, img3, img4, img5, sector, category, idea, solution_to, your_solution, competitors, last_funding, revenue, kuberan_house, share, moderator FROM users u JOIN extras e ON u.userid = e.userid JOIN company c ON u.userid = c.userid JOIN profiles p ON c.userid = p.userid JOIN attachments a ON a.userid = u.userid JOIN business b ON b.userid = u.userid LEFT OUTER JOIN assigned asg ON u.userid = asg.userid AND sector=? ORDER BY created_on ASC");
                                  $stmt->bind_param('s', $_SESSION['sector']);                                  
                                  $stmt->execute();
                                  $result = $stmt->get_result();
                                  $i = 0;
                                  while($row = $result->fetch_assoc()) {

                                ?>
                                  <tr>
                                    <td><a href="application.php?userid=<?php echo $row['userid']; ?>"><?php echo $row['userid']; ?></a></td>
                                    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                                    <td><?php echo $row['dob']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['phone2']; ?></td>
                                    <td><?php echo $row['company_name']; ?></td>
                                    <td><?php echo $row['nature']; ?></td>
                                    <td><?php echo $row['incorporated_on']; ?></td>
                                    <td><?php echo $row['founders_count']; ?></td>
                                    <?php  
                                      $directory =  dirname(__DIR__, 1);
                                      if ($row['pitch_deck'])
                                        echo '<td><img src="'.$directory.'\\applicant\\uploads\\pitchDecks\\'.$row['pitch_deck'].'" class="img-fluid"></td>';
                                      else
                                        echo '<td></td>';
                                      if ($row['aadhar_img'])
                                        echo '<td><img src="'.$directory.'\\applicant\\uploads\\aadhar_img\\'.$row['aadhar_img'].'" class="img-fluid"></td>';
                                      else
                                        echo '<td></td>';
                                      if ($row['video'])
                                        echo '<td><img src="'.$directory.'\\applicant\\uploads\\video\\'.$row['video'].'" class="img-fluid"></td>';
                                      else
                                        echo '<td></td>';
                                    ?>
                                    <td>
                                      <?php  
                                        if ($row['img1'])
                                          echo '<img src="'.$directory.'\\applicant\\uploads\\images\\'.$row['img1'].'" class="img-fluid">';
                                        if ($row['img2'])
                                          echo '<br><img src="'.$directory.'\\applicant\\uploads\\images\\'.$row['img2'].'" class="img-fluid">';
                                        if ($row['img3'])
                                          echo '<br><img src="'.$directory.'\\applicant\\uploads\\images\\'.$row['img3'].'" class="img-fluid">';
                                        if ($row['img4'])
                                          echo '<br><img src="'.$directory.'\\applicant\\uploads\\images\\'.$row['img4'].'" class="img-fluid">';
                                        if ($row['img5'])
                                          echo '<br><img src="'.$directory.'\\applicant\\uploads\\images\\'.$row['img5'].'" class="img-fluid">';
                                      ?>
                                    </td>
                                    <td><?php echo $row['sector'] ?></td>
                                    <td><?php echo $row['category'] ?></td>
                                    <td><?php echo $row['idea'] ?></td>
                                    <td><?php echo $row['solution_to'] ?></td>
                                    <td><?php echo $row['your_solution'] ?></td>
                                    <td><?php echo $row['competitors'] ?></td>
                                    <td><?php echo $row['last_funding'] ?></td>
                                    <td><?php echo $row['revenue'] ?></td>
                                    <td><?php echo $row['kuberan_house'] ?></td>
                                    <td><?php echo $row['share'] ?></td>
                                    <td><?php echo isset($row['moderator'])? $row['moderator']: "" ?></td>
                                  </tr>
                                <?php
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
