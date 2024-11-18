<!-- Removed the session handling code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css">
    <title>FitNest - Homepage</title>
</head>
<body>
    <!-- Navigation Bar without session-based logic -->
    <div class="navbar">
        <div class="navbar-box">
            <a href="../view/logout.php" class="navbar-link">Logout</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero-section">
        <img src="images/homepage.png" alt="FitNest Home Training" class="hero-image">
        <div class="hero-content">
            <h1>Welcome to FitNest</h1>
            <h2>Bringing Fitness Home, One Step at a Time</h2>
            <p></p>
        </div>
    </div>

    <!-- Popular Services Section -->
    <div class="popular-services">
        <h3>Our Services</h3>
        <div class="service-grid">
            <div class="service-item">
                <img src="../images/service1.png" alt="service1">
                <h4>Personal Training</h4>
                <p>Price: $50 per session</p>
            </div>
            <div class="service-item">
                <img src="../images/service2.png" alt="service2">
                <h4>Group Fitness</h4>
                <p>Price: $120 for group sessions</p>
            </div>
            <div class="service-item">
                <img src="../images/service3.png" alt="service3">
                <h4>Elderly Fitness</h4>
                <p>Price: $40 per session</p>
            </div>
            <div class="service-item">
                <img src="../images/yoga.png" alt="Yoga">
                <h4>Yoga Sessions</h4>
                <p>Price: $60 per session</p>
            </div>
        </div>
    </div>
</body>
</html>
