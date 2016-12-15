<?php
require_once 'app/init.php';

//database is used using prepared statements
    $itemQuery =  $db->prepare("
     SELECT id , name , done 
            FROM item
            WHERE user = :user 
    ");

   $itemQuery->execute([
           'user'=> $_SESSION['user_id']
   ]);

   $items = $itemQuery->rowCount()?$itemQuery:[];

   foreach($items as $item){
       echo $item['name'];
   }
?>


<!DOCTYPE HTML>
<HTML>
<HEAD>
   <TITLE>TO DO LIST</TITLE>
   <meta charset="UTF-8">
   <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
   <link rel="stylesheet" href="css/main.css" >
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</HEAD>
<BODY>
   <div class="list">
      <h1 class="header" >To do</h1>
      <ul class="items">
         <li>
            <span class="item">first</span><a href="mark.php?as=&" class="done-button">Mark as done</a>
         </li>
         <li>
            <span class="item done">second</span>
         </li>
      </ul>
   <form class="item-add" action="#" method="post">
      <input type="text" name="name" placeholder="Type a new item" autocomplete="off" required class="input" maxlength="100" >
      <input type="submit" value="Add" class="submit">

   </form>

   </div>

</BODY>
</HTML>