<?php
$con = mysqli_connect("localhost:3325", "root", "", "display_page");
if(isset($_POST['upload'])){
    $file = $_FILES['image']['name'];
    $DETAILS =  $_POST['DETAILS'];
    $query  = "INSERT INTO shop_buy(image,DETAILS) VALUES('$file', '$DETAILS')";
    


    $res = mysqli_query($con,$query);

    if($res){
        move_uploaded_file($_FILES['image']['tmp_name'],"$file");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="flat_rent.css">
    <title>Shops for Buying</title>
</head>
<body>
    <h1>Shops for Buying</h1>
    <section class="container">
        <form action="" method="POST">
            <i class = "fas fa-search"> </i>
            <input class = "search" type="text" name ="item"  id="search-item" placeholder = "Search Places" onkeyup = "search()">
             <button class="custom-btn btn-3" type="submit" name="search">search</button> <!--name="search"and $_POST['search']should be same -->
        </form>
    </section>
    <?php
    
    if(ISSET($_POST['search'])){ // ISSET checks whether the button is clicked
        

    $keyword=$_POST["item"];
   
    $sel = "SELECT * FROM shop_buy WHERE DETAILS LIKE '%$keyword%'"; //simply storing query as a string
    $que = mysqli_query($con,$sel);// all the records stored by the query
}
  else{
    $sel = "SELECT * FROM shop_buy "; //simply storing query as a string
    $que = mysqli_query($con,$sel);// all the records stored by the query
  }

    $output = "";
    if(mysqli_num_rows($que) < 1){
        $output .= " <h3 class='text-center'>no image uploaded</h3>";
    }
     $output .= "<div style= 'display:flex;align-items:center;justify-content:center;flex-direction:column'>" ;
    while($row = mysqli_fetch_array($que)){
        $output .= "<img src='".$row['IMAGE']."' class = 'my-3'
        style = 'width:400px;height:400px; align-items: center;
        display: flex;
        justify-content: center;
        background-color: black;'>";
        $output .=  "<h2 class='details' style = 'font-size: 20px;font-style: normal;font-weight: 500;'>".$row['DETAILS']."</h2>" ;
    }
    // $output .= "</div>";
    echo $output;
    ?>
    <script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script> 
    
</body>
</html>

