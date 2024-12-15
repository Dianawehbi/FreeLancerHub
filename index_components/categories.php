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