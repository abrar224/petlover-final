<?php
    session_start();
    if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
        ?>
            <title>Review Page</title>
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
            <div class="navbar border b-2 border b-gray-500">
                <img src="logo.PNG" class="m-1 p-1 h-32">
                <div class="p-4 flex bg-gray-400 justify-between">
                   <a class="text-xl font-medium hover:text-gray-600" href="homepage_user.php">Home</a>
                </div><br><br>
                <a class="m-3 px-6 py-2 text-lg text-white border rounded border-gray-800 bg-blue-600 hover:bg-blue-700" href="addreview.php">Add review</a><br><br>
            </div>
                 <?php
                        try{
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=petlover;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT * FROM review Order By review_id DESC";
                            $sqlquery2="SELECT ROUND (AVG(ratings),1) as avg FROM review";

                            $returnval2=$dbcon->query($sqlquery2);
                            $avg=$returnval2->fetchAll();
                            foreach($avg as $row1){
                            ?>
                                <h4 class="flex justify-center px-8 py-2 text-2xl font-semibold"> Overall Ratings: <?php echo $row1['avg'] ?>/5</h4><?php
                            }
                            try{
                                $returnval=$dbcon->query($sqlquery);                               
                                $productstable=$returnval->fetchAll();
                                foreach($productstable as $row){
                                    ?><br>
                                    <div class="max-w-xl mx-auto bg-indigo-200">
                                       <table>
                                             <thead>
                                                <tr><br>  
                                                <div class="px-4 py-2">
                                                <h4 class="px-8 py-2 text-lg font-semibold"> Review Id: <?php echo $row['review_id'] ?></h4>
                                                <h4 class="px-8 py-2 text-lg font-semibold">Userame: <?php echo $row['username'] ?></h4> 
                                                <h4 class="px-8 py-2 text-lg font-semibold"><?php echo $row['review_details'] ?></h4>
                                                <h4 class="px-8 py-2 text-lg font-semibold">Ratings: <?php echo $row['ratings'] ?>/5</h4>
                                                </div>
                                            </tr>
                                    <?php
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                       <tr> <th colspan="5">Data read error......</th></tr>    
                                <?php
                            }
                            
                        }
                        catch(PDOException $ex){
                            ?>
                                    <tr><th colspan="5">Data read error......</th></tr>
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
                window.location.assign('index.html');
            </script>
        <?php
    }
?>