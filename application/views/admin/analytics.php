<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading --> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_pending; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('admin/role'); ?>">View &rarr;</a></small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">On Process</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_process; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('admin/datamember'); ?>">View &rarr;</a></small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Done</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_done; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('menu'); ?>">View &rarr;</a></small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cancelled</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_cancelled; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('menu/submenu'); ?>">View &rarr;</a></small>
            </div>
        </div>
    </div>
<div class="container-fluid">
    <!-- Page Heading --> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-xl-8 col-md-8 mb-4" style="margin-left:70px;">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Most Type of Report</div>
                        <div class="col-auto">
                            <!-- /.container-fluid -->
                          <?php foreach($analytics as $i)

                              $typeIn[]=$i['type']; 
            


                             $typeIn[]=$i['type'];  

                              $typeIn[]=$i['type'];  
                          ?>
                          <?           ?>
                          <?php foreach($analytics as $i)
                              $typecount[]=$i['tcount']; 
                          ?>
                          <div style="width:500px;">
                            <canvas id="myChart"></canvas>
                          </div>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('admin/role'); ?>">View &rarr;</a></small>
            </div>
        </div>
        <div class="col-xl-8 col-md-8 mb-4" style="margin-left:70px;">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Month Most Receive Reports</div>
                            <!-- /.container-fluid -->
                            <?php foreach($analyticsdatereport as $j)
                              $dateIn[]=date('F', $j['date_reported']);
                            ?>
                            <?php foreach($analyticsdatereport as $j)
                                $datecount[]=$j['dcount']; 
                            ?>
                            <div style="width:500px;">
                              <canvas id="myChart2"></canvas>
                            </div>
                                 
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('admin/datamember'); ?>">View &rarr;</a></small>
            </div>
        </div>
       


</div>

<script>
  const labels = <?php echo json_encode($typeIn)?>;

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: <?php echo json_encode($typecount)?>,
    }], 
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };


const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

  const labels2 = <?php echo json_encode($dateIn)?>;
  
  const data2 = {
    labels: labels2,
    datasets: [{  
      label: 'My Second dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: <?php echo json_encode($datecount)?>,
    }], 
  };
/*  
  const config2 = {
    type: 'bar',
    data: data2,
    options: {}
  };
  */
  const config2 = {
    type: 'bar',
    data: data2,
        options: {
          scales: {
            xAxes: [{
              type: 'time',
              time: {
                unit:'month'
              }
            }],
          }
        } 
  };  

  const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
  );
</script>
</div>
<!-- End of Main Content -->