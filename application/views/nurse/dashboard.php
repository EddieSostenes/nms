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
      <!-- Total Users Widget -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>150</h3>
            <p>Total Users</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Active Programs Widget -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>53</h3>
            <p>Active Programs</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Pending Applications Widget -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>44</h3>
            <p>Pending Applications</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Payments Widget -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>
            <p>Payments</p>
          </div>
          <div class="icon">
            <i class="fa fa-credit-card"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->

   

    <!-- Row for Student Feedback Reports -->
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Student Feedback Reports</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <!-- Feedback reports data -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Student Name</th>
                  <th>Issue Reported</th>
                  <th>Date Reported</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>John Doe</td>
                  <td>Mistreatment by Supervisor</td>
                  <td>2024-08-15</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs">View</a>
                    <a href="#" class="btn btn-success btn-xs">Resolve</a>
                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jane Smith</td>
                  <td>Overload of Assignments</td>
                  <td>2024-08-14</td>
                  <td><span class="label label-success">Resolved</span></td>
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

 

    <!-- Row for Analytics Overview -->
    <div class="row">
      <div class="col-lg-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">User Activity</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <!-- Placeholder for a graph (use charting library like Chart.js) -->
            <canvas id="userActivityChart" style="height: 250px;"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Program Enrollment Trends</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <!-- Placeholder for a graph (use charting library like Chart.js) -->
            <canvas id="programEnrollmentChart" style="height: 250px;"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Ensure Chart.js is loaded -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Placeholder data for User Activity chart
  var ctx1 = document.getElementById('userActivityChart').getContext('2d');
  var userActivityChart = new Chart(ctx1, {
      type: 'line', // Chart type: 'line'
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], // X-axis labels
          datasets: [{
              label: 'User Logins', // Chart label
              data: [10, 20, 15, 30, 25, 35, 40], // Y-axis data points
              backgroundColor: 'rgba(54, 162, 235, 0.2)', // Background color (transparent)
              borderColor: 'rgba(54, 162, 235, 1)', // Border color
              borderWidth: 1 // Border width
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true // Y-axis starts at zero
              }
          }
      }
  });

  // Placeholder data for Program Enrollment Trends chart
  var ctx2 = document.getElementById('programEnrollmentChart').getContext('2d');
  var programEnrollmentChart = new Chart(ctx2, {
      type: 'bar', // Chart type: 'bar'
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], // X-axis labels
          datasets: [{
              label: 'Enrollments', // Chart label
              data: [5, 10, 15, 10, 20, 25, 30], // Y-axis data points
              backgroundColor: 'rgba(75, 192, 192, 0.2)', // Background color (transparent)
              borderColor: 'rgba(75, 192, 192, 1)', // Border color
              borderWidth: 1 // Border width
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true // Y-axis starts at zero
              }
          }
      }
  });
</script>
