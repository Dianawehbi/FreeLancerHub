<?php
session_start();
if ($_SESSION['isLoggedin'] != 1) {
    header("location:index.php");
} else {
    if (
        isset($_GET['category']) && isset($_GET['text'])
    ) {
        extract($_GET);
        require_once '../connection.php';

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
        JOIN categories ON task.category_id = categories.id Where 
        task.name LIKE '%$text%' OR task.description LIKE '%$text%' 
        OR task.rate LIKE '%$text%' OR task.deadline LIKE '%$text%' 
        OR task.rate LIKE '%$text%' OR user.name LIKE '%$text%' OR categories.name LIKE '%$text%'";
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
        Where task.category_id = '$category' AND (task.name LIKE '%$text%' OR
        task.description LIKE '%$text%' OR task.rate LIKE '%$text%' 
        OR task.deadline LIKE '%$text%' OR task.rate LIKE '%$text%'
        OR user.name LIKE '%$text%' OR categories.name LIKE '%$text%') ";
        }

        $tasks = $conn->query($taskquery);
        echo '<div class="container" id="tasks_container">';

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
