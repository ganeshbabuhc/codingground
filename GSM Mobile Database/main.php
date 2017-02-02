<?php
require 'Newfile.php';
$driver = 'mysql';
$database = "dbname=CODINGGROUND";
$dsn = "$driver:host=localhost;unix_socket=/home/cg/mysql/mysql.sock;$database";

$username = 'root';
$password = 'root';

// try {
//   $conn = new PDO($dsn, $username, $password);
//   echo "<h2>Database CODINGGROUND Connected<h2>";
// }catch(PDOException $e){
//   echo "<h1>" . $e->getMessage() . "</h1>";
// }
// $sql = 'SELECT  * FROM users';
// $stmt = $conn->prepare($sql);
// $stmt->execute();

// echo "<table style='width:100%'>";
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//   echo "<tr>";
//   foreach($row as $value)
//   {
//     echo sprintf("<td>%s</td>", $value);
//   }
//   echo "</tr>";
// }
// echo "</table>";

	$simbol = array("&", "+");
        $kata = array("_and_", "_plus_");

 function mycurl($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_USERAGENT, "Googlebot/2.1 (http://www.googlebot.com/bot.html)");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
		
		// Gagal ngecURL
        if(!$site = curl_exec($ch)){
			return 'offline';
		}
		
		// success ngecURL
		else{
			return $site;
		}
	}  


$url  = 'http://www.gsmarena.com/makers.php3';
//st-text
		$ngecurl = mycurl($url);
		
		$html  = str_get_html($ngecurl);
			$div = $html->find('div[class=st-text]', 0);
			
			 $index=0;
			  foreach  ($div->find('td') as $td) {
				     $a=$td->find('a',0);
				    $page= $a->getAttribute('href');
				    //page for each brand list
				     $url="http://www.gsmarena.com/".$page;
				    
				     if($index<2){
				         $ngecurl = mycurl($url);
				     	$html  = str_get_html($ngecurl);
				     	$div = $html->find('div[class=makers]', 0);
				     	 $index1=1;
				     	 //page for each mobile
				     	   foreach  ( $div->find('li') as $li) {
				     	      // echo  $index1.$li->find('a',0)->getAttribute('href').'<br>';
				     	        $index1++;
				     	        //write mobile details geting code
				     	        //------------------------------start------------------------------
				     	        	$url  = 'http://www.gsmarena.com/'.$li->find('a',0)->getAttribute('href').'.php';
	                                $ngecurl = mycurl($url);
	                                $html  = str_get_html($ngecurl);
	                                $result["data"] = array();
	                                $result["title"] = $html->find('h1[class=specs-phone-name-title]', 0)->innertext;
                    				$img_div = $html->find('div[class=specs-photo-main]', 0);
                    				$result["img"] = $img_div->find('img', 0)->src;
                    				echo  $html->find('h1[class=specs-phone-name-title]', 0)->innertext.'<br>';
				     	        //-----------------------end---------------------------------------
				     	   }
				     	  
				     	  foreach($html->find('div[class=nav-pages]', 0)->find('a') as $aa){
				     	     $url="http://www.gsmarena.com/".$aa->getAttribute('href');
				     	      
				     	      
				     	        $ngecurl = mycurl($url);
				     	$html  = str_get_html($ngecurl);
				     	$div = $html->find('div[class=makers]', 0);
				     	 
				     	 //page for each mobile
				     	   foreach  ( $div->find('li') as $li) {
				     	       echo  $index1.$li->find('a',0)->getAttribute('href').'<br>';
				     	        $index1++;
				     	        //write mobile details geting code
				     	        //-----------------------------start-----------------------------------
				     	        //----------------------------------------end--------------------------
				     	   }
				     	  }
				     	   
				     }
				     $index++;
				    
				 }
?>
