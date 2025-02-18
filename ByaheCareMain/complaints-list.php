<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports and Ratings - ByaheCare</title>
  
  <!-- Updated Font Awesome link for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:wght@300;400;600;800&display=swap" rel="stylesheet">
  
  <!-- Link to external CSS file -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <!-- Consistent Header Section -->
  <header class="site-header">
    <a href="index.html" class="logo-link">
      <div class="logo-content">
        <img src="ByaheCare.png" alt="ByaheCare Logo" class="logo-image">
        <span class="logo-text">ByaheCare</span>
      </div>
    </a>
  </header>

  <!-- Main Content Section -->
  <main class="content">
    <!-- Page Title -->
    <h1 class="page-title">Complaints and Ratings</h1>

    <!-- Complaints List -->
    <div id="complaintsList">
      <h2>List:</h2>
      <?php include 'fetch_data.php'; ?>
    </div>
  </main>

</body>
</html>
