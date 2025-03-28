<?php include "Template/header.php"; ?>

<?php
if (isset($_POST['submit'])) {
    require "config.php";

    try{
        $connection = new PDO($dsn, $username, $password, $options);
        $new user = array(
            "firstname" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "email" => $_POST['email'],
            "age" => $_POST['age'],
            "location" => $_POST['location']
        );
    
        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "users",
            implode(", :", array_keys($newUser)),
            ":" . implode(", :", array_keys($newUser)));

        $statement = $connection->prepare($sql);
        $statement->execute($newUser);

}catch (PDOException $error){
    echo $sql . "<br>". $error->getMessage();
    }
}
?/>

<h2>Add a user</h2>
    <form method="post">
        <label for="firstname">FirstName:</label>
        <input type="text" id="firstname" name="firstnamrname" required>
        
        <label for="lastname">LastName:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    
        <label for="age">Age:</label>
        <input type="number" id="age" name="age">

        <label for="location">Location:</label>
        <input type="text" id="location" name="location">

        <input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>


<?php include "Template/footer.php"; ?>