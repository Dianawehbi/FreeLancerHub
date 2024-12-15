<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
<link rel="stylesheet" href="task.css">
<?php
session_start();
require_once '../header_footer/nav.php';
?>

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
        padding-top: 30px;
    }

    .job-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
        padding: 20px;
        display: flex;
        align-items: center;
    }

    .company-logo {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 20px;
        /* Spacing between logo and content */
    }

    .job-content {
        flex: 1;
        /* Ensures that the content takes up remaining space */
    }

    .job-title {
        font-size: 24px;
        font-weight: 600;
    }

    .company-name {
        font-size: 16px;
        color: #6c757d;
        margin-top: 5px;
    }

    .description {
        font-size: 16px;
        color: #343a40;
        margin-top: 15px;
    }

    .rate {
        font-weight: bold;
        font-size: 18px;
        color: #28a745;
        margin-top: 15px;
    }

    .deadline {
        font-size: 14px;
        color: #adb5bd;
        margin-top: 10px;
    }

    .apply-btn {
        background-color: #007bff;
        color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
        margin-top: 15px;
        text-align: center;
        cursor: pointer;
        display: inline-block;
    }

    .apply-btn:hover {
        background-color: #0056b3;
    }

    .featured-tag {
        background-color: #28a745;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<?php
if ($_SESSION['isLoggedin'] != 1) {
    header("location:index.php");
} else {
    require_once '../connection.php';
    if (isset($_GET['category'])) {
        $category = $_GET['category'];

        if ($category == '0') {
            $taskquery = "SELECT 
            task.name AS task_name,
            task.description AS des,
            task.rate,
            task.category_id,
            task.company_id as  company_id,
            task.deadline,
            user.country,
            task.id as task_id,
            user.name AS company_name,
            categories.name as cate_name
        FROM task 
        JOIN user ON user.id = task.company_id 
        JOIN categories ON task.category_id = categories.id Where 1";
        } else {
            $taskquery = "SELECT 
            task.name AS task_name,
            task.description AS des,
            task.rate,
            task.company_id as  company_id,
            task.category_id,
            task.deadline,
            user.country,
            task.id as task_id,
            user.name AS company_name,
            categories.name as cate_name
        FROM task 
        JOIN user ON user.id = task.company_id 
        JOIN categories ON task.category_id = categories.id 
        WHERE task.category_id = $category;";
        }

        $tasks = $conn->query($taskquery);
        echo '<div class="container">';

        while ($row = $tasks->fetch_assoc()) {
            $name = $row['company_name'];
            $nameParts = explode(' ', $name);
            $firstName = $nameParts[0];
            echo '<div class="job-card position-relative">';
            echo '<a href="../profiles/logicprofile.php?proid=' . $row['company_id'] . '">';
            echo '<img src="../images/' . $firstName . '.jpg" alt="Company Logo" class="company-logo">';  // Ensure company logo path is correct
            echo '</a>';
            echo '<div class="job-content">';
            echo '<div class="job-title">' . $row['task_name'] . '</div>';
            echo '<div class="company-name">' . $row['company_name'] . '</div>';
            echo '<div class="description">' . $row['des'] . '</div>';
            echo '<div class="rate">$' . $row['rate'] . '/Task</div>';
            echo '<div class="deadline">Deadline: ' . $row['deadline'] . '</div>';
            if ($_SESSION['role_id'] == 2) {

                echo '<a href="../connect/connect.php?taskid=' . $row['task_id'] . '" class="apply-btn">Connect</a>';  // Connect button
            }
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    }
}

require_once '../header_footer/footer.php';
?>