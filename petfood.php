<?php
    session_start();
    if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
        if(isset($_GET['paysuccess']))
            $succmsg=$_GET['paysuccess'];
        ?>
            <title>List Foods</title>
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
            <div class="navbar border b-2 border b-gray-500">
                <img src="logo.PNG" class="m-1 p-1 h-32">
                <div class="p-4 flex bg-gray-400 justify-between">
                <a class="text-xl font-medium hover:text-gray-600" href="homepage_user.php"> Home </a>
                <a class="hidden md:flex text-xl font-medium hover:text-gray-600" href="vetinfo.php"> Vet Info</a>
                <a class="hidden md:flex text-xl font-medium hover:text-gray-600" href="petfood.php"> Pet food</a>
                <a class="hidden md:flex text-xl font-medium hover:text-gray-600" href="#contact"> Emargency Support </a>
                <a class="hidden md:flex text-xl font-medium hover:text-gray-600" href="#contact"> Review </a>
                <a class="hidden md:flex text-xl font-medium hover:text-gray-600" href="#contact"> About us </a>
                <div>
                    <input class="px-8 py-1.5 bg-white border rounded border-gray-600" type="search" id="searchbox" placeholder="Tap to search" autocomplete="off">
                    <input class="px-2 py-1 text-lg text-white border rounded border-gray-800 bg-green-700 hover:bg-green-800" type="button" value="Search" id="searchbtn">
                </div>
                <input class="px-2 text-lg text-white border rounded border-gray-800 bg-red-700 hover:bg-red-800" type="button" value="Log out" id="logoutbtn">
                </div>
            </div>

              <div class="flex p-4">
                <a class="m-1 px-6 py-2 text-lg text-white border rounded border-gray-800 bg-blue-600 hover:bg-blue-700" href="addfreepost.php">Add Food</a>
                </div>
              <script>
                var srcbtn=document.getElementById('searchbtn');
                srcbtn.addEventListener('click', searchprocess);
                
                function searchprocess(){
                    var searchvalue=document.getElementById('searchbox').value;
                    window.location.assign("searchpage.php?param1="+searchvalue);
                }
                
            </script>
            <div class="max-w-sm mx-auto"><h2><b style="color: green;"><?php if(isset($succmsg)) echo '<img src="images/success.png" width="64px"> '.$succmsg; ?></b></h2></div><br>
                    <?php
                        try{
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=petlover;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery="SELECT * FROM adoption_post as a JOIN user as u ON a.username = u.username WHERE post_type='free' Order By post_id DESC";
                            
                            try{
                                $returnval=$dbcon->query($sqlquery);
                                $table=$returnval->fetchAll();
                                foreach($table as $row){
                                    ?>
                                    <div class="max-w-xl mx-auto bg-gray-300">
                                        <table>
                                            <thead>
                                                <tr>  
                                                    <th>
                                                        <div class="px-6 py-10">
                                                        <h4 class="text-lg">PostID: <?php echo $row['post_id'] ?></h4>
                                                        <h4 class="text-lg">Username: <?php echo $row['username'] ?></h4> 
                                                        <h4 class="text-lg">Location: <?php echo $row['location'] ?></h4>
                                                        <h4 class="text-lg">Description: <?php echo $row['description'] ?></h4>
                                                        <h4 class="text-lg">Price: <?php echo $row['price']?> TK</h4>
                                                        <h4 class="text-lg">Phone Number: <?php echo $row['phone']?></h4>
                                                        <h4 class="text-lg">Email: <?php echo $row['email']?></h4>
                                                    </th><br><br>
                                                        <td><img class= "h-60 w-56 border rounded border-gray-800" alt="Pet Photo" src="<?php echo $row['imagepath'] ?>"></td></div>
                                                </tr>
                                            <?php 
                                                $var1=$row['username'];
                                                $var2=$_SESSION['uname']; 
                                                if($var1==$var2){?>
                                                <th>
                                                    <div class="flex justify-center">
                                                    <a class="m-2 px-8 py-1 font-normal text-lg text-white border rounded border-gray-800 bg-gray-600 hover:bg-gray-700" href="updatepost.php?post=<?php echo $row['post_id']?>&loc=<?php echo $row['location']?>&des=<?php echo $row['description']?>&pr=<?php echo $row['price']?>">Edit</a>

                                                    <a class="m-2 px-6 py-1 font-normal text-lg text-white border rounded border-gray-800 bg-red-600 hover:bg-red-700" href="deletepost.php?post=<?php echo $row['post_id']?>">Delete</a>

                                                    <a class="m-2 px-6 py-1 font-normal text-lg text-white border rounded border-gray-800 bg-blue-600 hover:bg-blue-700" href="addpayment.php?postid=<?php echo $row['post_id']?>" style="width: 150px;">Add to Cart</a>

                                                    </div>
                                                </th>
                                            <?php
                                        }?>
                                    <?php
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                       <tr> <th colspan="5">Data read error ... ...</th></tr>    
                                <?php
                            }
                            
                        }
                        catch(PDOException $ex){
                            ?>
                                    <tr><th colspan="5">Data read error ... ...</th></tr>
                            <?php
                        }
                    ?> 
                 </thead>
                </table>
            </div><br>
            <script>
                var elm=document.getElementById('logoutbtn');
                elm.addEventListener('click', processlogout);
                
                function processlogout(){
                    window.location.assign('logout.php');
                }
                
            </script>

        <?php
    }
    else{
        ?>
            <script>
                window.location.assign('index.html');
            </script>
        <?php
    }
?>