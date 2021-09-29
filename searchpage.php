
   <?php
    session_start();

    if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){

        if(isset($_GET['param1']) && !empty($_GET['param1'])){
        ?> 
            <title>Search Page</title>
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
            <div class="navbar border b-2 border b-gray-500">
                <img src="logo.PNG" class="m-1 p-1 h-32">
                <div class="p-4 flex bg-gray-400 justify-between">
                   <a class="text-xl font-medium hover:text-gray-600" href="homepage_user.php">Home</a>
                </div>
                    <?php
                        try{
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=petlover;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            
                            $searchval=$_GET['param1'];
                            $sqlquery="";
                            if(!empty($searchval)){
                                $sqlquery="SELECT * FROM adoption_post as a JOIN user as u ON a.username = u.username WHERE a.username LIKE '%$searchval%' OR Location LIKE '%$searchval%' OR Description LIKE '%$searchval%' ORDER BY post_id DESC";
                            }
                            
                            try{
                                $returnval=$dbcon->query($sqlquery);
                                
                                $productstable=$returnval->fetchAll();

                                if($returnval->rowCount()==0){
                                    ?>
                                     <h2 class="p-4"> No search result found.....</h2>
                                <?php
                                } 
                                foreach($productstable as $row){
                                    ?><br> 
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
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="5">Data read error......</td>    
                                    </tr>
                                <?php
                            }
                            
                        }
                        catch(PDOException $ex){
                            ?>
                                <tr>
                                    <td colspan="5">Data read error......</td>    
                                </tr>
                            <?php
                        }
                    ?>
                </thead>
            </table><br>
        </div><br>
        <?php  
        }
        else{
            ?>
                <script>
                    window.location.assign('homepage_user.php');
                </script>
            <?php
        }
    }
    else{
        ?>
            <script>
                window.location.assign('index.html');
            </script>
        <?php
    }

?>