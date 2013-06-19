<?php 

/*

Author : Siddhu Arevindh 
Url  : http://arevindh.com/me
Skype : arevindh
Facebook ID finder using user id 
Written in PHP 


Usage 
http://domain.com/facebook.php

Direct Usage
http://domain.com/facebook.php?fn=username

test utl  http://webzeena.com/fb.php?fn=arevindh

*/ 

?>
<html>

<head>
<title> Facebook Profile ID Finder </title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 

</head>
<body align="center">
<h2>Facebook Profile ID Checker</h2>


<?php

if(isset($_GET['fn']))
{
    $un=$_GET['fn'];
    $graph_url="https://graph.facebook.com/".$un;

    $json = file_get_contents($graph_url,0,null,null);
    $json_output = json_decode($json, true);
    if(isset($json_output['error']))

      {
        echo ("Invalid Profile");
      }

    else 
      {
        echo "<img src='https://graph.facebook.com/".$_GET['fn']."/picture/?width=100&height=100'/> <br/><br/>";
        echo $json_output['name']."'s Facebook id is ";
        echo $json_output['id'];

        if(isset($json_output['likes']))
          {

            echo "<br /> <br />This is a page and it have ".$json_output['likes']." likes";
          }
      else 
          {
   
            echo "<br /><br />This is a Facebook Profile";
   
          }

      }
      
    echo '<br /> <br /> <a href="facebook.php"> Check Another </a>';
    echo "<br /> <br /> Coded By <a href='http://arevindh.com/me/'>Siddhu </a>";

    }

    else 

      { ?>
        <br />
        <form action="facebook.php" methord="GET">
        Enter user Name: <input type="text" name="fn"><br /><br />
        <input type="submit" value="Get ID">
        </form>

<?php }  ?>

</body>
</html>
