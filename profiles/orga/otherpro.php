<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
<link rel="stylesheet" href="../otherprofile.css">
<!-- this page is to let people see freelancer's profile -->
<?php
session_start();

if ($_SESSION['isLoggedin'] == 1) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        require_once '../../connection.php';
        $id = $_GET['id'];
        $query = "SELECT `id`, `name`, `username`, `email`, `phone`, `password`, `country`, `role`, `link`, `description` FROM `user` WHERE id= $id";
        $res = $conn->query($query);
        if ($res->num_rows != 1) {
            header('location:../home.php');
        } else {
            $row = $res->fetch_assoc();
            // for picture
            $name = $row['name'];
            $nameParts = explode(' ', $name);
            $firstName = $nameParts[0];
        }

?>
        <div class="container mt-5">
            <div class="account-header position-relative" style="height: 250px;">
                <div class="position-absolute top-50 start-50 translate-middle text-center edit-section">
                    <label for="profilePictureInput">
                        <img src="../../images/<?= $firstName; ?>.jpg" alt="Profile Picture" class="account-picture" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
                    </label>
                </div>

                <div class="text-center mt-5 pt-5">
                    <h2 class="mt-4" id="fullName"><?= $row['name']; ?></h2>
                    <p class="mb-1 text-light"><i class="bi bi-geo-alt"></i> <span id="country"><?= $row['country']; ?></span></p>
                    <a href="<?= $row['link']; ?>" id="portfolio" target="_blank" class="btn btn-outline-light btn-sm">View Portfolio</a>
                </div>
            </div>


            <div class="account-content mt-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">About</h5>
                        <p id="bio"><?= $row['description']; ?></p>
                    </div>
                </div>


                <!-- Projects Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Posted Tasks</h5>
                    </div>
                    <?php
                    $taskquery = "SELECT `name`, `description`, `rate`, `deadline` FROM `task` WHERE company_id = $id";
                    $tasks = $conn->query($taskquery);

                    while ($row0 = $tasks->fetch_assoc()) {
                        $title = $row0['name'];
                        $des = $row0['description'];
                        $rate = $row0['rate'];
                        $date = $row0['deadline'];
                        echo '<div class="card-body">';
                        echo '<div class="mb-3">';
                        echo '<h3 class="card-title">' . $title . '</h3>';
                        echo '<p class="card-text"> ' . $des . '</p>';
                        echo '<p class="card-text">Rate : ' . $rate . '$</p>';
                        echo '<p class="card-text">Deadeline : ' . $date . '</p>';
                        //  <label for="emailInput" class="form-label">Email</label>
                        echo ' </div>';
                        echo ' </div>';
                    }

                    ?>
                </div>

                <!-- Contact Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Contact</h5>
                        <p><strong>Email:</strong> <span id="email"><?= $row['email'] ?></span></p>
                        <p><strong>Phone:</strong> <span id="text"><?= $row['phone'] ?></span></p>
                    </div>
                </div>

            </div>
        </div>

<?php
    }
}
