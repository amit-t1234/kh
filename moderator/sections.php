
          <!-- Content Row -->
          <div class="row">
            <?php
              $stmt = $mysqli->prepare("SELECT 
                users.userid, 
                COUNT(*) AS total,
                SUM(CASE when  status IS NULL THEN 1 ELSE 0 END) AS pending,              
                SUM(CASE when  status = 2 THEN 1 ELSE 0 END) AS escalated,              
                SUM(CASE when  status = 1 THEN 1 ELSE 0 END) AS scored,
                SUM(CASE when  status > 4 THEN 1 ELSE 0 END) AS flagged 
                FROM users join business on users.userid = business.userid
                WHERE sector=?");
              $stmt->bind_param('s', $_SESSION['sector']);
              $stmt->execute();
              $result = $stmt->get_result();
              $row = $result->fetch_assoc();
              $total = $row['total'];        
              $pending = $row['pending'];        
              $escalated = $row['escalated'];        
              $scored = $row['scored'];        
              $flagged = $row['flagged'];        
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="index.php"><div class="card border-left-primary shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending Applications</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending; ?></div>
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                  </div>
                                </div>
                              </div>
                            </div></a>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="pending.php"><div class="card border-left-warning shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Escalated Applications</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $escalated; ?></div>
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                  </div>
                                </div>
                              </div>
                            </div></a>
            </div>            

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="reviewed.php"><div class="card border-left-success shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Scored Applications</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $scored; ?></div>
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                  </div>
                                </div>
                              </div>
                            </div></a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="flagged.php"><div class="card border-left-info shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Flagged Applications</div>
                                    <div class="row no-gutters align-items-center">
                                      <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $flagged; ?></div>
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
                            </div></a>
            </div>
          </div>