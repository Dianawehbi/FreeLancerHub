<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
<link rel="stylesheet" href="task.css">
<?php
session_start();
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
    require_once '../header_footer/nav.php';
    require_once '../connection.php';
    if (isset($_GET['category'])) {
        $category = $_GET['category'];

?>
        <nav class="navbar navbar-light bg-light" style="margin-top: 20px; padding: 10px;">
            <div class="container d-flex justify-content-center">
                <form class="d-flex" style="max-width: 500px; width: 100%;">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" onkeyup="SearchTask(this.value,<?= $category; ?> )" style="border-radius: 20px;">
                </form>
            </div>
        </nav>
        <script>
            function SearchTask(value, category_id) {
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.status == 200 && this.readyState == 4) {
                        document.getElementById("tasks_container").innerHTML = this.responseText;
                    } else {
                        document.getElementById("tasks_container").innerHTML = "No Data Found";
                    }
                }
                xhttp.open("GET", "search.php?category=" + category_id + "&text=" + value, true);
                xhttp.send();
            }
            window.onload = function() {
                SearchTask('', <?= $category; ?>); // Empty search to get all tasks
            }
        </script>

        <div id="tasks_container">

        </div>
<?php
    }
    require_once '../header_footer/footer.php';
}
?>