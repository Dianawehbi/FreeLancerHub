<?php
require_once '../connection.php';
session_start();
if (
    isset($_POST['name']) && !empty($_POST['name'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['phone']) && !empty($_POST['phone'])
    && isset($_POST['register_as']) && !empty($_POST['register_as'])
    && isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['country']) && !empty($_POST['country'])
    && isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['confirm_pass']) && !empty($_POST['confirm_pass'])
    && isset($_POST['link']) && !empty($_POST['link'])
) {
    extract($_POST);
    // check : username , email , phone 
    $query = "SELECT * FROM `user` WHERE 1";
    $res = $conn->query(query: $query);

    $_SESSION['error'] = false;
    echo "<script>
    window.alert('!!!'); </script>";
    while ($row = $res->fetch_assoc()) {
        if ($username == $row['username']) {
            echo "<script>
            window.alert('This user name is already used!!!'); </script>";
            $_SESSION['error'] = true;
        }
        if ($email == $row['email']) {
            echo "<script>
            window.alert('This email is already used!!!'); </script>";
            $_SESSION['error'] = true;
        }
        if ($phone == $row['phone']) {
            echo "<script>
            window.alert('This phone is already used!!!'); </script>";
            $_SESSION['error'] = true;
        }
    }
    if (!$_SESSION['error']) {
        if ($password == $confirm_pass) {
            //hash password
            $password = md5($password);
            $role;
            if ($register_as == 'freelancer') {
                $role = 2;
            } else {
                $role = 3;
            }
            // check if image exist or no 
            

            $sql = "INSERT INTO `user`(`id`, `name`, `username`, `email`, `phone`, `password`, `country`, `role`, `link`,`description` ) 
            VALUES (null,'$name','$username','$email','$phone','$password','$country',$role, '$link', '$description')";

            if ($conn->query($sql)) {
                $_SESSION['start'] = 1;
                header('location:../index.php');
            }
        }
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

<body>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h3>Register Here</h3>
            </div>
            <form action="" method="post">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="firstName" name="name" placeholder="Enter your first name" required>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Register As</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="register_as" id="freelancer" value="freelancer" checked>
                            <label class="form-check-label" for="freelancer">Freelancer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="register_as" id="organization" value="organization">
                            <label class="form-check-label" for="organization">Organization</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required>
                    </div>
                    <div class="mb-3">
                        <label for="portfolio" class="form-label">Link(portfolio/website)</label>
                        <input type="url" class="form-control" id="portfolio" name="link" placeholder="URL">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" id="country" name="country" required>
                            <option selected disabled>Choose your country</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Syria">Syria</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Egypt">Egypt</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Oman">Oman</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Algeria">Algeria</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Libya">Libya</option>
                            <option value="Sudan">Sudan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="portfolio" class="form-label">description</label>
                        <input type="text" class="form-control" id="portfolio" name="description" placeholder="Description">
                    </div>

                    <div class="mb-3">
                        <label for="portfolio" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="portfolio" name="profile_pic" >
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Create a password" required>
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_pass" placeholder="Confirm your password" required>
                        </div>
                    </div>

                    <div class="mb-3 mt-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success w-100">Submit</button>
                    </div>
                </div>
            </form>
            <div class="text-center mt-3" style="margin: 5%;">
                <p class="mb-0">I have an Account <a href="../index.php" class="text-decoration-none">Log In to your account</a></p>
            </div>

        </div>
    </div>
</body>

</html>