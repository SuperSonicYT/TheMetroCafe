<?php
include "dbconfig.php";

if(isset($_POST['submit']))
    {
        $uname = mysqli_real_escape_string($conn,$_POST['txt_uname']);
        $password =  mysqli_real_escape_string($conn,$_POST['txt_pwd']);

        if($uname!="" && $password!="")
        {
            $sql_query = "SELECT count(*) AS usercount FROM users WHERE uname='".$uname."' AND password='".$password."'";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);
            $count = $row['usercount'];

            $sql_query2 = "SELECT name as username FROM users WHERE uname='".$uname."' AND password='".$password."'";
            $result2 = mysqli_query($conn,$sql_query2);
            $row2 = mysqli_fetch_array($result2);
            $name = $row2['username'];

            if($count > 0) {
                $_SESSION['uname'] = $uname;
                $_SESSION['name'] = $name;
                header('Location: cms.php');
            }
            else{
                echo '<script>window.alert("invalid username or password")</script>';
            }
        }
    }
?>
<html>

<head>
    <title>The Metro Cafe</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>  
        .menu-card * {
            box-sizing: border-box;
            font-family:'Calibri';
        }
        .column {
            float: left;
            width: 33%;
            padding: 10px 10px;
        }
        .row {margin: 0 -5px;}
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="top-bar" >
        <img src="images/logo.gif" style="margin-left: 30px;" height="150px" width="150px" />
        <button id="admin-btn" onclick="document.getElementById('admin-form').style.display='block'" style="width: auto;">
            <img src="images/adminvector.png" height="50px" width="50px"/>
        </button>
        <div id="admin-form" class="modal" style="z-index:10;">
            <form class="modal-content" method="post" action="">
                <div class="container">
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="txt_uname" required>
    
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="txt_pwd" required>
    
                    <button id ="login-btn" type="submit" name="submit">Login</button>
                </div>
    
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('admin-form').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>
        <div class="topbar-right-float">
            <div class="center-buffer">
                <div id="menu-btn">
                    <a href="index.html"><button>HOME</button></a>
                </div>
                <div id="social-links-color">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <ul>
            <?php
            $query_menu_bar = "SELECT cat_name as cat_name FROM categories";
            $result_query_menu_bar=mysqli_query($conn,$query_menu_bar);
            while($row_query_menu_bar=mysqli_fetch_array($result_query_menu_bar)) {
            ?>
            <a href="menu.php?value=<?php echo $row_query_menu_bar['cat_name'];?>"> <li style="cursor: pointer;" ><?php echo $row_query_menu_bar['cat_name'];?></li></a>
            <?php        
            }
            ?>
        </ul>
    </nav>
    <br><br><br>
    <div class="menu-card-container">
        <div class="menu-card">
            <table>
            <?php
                if(isset($_GET['value'])){
                    $category = $_GET['value'];
                    $query_menu_card="SELECT dish_name AS dishname,category AS category,description AS description,price AS price,colorcode AS colorcode FROM dishes WHERE category='".$category."'";
                    $result_query_menu_card = mysqli_query($conn,$query_menu_card);
                    
                    while($data=mysqli_fetch_array($result_query_menu_card)) {
                        ?>
                            <div class="column">
                                <div class="card" style="position: relative; text-align: left; height:240px">
                                <h3 style="text-align: left; color:cornflowerblue; font-size:20px;"> <?php echo $data['dishname'] ?> </h3><br>
                                <p style="position:absolute; right:20px; top: 17px; font-weight:bold; font-size:20px;"> ₹<?php echo $data['price'] ?>/- </p><br>
                                <p style="text-align: left;"> <?php echo $data['description'] ?> </p><br><br>
                                <?php
                                if($data['colorcode'] == 'green') {
                                    ?><img src="images/veg.png" height="30px" width="30px" alt="VEG" style="position:absolute; bottom:20px"><?php
                                } else {
                                    ?><img src="images/nonveg.png" height="30px" width="30px" alt="NON-VEG" style="position:absolute; bottom:20px"><?php
                                }
                                ?>
                                </div>
                            </div>
                        <?php
                    }
                }
            ?>
            </table>
        </div>
    </div>
</body>

</html>