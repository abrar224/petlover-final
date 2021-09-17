<?php
    session_start();
    $postid=$_GET['postid'];
    if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Add payment</title>
                <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">    
            <div><img src="logo.PNG" class="m-1 p-1 h-32"></div>
            </head>
            <body>
                <div class="max-w-sm mx-auto bg-gray-400 px-5 py-10 rounded shadow-xl">
                <form action="addprocess_payment.php?postid=<?php echo $postid?>" method="post" enctype="multipart/form-data">
  
                    <label class="text-lg leading-10">Card Number</label>
                    <input type="text" name="cname" class="block w-full p-2 border rounded border-gray-600" placeholder="Add Location" autocomplete="off"><br>
                    <label class="text-lg leading-10">Expire Date</label>
                    <input type="Date" name="edname" class="block w-full p-2 border rounded border-gray-600" placeholder="Add Location" autocomplete="off"><br>
                    <label class="text-lg leading-10">CV Code</label>
                    <input type="password" name="cvname" class="block w-full p-2 border rounded border-gray-600" placeholder="Add Location" autocomplete="off"><br><br>
                    <div class="flex justify-between">
                    <input type="submit" class="px-6 py-1 text-lg text-white border rounded border-gray-800 bg-blue-600 hover:bg-blue-700" value="Pay (150 TK)">
                    <a class="px-10 py-1 text-lg text-white border rounded border-gray-800 bg-red-600 hover:bg-red-700" href="deletepost.php?post=<?php echo $postid?>">Cancel</a></div>
                </form>
                </div>
            </body>
        </html>
    <?php
    }
    else{
        ?>
            <script>
                window.location.assign('index.html');
            </script>
        <?php
    }