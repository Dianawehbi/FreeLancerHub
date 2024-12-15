<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <style>
        .center-div {
            min-height: 100vh;
            /* Full viewport height */
            display: flex;
            align-items: center;
            /* Center content vertically */
            justify-content: center;
            /* Center content horizontally */
            background-color: #f8f9fa;
            /* Light background */
            padding: 20px;
            /* Spacing around content */
        }

        .content-box {
            background: #ffffff;
            /* White background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
            border-radius: 10px;
            /* Rounded corners */
            max-width: 1000px;
            /* Limit max width */
            padding: 30px;
            /* Inner spacing */
        }

        .content-box img {
            max-width: 100%;
            /* Make the image responsive */
            border-radius: 8px;
            /* Rounded corners for the image */
        }

        /* Make video responsive */
        .video-container video {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
    </head>

    <body>
        <!-- Highlight Section -->
        <div class="center-div">
            <div class="row w-100 content-box">
                <!-- Video on the left -->
                <div class="col-md-6 video-container">
                    <video autoplay loop muted>
                        <source src="images/vid.webm" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Description on the right -->
                <div class="col-md-6 description-container d-flex flex-column justify-content-center">
                    <h1>FreelanceHub</h1>
                    <p>FreelanceHub is the central platform connecting freelancers with organizations in need of their skills.
                        Whether you're an organization seeking talented professionals or a freelancer looking for your next project,
                        FreelanceHub makes it easier than ever to find the right match. We offer a seamless experience with tools designed
                        to help you manage tasks, communicate effectively, and get paid for your hard work. Join the community today and
                        start collaborating on exciting projects!</p>
                </div>
            </div>
        </div>
    </body>

</html>