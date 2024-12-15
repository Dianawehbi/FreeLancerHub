<?php
session_start();
if ($_SESSION['isLoggedin'] != 1 && $_SESSION['role_id'] != 3) {
    header("location:index.php");
} else {
    require_once '../connection.php';

    if (
        isset($_GET['name']) && !empty($_GET['name'])
        && isset($_GET['description']) && !empty($_GET['description'])
        && isset($_GET['rate']) && !empty($_GET['rate'])
        && isset($_GET['category']) && !empty($_GET['category'])
        && isset($_GET['deadline']) && !empty($_GET['deadline'])
    ) {
        extract($_GET);
        $query = "INSERT INTO `task`(`id`, `name`, `description`, `rate`, `category_id`, `company_id`, `deadline`)
         VALUES (null,'$name','$description',$rate,$category,$_SESSION[user_id],'$deadline')";
        $conn->query($query);
        header('location:../home.php?id=' . $_SESSION['user_id']);
    }

?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
        .container {
            max-width: 800px;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-top: 60px;
        }
    </style>

    <body>
        <div class="container">
            </form method="get">
            <h2 class="text-center mb-4">Post a New Task</h2>
            <form>
                <!-- Task Title -->
                <div class="mb-3">
                    <label for="taskTitle" class="form-label">Task Title</label>
                    <input type="text" class="form-control" id="taskTitle" name="name" placeholder="Enter task title" required>
                </div>

                <!-- Job Description -->
                <div class="mb-3">
                    <label for="jobDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="jobDescription" name="description" rows="4" placeholder="Describe the task in detail" required></textarea>
                </div>

                <!-- Rate -->
                <div class="mb-3">
                    <label for="amountRate" class="form-label">Rate ($)</label>
                    <input type="range" class="form-range" name="rate" id="amountRate" min="100" max="5000" step="50" value="100" oninput="updateRateValue()">
                    <div class="d-flex justify-content-between">
                        <span>$100</span>
                        <span>$5000</span>
                    </div>
                    <div class="mt-2">Selected Rate: $<span id="rateValue">100</span></div>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-select" required>
                        <option value="" disabled selected>Select a category</option>
                        <?php
                        $sql = "SELECT * FROM `categories` WHERE 1";
                        $res = $conn->query($sql);

                        while ($row = $res->fetch_assoc()) {
                            $name = $row['name'];
                            $id = $row['id'];
                            echo "<option value=$id >$name</option> F ";
                        }
                        ?>
                    </select>
                </div>

                <!-- Deadline -->
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" min="" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Post Task</button>
            </form>
        </div>

        <script>
            function updateRateValue() {
                const rateSlider = document.getElementById("amountRate");
                const rateValue = document.getElementById("rateValue");
                rateValue.textContent = rateSlider.value;
            }

            // Set the minimum date for the deadline field to today's date
            document.getElementById("deadline").min = new Date().toISOString().split("T")[0];
        </script>
    </body>

<?php

}
