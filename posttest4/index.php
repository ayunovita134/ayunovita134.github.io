 <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];

        echo "Name: $name<br>Email: $email<br>Phone: $phone<br>Message: $message";
    }
    ?>
</div>