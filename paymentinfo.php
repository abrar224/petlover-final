<?php
    session_start();
    if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
        ?>
            <title>Payment List</title>
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
            <div class="navbar border b-2 border b-gray-500">
                <img src="logo.PNG" class="m-1 p-1 h-32">
                <div class="p-4 flex bg-gray-400 justify-between">
                   <a class="text-xl font-medium hover:text-gray-600" href="homepage_admin.php">Home</a>
                </div><br><br>
            <div class="max-w-2xl mx-auto p-4 bg-gray-400">
              <table>
                <thead>
                    <tr>
                        <th class="p-4"><h3 class="text-xl">Payment ID</h3></th>
                        <th class="p-4"><h3 class="text-xl">Username</h3></th>
                        <th class="p-4"><h3 class="text-xl">Payment Date</h3></th>
                        <th class="p-4"><h3 class="text-xl">Amount</h3></th>
                        <th class="p-4"><h3 class="text-xl">Post ID</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=petlover;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT * FROM pp_payment ORDER BY payment_id DESC";
                            
                            try{
                                $returnval=$dbcon->query($sqlquery);
                                
                                $productstable=$returnval->fetchAll();
                                
                                foreach($productstable as $row){
                                    ?>
                                        <tr>  
                                            <td class="px-8 py-1"><h4 class="text-lg"><?php echo $row['payment_id'] ?></h4></td>   
                                            <td class="px-8 py-1"><h4 class="text-lg"><?php echo $row['username'] ?></h4></td>   
                                            <td class="px-8 py-1"><h4 class="text-lg"><?php echo $row['payment_date'] ?></h4></td>   
                                            <td class="px-8 py-1"><h4 class="text-lg"><?php echo $row['amount'] ?></h4></td>
                                            <td class="px-8 py-1"><h4 class="text-lg"><?php echo $row['post_id'] ?></h4></td>
                                        </tr>
                                        </div>
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
                 </tbody>
            </table>
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