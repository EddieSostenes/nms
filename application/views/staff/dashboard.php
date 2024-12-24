<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <!-- Activities Widget -->
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>150</h3>
            <p>Activities</p>
          </div>
          <div class="icon">
            <i class="fa fa-tasks"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Students Attendance Widget -->
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>120</h3>
            <p>Student Attendance</p>
          </div>
          <div class="icon">
            <i class="fa fa-calendar-check-o"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Reports Widget -->
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>25</h3>
            <p>Reports</p>
          </div>
          <div class="icon">
            <i class="fa fa-bar-chart"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Row for Recent Activities -->
    <div class="row">
      <div class="col-lg-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Recent Activities</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <!-- Recent activities data -->
            <ul class="list-group">
              <li class="list-group-item">Activity1 completed on 2024-08-15</li>
              <li class="list-group-item">Activity2 completed on 2024-08-14</li>
              <li class="list-group-item">Activity3 completed on 2024-08-13</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Recent Attendance</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <!-- Recent attendance data -->
            <ul class="list-group">
              <li class="list-group-item">John Doe attended on 2024-08-15</li>
              <li class="list-group-item">Jane Smith attended on 2024-08-14</li>
              <li class="list-group-item">David Wilson attended on 2024-08-13</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Row for Reports -->
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Reports Overview</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <!-- Reports data -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Report Title</th>
                  <th>Date Created</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Monthly Performance Report</td>
                  <td>2024-08-15</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs">View</a>
                    <a href="#" class="btn btn-success btn-xs">Approve</a>
                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Weekly Attendance Report</td>
                  <td>2024-08-14</td>
                  <td><span class="label label-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs">View</a>
                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                  </td>
                </tr>
                <!-- Add more reports as needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Row for Activities Progress Chart -->
    <div class="row">
            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Activity Progress</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <!-- Placeholder for Activity Progress Chart -->
                        <canvas id="activityProgressChart" style="height: 400px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Row for Attendance Trends Chart -->
            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Attendance Trends</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <!-- Placeholder for Attendance Trends Chart -->
                        <canvas id="attendanceTrendsChart" style="height: 400px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script to Initialize Charts -->
<script>
    // Placeholder data
    var activityData = {
        labels: ['Activity 1', 'Activity 2', 'Activity 3'],
        datasets: [{
            label: 'Progress (%)',
            data: [65, 59, 80],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    var attendanceData = {
        labels: ['Week 1', 'Week 2', 'Week 3'],
        datasets: [{
            label: 'Attendance (%)',
            data: [85, 90, 75],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    // Initialize Activity Progress Chart
    var ctx1 = document.getElementById('activityProgressChart').getContext('2d');
    var activityProgressChart = new Chart(ctx1, {
        type: 'bar',
        data: activityData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            },
            responsive: true
        }
    });

    // Initialize Attendance Trends Chart
    var ctx2 = document.getElementById('attendanceTrendsChart').getContext('2d');
    var attendanceTrendsChart = new Chart(ctx2, {
        type: 'line',
        data: attendanceData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            },
            responsive: true
        }
    });
</script>