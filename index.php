<?php
print_r(getallheaders());
include 'application/config/database.php';
    if(isset($_POST['submit'])) {
        $city_id = trim($_POST['city_id']);
        $cuisine_id = trim($_POST['city_id']);
        $establishment_id = trim($_POST['city_id']);
        $restaurant_name = trim($_POST['restaurant_name']);
        $special_item = trim($_POST['special_item']);
        $restaurant_hours = trim($_POST['restaurant_hours']);
        $description = htmlspecialchars(trim($_POST['description']));
        $address = trim($_POST['address']);
        $rating = trim($_POST['rating']);
        $cuisines = trim($_POST['cuisines']);
        $average_cost = trim($_POST['average_cost']);

        $most_popular = (int)trim($_POST['popular']);
        $most_popular_food = (int)trim($_POST['popular_food']);

        // image code
        if(!empty($_FILES['thumbnail_image']['name'])){
            $temp = explode(".", $_FILES["thumbnail_image"]["name"]);
            $thumbnail_image = uniqid(). "." .end($temp);
            move_uploaded_file($_FILES['thumbnail_image']["tmp_name"], "images/restaurant/". $thumbnail_image);

        }
        if(!empty($_FILES['restaurant_image']['name'])){
            $temp = explode(".", $_FILES["restaurant_image"]["name"]);
            $restaurant_image = uniqid(). "." .end($temp);
            move_uploaded_file($_FILES['restaurant_image']["tmp_name"], "images/restaurant/". $restaurant_image);

        }
        if(!empty($_FILES['food_image']['name'])){
            $temp = explode(".", $_FILES["food_image"]["name"]);
        $food_image = uniqid(). "." .end($temp);
        move_uploaded_file($_FILES['food_image']["tmp_name"], "images/restaurant/". $food_image); 
        }
        
        // image array
        $count = count($_FILES['image']);
        $imageArr = [];

        for($i=0;$i<=$count;$i++) {
        if(!empty($_FILES['image']['name'][$i])){
        $temp = explode(".", $_FILES["image"]["name"][$i]);

        $image_name = uniqid().".".end($temp);
        move_uploaded_file($_FILES['image']['tmp_name'][$i], 'images/restaurant/'.$image_name);
        array_push($imageArr, $image_name);
        }
    }
    $images = implode(",", $imageArr);
        
        $obj = new DBConnection();
       
        // insert into details table
        $st = $obj->conn->prepare("INSERT INTO restaurants(cuisines, city_id, cuisine_id, establishment_id, restaurant_name,special_item,restaurant_hours,location, rating, average_cost,description,most_popular,is_food_popular,restaurant_image,food_image,thumbnail_image,images) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $result = $st->execute([$cuisines,$city_id, $cuisine_id, $establishment_id, $restaurant_name,$special_item,$restaurant_hours, $address, $rating, $average_cost,$description,$most_popular,$most_popular_food,$restaurant_image,$food_image,$thumbnail_image, $images]);
        if($result) {
            echo "Data for Country Inserted Succesfully.";
          
        } else {
            print_r($st->errorInfo());
        }
    }



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Country</h1>
    <form method="post" enctype = "multipart/form-data">
        City_id: <input type="text" name="city_id" value =1  required><br> <br>
        Cuisine_id: <input type="text" name="cuisine_id" value =1 required><br> <br>
        Establishment_id: <input type="text" name="establishment_id" value =1 required><br> <br>

        Thumbnail_image:<input type="file" name="thumbnail_image"/><br> <br>


        Restaurant Name:<input type="text" name="restaurant_name" required> <br> <br>
        Restaurant_image:<input type="file" name="restaurant_image"/><br> <br>







        Special Item: <input type="text" name="special_item" required><br> <br>
        Food_image:<input type="file" name="food_image"/><br> <br>
        
        
        Restaurant_hours: <input type="text" name="restaurant_hours" required><br> <br>
        Address: <input type="text" name="address" required><br> <br>
        Rating: <input type="text" name="rating" required><br>  <br>
        AVerage_cost: <input type="text" name="average_cost" value="$$-$$$" required><br> <br>

        Most Popular:   <select name="popular">
        <option value="1" name="popular">Yes</option>
        <option value="0" name ="popular">No</option>
        </select> <br> <br>

        Most Popular Food:   <select name="popular_food">
        <option value="1" name="popular">Yes</option>
        <option value="0" name ="popular">No</option>
        </select> <br> <br>

        Cuisines: <input type="text" name="cuisines" required><br> <br>


        Description: <textarea col="50" row="30" name="description" required></textarea><br> <br>

        images:<input type="file" name="image[]"/><br> <br>
        <input type="file" name="image[]"/><br> <br>
        <input type="file" name="image[]"/><br> <br>
        <input type="file" name="image[]"/><br> <br>
        <input type="file" name="image[]"/><br> <br>
        <input type="file" name="image[]"/><br> <br>

        <input type="submit" name="submit">



    </form>
</body>
</html>