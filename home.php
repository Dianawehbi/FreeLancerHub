<?php
//*this web is for limit time job or specific task */
//* here freelancer can takes tasks as much as they need */
session_start();
if ($_SESSION['isLoggedin'] != 1) {
    header("location:index.php");
} else {

    require_once 'connection.php';

?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="style.css">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">FreelanceHub</a>

            <button class="navbar-toggler" type="button" id="navbarToggleBtn" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    <a class="nav-link" href="profiles/logicprofile.php?id=<?php echo $_SESSION['user_id']; ?>">Profile</a>
                    <a class="nav-link" href="Register/logout.php">Log Out</a>
                    <?php
                    if ($_SESSION['role_id'] == 3) {
                        $id  = $_SESSION['user_id'];
                        echo "<a class='nav-link' href='Task/postTask.php?id=$id'>Post</a>";
                    }
                    ?>
                    <a class="nav-link" href="Task/tasks.php?category=0">Tasks </a>
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

    <?php
    require_once 'index_components/imageSlide.php';
    ?>
    <!-- category -->
    <div class="container text-center">
        <h3>Browse Tasks By Categories</h3>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <?php
            $sql = "SELECT * FROM `categories` WHERE 1";
            $res = $conn->query($sql);
            $category = 0;
            echo " <div class='col'>";
            echo "<div class='p-3'>";
            echo '<a href="Task/tasks.php?category=' . $category . '"><button class="category-button">ALL </button></a>';
            echo "</div></div>";
            while ($row = $res->fetch_assoc()) {
                $category = $row['id'];
                echo " <div class='col'>";
                echo "<div class='p-3'>";
                echo '<a href="Task/tasks.php?category=' . $category . '"><button class="category-button">' . $row['name'] . '</button></a>';
                echo "</div></div>";
            }
            ?>

        </div>
    </div>

    <!-- tasks -->
    <link rel="stylesheet" href="task.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            padding-top: 30px;
        }

        .index_tasks_row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .index_tasks_col_sm_4 {
            width: 32%;
            margin-bottom: 20px;
        }

        .index_tasks_card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .index_tasks_company_logo {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .index_tasks_card_body {
            text-align: center;
        }

        .index_tasks_card_title {
            font-size: 20px;
            font-weight: 600;
            color: #343a40;
        }

        .index_tasks_card_text {
            font-size: 14px;
            color: #6c757d;
            margin-top: 10px;
        }

        .index_tasks_card_rate {
            font-size: 16px;
            color: #28a745;
            margin-top: 15px;
            font-weight: bold;
        }

        .index_tasks_btn_primary {
            background-color: #007bff;
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .index_tasks_btn_primary:hover {
            background-color: #0056b3;
        }

        .index_tasks_show_all_link {
            text-align: center;
            margin-top: 30px;
        }

        .index_tasks_show_all_link a {
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
        }

        .index_tasks_show_all_link a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container mt-5" style="margin-top: 15%;">
        <h3>Tasks</h3>
        <div class="index_tasks_row">
            <?php
            $taskquery = "SELECT task.id as task_id,  task.company_id as company_id, task.name as task_name, task.description as des, task.rate, task.category_id, task.deadline , user.name as company_name
                     FROM `task` JOIN `user` ON user.id = task.company_id";
            $tasks = $conn->query($taskquery);

            $i = 0;
            while ($row0 = $tasks->fetch_assoc()) {
                if ($i < 6) {
                    $name = $row0['company_name'];
                    $nameParts = explode(' ', $name);
                    $firstName = $nameParts[0];
                    echo ' <div class="index_tasks_col_sm_4">';
                    echo ' <div class="index_tasks_card">';
                    echo '<a href="profiles/logicprofile.php?id=' . $row0['company_id'] . ' "></a>';  // Ensure company logo path is correct
                    echo '<div class="index_tasks_card_body">';
                    echo "<h5 class='index_tasks_card_title'>" . $row0['task_name'] . "</h5>";
                    echo "<p class='index_tasks_card_text'>" . $row0['des'] . "</p>";
                    echo '<p class="index_tasks_card_rate">Rate: $' . number_format($row0['rate'], 2)  . ' per task</p>';
                    echo '<p class="index_tasks_card_deadline">Deadline: ' . $row0['deadline'] . '</p>';
                    if ($_SESSION['role_id'] == 2) {
                        echo ' <a href="connect/connect.php?taskid=' . $row0['task_id'] . '" class="index_tasks_btn_primary">Connect</a>';
                    }
                    echo '</div></div></div>';
                    $i++;
                }
            }
            ?>
        </div>
        <div class="index_tasks_show_all_link">
            <a href="Task/tasks.php?category=0">Show All Tasks</a>
        </div>
    </div>

    <?php

    require_once 'index_components/welcome.php';

    ?>
    <!-- freelancer -->
    <div class="container my-4">
        <h2>Expert Freelancers</h2>
        <div class="scroll-row">
            <?php
            $freelancer = "SELECT * FROM `user` WHERE role = 2";
            $resfree = $conn->query($freelancer);

            while ($row2 = $resfree->fetch_assoc()) {
                echo '<div class="scroll-item"><div class="card">';
                echo '<a href="#" class="d-block"><img src="images/slideimg1.jpg" class="card-img-top" alt="Freelancer Image"> </a>';
                echo '<div class="card-body">';
                echo '<h5 class="card-header">' . $row2['name'] . '</h5>';
                echo '<p class="card-text">' . $row2['description'] . '</p>';
                echo '<div class="rating">⭐⭐⭐⭐⭐</div>';
                echo '<div class="location">' . $row2['country'] . '</div>';
                echo '<a href="profiles/logicprofile.php?id=' . $row2['id'] . '" class="btn btn-primary">View Profile</a>';
                echo '</div></div></div>';
            }
            ?>
        </div>
    </div>
<?php
    require_once 'header_footer/footer.php';
}
?>