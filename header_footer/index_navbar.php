<?php session_start(); ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">FreelanceHub</a>

            <button class="navbar-toggler" type="button" id="navbarToggleBtn" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="profiles/logicprofile.php?id=<?php echo $_SESSION['user_id']; ?>">Profile</a>
                    <a class="nav-link" href="Register/login.php">Login</a>
                    <a class="nav-link" href="Register/logout.php">Log Out</a>
                    <a class="nav-link" href="Task/postTask.php">Post</a>
                    <a class="nav-link" href="Task/tasks.php">Tasks </a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var navbarToggleBtn = document.getElementById('navbarToggleBtn');
            var navbarCollapse = document.getElementById('navbarNavAltMarkup');

            // Toggle class for navbar-collapse on button click
            navbarToggleBtn.addEventListener('click', function() {
                navbarCollapse.classList.toggle('show');
            });
        });
    </script>
</body>

</html>