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
                <form action="addprocess_review.php" method="post" enctype="multipart/form-data">
                    <label class="text-lg leading-10">Ratings</label>
                    <select name="rname" class="block w-full p-2 border rounded border-gray-600">
                        <option value="5"> 5 </option>
                        <option value="4"> 4 </option>
                        <option value="3"> 3 </option>
                        <option value="2"> 2 </option>
                        <option value="1"> 1 </option>     
                    </select><br>
                    <label class="text-lg leading-10">Description</label>
                    <textarea name="dname" class="block w-full p-2 border rounded border-gray-600" placeholder="Write your feedback" cols="34" rows="8"></textarea><br><br>
                    <div class="flex justify-between">
                    <input type="submit" class="px-6 py-1 text-lg text-white border rounded border-gray-800 bg-blue-600 hover:bg-blue-700" value="Add review">
                    <a class="px-9 py-1 text-lg text-white border rounded border-gray-800 bg-red-600 hover:bg-red-700" href="reviewinfo.php">Cancel</a></div>
                </form>
                </div><br>
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