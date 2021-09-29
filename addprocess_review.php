<?php
    session_start();
    if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){

        if(($_POST['dname']) && isset($_POST['rname']) && !empty($_POST['dname']) && !empty($_POST['rname'])){
            $var1=$_SESSION['uname'];
            $var2=$_POST['dname'];
            $var3=$_POST['rname'];
            
            try{
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=petlover;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sqlquery="INSERT INTO review VALUES(NULL,'$var1','$var2','$var3')";
                try{
                    $dbcon->exec($sqlquery);
                    ?>
                        <script>
                      window.location.assign('reviewinfo.php');
                        </script>
                    <?php
                }
                catch(PDOException $ex){
                    ?>
                        <script>
                           window.location.assign('addreview.php');
                        </script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('addreview.php');
                    </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                    window.location.assign('addreview.php');
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