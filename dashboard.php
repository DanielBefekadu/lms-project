
<?php
session_start();
if (!isset($_SESSION['loggedin'])) 
    {

    header("Location: login.html");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LMS Student Dashboard</title>
  <link rel="stylesheet" href="assets/css/dashboard.css" />
  <link rel="icon" type="image/x-icon" href="assets/img/logo.png"/>
</head>
<body>
  <div class="dashboard-container">
    
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-logo">
        <img src="assets/img/logo.png" alt="LMS Logo" class="logo-img" />
        <h2>LMS</h2>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="active"><a href="#"><span class="icon">🏠</span> Dashboard</a></li>
          <li><a href="#"><span class="icon">📚</span> Courses</a></li>
          <li><a href="#"><span class="icon">📝</span> Assignments</a></li>
          <li><a href="#"><span class="icon">📊</span> Grades</a></li>
          <li><a href="#"><span class="icon">⚙️</span> Settings</a></li>
          <li><a href="logout.php"><span class="icon">🚪</span> Logout</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <header>
        <h1>Welcome, Student!</h1>
        <p>Here's an overview of your learning progress.</p>
      </header>

      <section class="dashboard-cards">
        <div class="card">
          <h3>Courses Enrolled</h3>
          <p>5</p>
        </div>
        <div class="card">
          <h3>Pending Assignments</h3>
          <p>2</p>
        </div>
        <div class="card">
          <h3>Completed Courses</h3>
          <p>3</p>
        </div>
        <div class="card">
          <h3>Grades Average</h3>
          <p>89%</p>
        </div>
      </section>

      <section class="recent-activities">
        <h2>Recent Activities</h2>
        <ul>
          <li>Submitted Assignment 3 for "Math 101"</li>
          <li>Completed "Introduction to Python"</li>
          <li>Received grade 95% in "English Literature"</li>
          <li>Enrolled in "Data Structures"</li>
        </ul>
      </section>
    </main>
  </div>
</body>
</html>
