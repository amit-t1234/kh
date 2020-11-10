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

      <!-- Nav Item - Pages Collapse Menu -->
  

      <!-- Nav Item - Charts -->
      <li class="nav-item">
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
<!--           <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div> -->

          <!-- Content Row -->
          <div class="row">
            <?php
              $stmt = $mysqli->prepare("SELECT 
                aadhar_number, 
                COUNT(*) AS total,
                SUM(CASE WHEN score != NULL THEN 1 ELSE 0 END) AS scored,
                SUM(CASE when  status != NULL THEN 1 ELSE 0 END) AS reviewed
                FROM Users");
              $stmt->execute();
              $result = $stmt->get_result();
              $row = $result->fetch_assoc();
              $total = $row['total'];        
              $scored = $row['scored'];        
              $reviewed = $row['reviewed'];        
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Application Recieved Total</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Applications Scored</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $scored; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Applications Reviewed</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $reviewed; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Applications</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($total - $scored); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
              <label class="form-check-labe" for="inlineCheckbox0">Aadhar Number</label>
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
              <input class="form-check-input toggle-vis" data-column="6" type="checkbox" id="inlineCheckbox6" value="option1">
              <label class="form-check-label" for="inlineCheckbox6">Second Phone Number</label>
            </div><br>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="7" type="checkbox" id="inlineCheckbox7" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox7">Company Name</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="8" type="checkbox" id="inlineCheckbox8" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox8">Nature</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="9" type="checkbox" id="inlineCheckbox9" value="option1">
              <label class="form-check-label" for="inlineCheckbox9">Incorporated On</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="10" type="checkbox" id="inlineCheckbox10" value="option1" checked>
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
              <input class="form-check-input toggle-vis" data-column="15" type="checkbox" id="inlineCheckbox15" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox15">Sector</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="16" type="checkbox" id="inlineCheckbox16" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox16">Category</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="17" type="checkbox" id="inlineCheckbox17" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox17">Idea</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="18" type="checkbox" id="inlineCheckbox18" value="option1" checked>
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
              <input class="form-check-input toggle-vis" data-column="22" type="checkbox" id="inlineCheckbox22" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox22">Revenue</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="23" type="checkbox" id="inlineCheckbox23" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox23">Fund Needed From Us</label>
            </div>
            <div class="form-check form-check-inline col-md-4 mx-0">
              <input class="form-check-input toggle-vis" data-column="24" type="checkbox" id="inlineCheckbox24" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox24">Share</label>
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
                                   <th>Aadhar Number</th>
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
                                 </tr>
                               </thead>
                               <tfoot>
                                 <tr>
                                   <th>User Id</th>
                                   <th>Aadhar Number</th>
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
                                 </tr>
                               </tfoot>
                               <tbody>
                                <?php
                                  $stmt = $mysqli->prepare("SELECT * FROM Users u JOIN Extras e ON u.aadhar_number = e.aadhar_number JOIN company c ON u.aadhar_number = c.aadhar_number JOIN Profiles p ON c.aadhar_number = p.aadhar_number JOIN Attachments a ON a.aadhar_number = u.aadhar_number JOIN Business b ON b.aadhar_number = u.aadhar_number ORDER BY created_on ASC");
                                  $stmt->execute();
                                  $result = $stmt->get_result();
                                  while($row = $result->fetch_assoc()) {
                                    if ($row['type'] == 'ideator') {
                                ?>
                                  <tr>
                                    <td><a href="application.php?userid=<?php echo $row['userid']; ?>"><?php echo $row['userid']; ?></a></td>
                                    <td><?php echo $row['aadhar_number']; ?></td>
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
                                  </tr>
                                <?php
                                  }    
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
                                   <th>Aadhar Number</th>
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
                                 </tr>
                               </thead>
                               <tfoot>
                                 <tr>
                                   <th>User Id</th>
                                   <th>Aadhar Number</th>
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
                                 </tr>
                               </tfoot>
                               <tbody>
                                <?php
                                  $stmt = $mysqli->prepare("SELECT * FROM Users u JOIN Extras e ON u.aadhar_number = e.aadhar_number JOIN company c ON u.aadhar_number = c.aadhar_number JOIN Profiles p ON c.aadhar_number = p.aadhar_number JOIN Attachments a ON a.aadhar_number = u.aadhar_number JOIN Business b ON b.aadhar_number = u.aadhar_number ORDER BY created_on ASC");
                                  $stmt->execute();
                                  $result = $stmt->get_result();
                                  while($row = $result->fetch_assoc()) {
                                    if ($row['type'] == 'entreprenuer') {

                                ?>
                                  <tr>
                                    <td><a href="application.php?userid=<?php echo $row['userid']; ?>"><?php echo $row['userid']; ?></a></td>
                                    <td><?php echo $row['aadhar_number']; ?></td>
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
                                  </tr>
                                <?php
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>Copyright &copy; Startup India - Telangana 2020</span>
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
