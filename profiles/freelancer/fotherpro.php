<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
<link rel="stylesheet" href="../otherprofile.css">
<!-- this page is to let people see freelancer's profile -->
<?php
session_start();

if ($_SESSION['isLoggedin'] == 1) {
    if (isset($_GET['proid']) && !empty($_GET['proid'])) {
        require_once '../../connection.php';
        $id = $_GET['proid'];
        $query = "SELECT `id`, `name`, `username`, `email`, `phone`, `password`, `country`, `role`, `link`, `description`, `profilepic` FROM `user` WHERE id= $id";
        $res = $conn->query($query);
        if ($res->num_rows != 1) {
            header('location:../home.php?id=' . $_SESSION['user_id']);
        } else {
            $row = $res->fetch_assoc();

?>
            <div class="container mt-5">
                <div class="account-header position-relative" style="height: 250px;">
                    <div class="position-absolute top-50 start-50 translate-middle text-center edit-section">
                        <label for="profilePictureInput">
                            <img src="../../images/<?= $row['profilepic']; ?>" alt="Profile Picture" class="account-picture" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
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
                        <div class="card-body">
                            <h5 class="card-title" style="margin: 2%;">Projects Done</h5>
                            <div class="row" id="projects">
                                <?php
                                $taskquery = "SELECT review.type as type ,task.name as title, task.description as des , user.name as company_name
                             FROM tasksdone JOIN task ON tasksdone.task_id = task.id Join user ON task.company_id = user.id  Join review on tasksdone.review = review.id
                             WHERE freelancer_id= $id";
                                $tasks = $conn->query($taskquery);

                                while ($row0 = $tasks->fetch_assoc()) {
                                    $title = $row0['title'];
                                    $comp = $row0['company_name'];
                                    $des = $row0['des'];
                                    $review = $row0['type'];
                                    echo '<div class="col-md-4 mb-3"><div class="card project-card"><div class="card-body">';
                                    echo '<h3 class="card-title">' . $title . '</h3>';
                                    echo '<h6 class="card-title"> Company :' . $comp . '</h6>';
                                    echo '<p class="card-text"> ' . $des . '</p>';
                                    echo '<p class="card-text">Review : ' . $review . '</p>';
                                    echo '</div></div></div>';
                                }

                                ?>
                            </div>
                        </div>
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
}
