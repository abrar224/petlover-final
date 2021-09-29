<?php
    session_start();
    if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Add free post</title>
                <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">    
            <div><img src="logo.PNG" class="m-1 p-1 h-32"></div>
            </head>
            <body>
               <div class="max-w-sm mx-auto bg-gray-400 px-5 py-10 rounded shadow-xl">
                <form action="addprocess_premium.php" method="post" enctype="multipart/form-data">
                    <label class="text-lg leading-10">Location</label>
                    <input type="text" name="lname"  class="block w-full p-2 border rounded border-gray-600" placeholder="Add Location" autocomplete="off"><br>
                    <label class="text-lg leading-10">Price</label>
                    <input type="number" name="pname"  class="block w-full p-2 border rounded border-gray-600" placeholder="Add Price" autocomplete="off"><br>
                    <label class="text-lg leading-10">Description</label>
                    <textarea name="dname" class="block w-full p-2 border rounded border-gray-600" placeholder="Add Description" cols="34" rows="8"></textarea><br>
                    <label class="text-lg leading-10">Add image</label>
                    <input type="file" name="pimage"><br><br>
                    <div class="flex justify-between">
                    <input type="submit" class="px-4 py-1 text-lg text-white border rounded border-gray-800 bg-blue-600 hover:bg-blue-700" value="Premium Post">
                    <a class="px-10 py-1 text-lg text-white border rounded border-gray-800 bg-red-600 hover:bg-red-700" href="homepage_user.php">Cancel</a></div>
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