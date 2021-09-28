<?php
    session_start();
    if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){

        if(isset($_POST['lname']) && isset($_POST['dname']) && isset($_POST['pname']) && !empty($_POST['lname']) 
            && !empty($_POST['dname']) && !empty($_POST['pname'])){
            
            $var1=$_SESSION['uname'];
            $var2=$_POST['lname'];
            $var3=$_POST['dname'];
            $var5= rand(1000,9999);
            if($_FILES["pimage"]["size"]!=0){
                $var4=$_FILES['pimage'];
                move_uploaded_file($var4['tmp_name'],"images/$var5.jpg");    
            }
            $var6=$_POST['pname'];
            $var7='premium';
            
            
            try{
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=petlover;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if($_FILES["pimage"]["size"]!=0){
                $sqlquery="INSERT INTO adoption_post VALUES(NULL,'$var1','$var2','$var3','images/$var5.jpg','$var6','$var7')";
                } 
                else{
                $sqlquery="INSERT INTO adoption_post VALUES(NULL,'$var1','$var2','$var3',NULL,'$var6','$var7')";
                } 
                $sqlquery2="SELECT post_id FROM adoption_post WHERE (post_type='premium' AND username='$var1') ORDER BY post_id DESC";
                try{
                    $dbcon->exec($sqlquery);
                    $result=$dbcon->query($sqlquery2);
                    $postid=$result->fetchColumn();
                    ?>
                        <script>
                            var postid="<?php echo $postid ?>";
                            window.location.assign("addpayment.php?postid="+postid);
                            
                        </script>
                    <?php
                }
                catch(PDOException $ex){
                    ?>
                        <script>
                           window.location.assign('addpremium.php');
                        </script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('addpremium.php');
                    </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                    window.location.assign('addpremium.php');
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