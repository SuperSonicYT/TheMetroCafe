<?php
    include_once "dbconfig.php";
    
    if(!isset($_SESSION['uname']))
    {
        header('Location: index.html');
    }
    if(isset($_GET['logout']))
    {
        session_destroy();
        header('Location: menu.php');
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            body {
                background-color: rgba(253, 253, 253, 255);
                overflow: scroll;
            }
            #logout-btn {
                background-color: rgb(230,0,0);
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }
            .dropbtn {
                background-color: lightgrey;
                width: 90%;
                color: black;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                margin-top: 20px;
            }
            
            .dropbtn:hover {
                background-color: grey;
            }
            
            .dropdown {
                position: relative;
                display: inline-block;
                width: 100%;
                margin-top: 20px;
                
                text-align: center;
            }
            
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                overflow: auto;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            }
            
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
            }
            
            .show {
                position: relative;
                display: inline-block;
                width: 90%;
                margin-top: 20px;
                
                text-align: center;
            }
            td {
                padding: 10px;
                vertical-align: top;
            }
            
            table,tr,td{border: 1px solid black;}
            table button {
                margin: 5px;
                border: none;
                background-color: green;
                color: white;
                font-size: 15px;
                padding:5px;
                
            }
        </style>

        <script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                hm.src = "//hm.baidu.com/hm.js?73c27e26f610eb3c9f3feb0c75b03925";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </head>

    <body>
        <H1 style="text-align: center;">CONTENT MANAGEMENT SYSTEM</H1>
        <H3>Welcome <?php echo $_SESSION['name']; ?> </H3>
        <form method="get" action="">
            <input type="submit" value="LOGOUT" id="logout-btn" name="logout"/>
        </form>
       

        <div class="dropdown">
            <?php
            $query_menu_bar = "SELECT cat_name as cat_name FROM categories";
            $result_query_menu_bar=mysqli_query($conn,$query_menu_bar);
            $btn=1;
            while($row_query_menu_bar=mysqli_fetch_array($result_query_menu_bar)) {
            ?>
            <button onclick="myFunction(<?php echo $btn; ?>)" class="dropbtn"><?php $category=$row_query_menu_bar['cat_name']; echo $category; ?></button>
            <div id="myDropdown<?php echo $btn++; ?>" class="dropdown-content">
                <table>
                <?php
                $query_menu_card="SELECT dish_id AS id,dish_name AS dishname,category AS category,description AS description,price AS price,colorcode AS colorcode FROM dishes WHERE category='".$category."'";
                $result_query_menu_card = mysqli_query($conn,$query_menu_card);
                while($data=mysqli_fetch_array($result_query_menu_card)) {
                ?>
                    <tr>
                        <td style="width: 180px;"><?php echo $data['dishname'] ?><br><button onclick="">edit</button></td>
                        <td style="width: 70px;">Rs.<?php echo $data['price'] ?><br><button>edit</button></td>
                        <td><?php echo $data['description'] ?><br><button>edit</button></td>
                        <td style="width: 80px;"><?php echo $data['category'] ?><br><button>edit</button></td>
                        <td style="width: 63px;"><?php echo $data['colorcode'] ?><br><button>edit</button></td>
                        <td style="vertical-align: middle;"><button onclick="removeFunc(<?php echo $data['id'];?>)" style="border: none;background-color: red;color: white;-size: 15px; padding:10px;">Remove</button></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <button style="margin-bottom: 20px; border: none;background-color: green;color: white;-size: 15px; padding:10px;">Add new</button>
                    
                </table>
            </div>
            <?php        
            }
            ?>
            <script>function removeFunc(id) {
                    var result = id;
                    window.alert("")
                }
            </script>
        </div>

        <?php
            function remove() {
                include "dbconfig.php";
                $id = "<script>document.write(result)</script>";
                $delete_query="DELETE FROM dishes where dish_id='$id';";
                $del = mysqli_query($conn,$delete_query);
                if($del)
                {
                    mysqli_close($db); 
                    header("location:cms.php"); 
                    exit;	
                }
                else
                {
                    echo "Error deleting record";
                }
            }
        ?>



        <script>

            function myFunction(n) {
                document.getElementById("myDropdown"+n).classList.toggle("show");
            }

            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {

                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>

    </body>

    </html>