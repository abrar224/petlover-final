<?php
    session_start();
    if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){

        if(isset($_POST['cname']) && isset($_POST['edname']) && isset($_POST['cvname']) && !empty($_POST['cname']) 
            && !empty($_POST['edname']) && !empty($_POST['cvname'])){
            
            $var1=$_SESSION['uname'];
            $var2='150';
            $var3=$_GET['postid'];
            
            try{
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=petlover;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sqlquery="INSERT INTO pp_payment VALUES(NULL,'$var1',CURRENT_DATE(),'$var2',$var3)";
                try{
                    $dbcon->exec($sqlquery);
                    ?>
                        <script>
                      window.location.assign('homepage_user.php');
                        </script>
                    <?php
                }
                catch(PDOException $ex){
                    ?>
                        <script>
                           window.location.assign('addpayment.php');
                        </script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('addpayment.php');
                    </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                    window.location.assign('addpayment.php');
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