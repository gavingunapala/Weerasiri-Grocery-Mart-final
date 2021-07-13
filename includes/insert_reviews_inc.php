<?php
    session_start();
    
    include_once 'db_conn_inc.php';
    
    if(isset($_POST['submit'])){
        $topic=$_POST['topic'];
        $content= $_POST['content'];
        $category= $_POST['category'];
        $star_rate = 2;
    
        $user_id = $_SESSION['customer_id'];

        echo $topic;
        echo $content;
        echo $category;
        echo $star_rate;
        echo $user_id;

        $sql = "INSERT INTO feedback(feedback_topic, feedback_content, feedback_category, star_rate, customer_id)
        VALUES ('$topic','$content','$category', '$star_rate', '$user_id')";
        $result = mysqli_query($conn,$sql);
        
        if($result == false) {
            header("Location: ../add_reviews.php?add_reviews=unsuccess");
        } else {
            header("Location: ../add_reviews.php?add_reviews=success");
        }
    }
?>