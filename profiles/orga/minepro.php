<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
<link rel="stylesheet" href="../profile.css">

<?php
session_start();

if ($_SESSION['isLoggedin'] == 1) {
    if (isset($_GET['proid']) && !empty($_GET['proid'])) {
        require_once '../../connection.php';
        $id = $_GET['proid'];
        $query = "SELECT `id`, `name`, `username`, `email`, `phone`, `password`, `country`, `role`, `link`, `description`, `profilepic` FROM `user` WHERE id= $id";
        $res = $conn->query($query);
        if ($res->num_rows != 1) {
            header('location:../../home.php?=id' . $_SESSION['user_id']);
        } else {
            $row = $res->fetch_assoc();
            // for picture

            $taskquery = "SELECT task.name as name, task.description as des, task.rate, task.category_id, task.deadline , user.name 
            FROM `task` JOIN `user` ON user.id = task.company_id WHERE task.company_id = $_SESSION[user_id]";
            $tasks = $conn->query($taskquery);
        }


?>

        <div class="container mt-5">
            <!-- Profile Header -->
            <div class="profile-header position-relative" style="height: 250px;">
                <!-- Profile Picture Section -->
                <div class="position-absolute top-50 start-50 translate-middle text-center edit-section">
                    <label for="profilePictureInput">
                    <img src="../../images/<?= $row['profilepic']; ?>" alt="Profile Picture" class="account-picture" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
                    </label>
                </div>


                <!-- User Information Section -->
                <div class="text-center mt-5 pt-5">
                    <h2 class="mt-4" id="fullName"><?= $row['name']; ?></h2>
                    <p class="mb-1 text-light"><i class="bi bi-geo-alt"></i> <span id="country"><?= $row['country']; ?></span></p>
                </div>
            </div>


            <!-- Profile Content -->
            <div class="profile-content mt-4">
                <form id="editProfileForm" method="get">
                    <!-- About Section -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">About</h5>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control" name="description" id="bioInput" rows="4"><?= $row['description']; ?></textarea>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Contact Information</h5>
                            <button type="button" class="btn btn-link p-0 float-end">Edit</button>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email</label>
                                <input type="email" id="emailInput" name="email" class="form-control" value=<?= $row['email']; ?>>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Phone</label>
                                <input type="text" id="emailInput" name="phone" class="form-control" value=<?= $row['phone']; ?>>
                            </div>
                        </div>
                    </div>
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



                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

<?php
    } elseif (
        isset($_GET['description']) && !empty($_GET['description'])
        && isset($_GET['email']) && !empty($_GET['email'])
        && isset($_GET['phone']) && !empty($_GET['phone'])
    ) {
        require_once '../../connection.php';
        extract($_GET);
        $id = $_SESSION['user_id'];
        $query = "UPDATE `user` SET `email`='$email',`phone`='$phone', `description`='$description' WHERE id = $id ";
        $conn->query($query);
        header('location:minepro.php?proid=' . $_SESSION['user_id']);
    }
} else {
    header('location:../../index.php');
}

?>