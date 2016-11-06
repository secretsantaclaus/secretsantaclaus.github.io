<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>Saaaaaanta Claus is comin' to town!</title>
<meta name="Description" content="Search Page" />
<meta name="Keywords" content="Search" />
<script language="JavaScript">
function togglePop(id)
{
	if (document.getElementById(id).style.visibility == "visible") {
		document.getElementById(id).style.visibility = "hidden";
	} else {
		document.getElementById(id).style.visibility = "visible";
	}
}
</script>

<style type="text/css">
A:link { color:#991111; text-decoration: none; };
A:active { color:#991111; text-decoration: none; }
A:visited { color:#991111; text-decoration: none; }
A:hover { color:#BB4444; text-decoration: none; }
.main
{
padding:15px 25px;
position:relative;
margin:auto;
border:2px solid #E5AA7A;
width:800px;
min-height:300px;
background-color:#EEEEEE;
text-align:center;
font-family: 'Cookie', cursive, Helvetica, Arial, Calibri, serif;
font-weight:bold;
color:#AA2222;
font-size:40px;
border-radius: 15px;
-moz-border-radius: 15px;
-webkit-border-radius: 15px;
}
.button {
color:#EEEEEE;
font-size:21px;
text-shadow: 1px 1px 1px #080808;
font-family:Calibri,Arial,Helvetica,sans-serif;
font-weight:bold;
border: 4px outset #991111;
padding: 2px 10px;
background-color:#771111;
border-radius: 15px;
-moz-border-radius: 15px;
-webkit-border-radius: 15px;
}
.button:hover {
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#771111', endColorstr='#993333');
background: -webkit-gradient(linear, left top, right top, from(#771111), to(#993333));
background: -moz-linear-gradient(left,  #771111,  #993333);
}
.button:active {
border: 4px inset #881111;
}
.button:focus {
outline: none;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#771111', endColorstr='#993333');
background: -webkit-gradient(linear, left top, right top, from(#771111), to(#993333));
background: -moz-linear-gradient(left,  #771111,  #993333);
}
.whatsthis {
font-family:Calibri,Arial,Helvetica,sans-serif;
font-size:15px;
}
.whatsthispop {
   position:absolute; left:-160; top:20; width:500;
   border-style:solid;
   border-width:4;
   border-color:#771111;
   background-color:#DDDDDD;
   padding: 5px;
   color: #991111;
   font-family: Calibri,Arial,Helvetica,sans-serif;
   font-size: 15px;
   visibility:hidden;
   border-radius: 8px;
   -border-radius: 8px;
   -webkit-border-radius: 8px;
}
.canPick {
font-size:30px;
border-radius: 10px;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
}
.inputText {
font-family:Calibri,Arial,Helvetica,sans-serif;
font-weight:bold;
font-size:20px;
border-radius: 10px;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
}
.inputText:focus {
background-color:#FFDDDD;
outline:none;
}
table
{
position:relative;
margin:auto;
text-align:center;
font-weight:bold;
color:#AA2222;
font-size:40px;
}
h1 {
margin:auto;
color:#EEEEEE;
font-family: 'Sancreek', cursive;
font-size:70px;
}
h2 {
font-size:30px;
}
h3
{
font-size:30px;
color:#CC8888;
}
h4
{
position:relative;
margin:auto;
font-size:80px;
color:#CC8888;
}
</style>
</head>
<link href='http://fonts.googleapis.com/css?family=Sancreek' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

<body background=bg1.png bgcolor=#AA2222>
<div style=text-align:center>
<h1>SECRET SANTA GENERATOR</h1>
<div class=main style=min-height:1px>

<table>

<?php

error_reporting(E_ALL & ~E_STRICT);

 $all_santas_set = false;
 if ( isset($_POST["num_santas"]) && $_POST["num_santas"] > 0 ) {
	$all_santas_set = true;
	for ($i = 0; $i < $_POST["num_santas"]; $i++) {
		if (!isset($_POST["santa_" . $i . "_name"]) || !isset($_POST["santa_" . $i . "_email"])) {
			$all_santas_set = false;
		}
	}
 }
 
 if ( $all_santas_set ) {
	if ($_POST["submit_santas"] == "fine tuning") {
		echo
		"<tr><td><h3>1. Tell us how many Santas you want</h3></td><td><h4>></h4></td><td><h3>2. Enter names and email addresses</h3></td><td><h4>></h4></td><td style='padding:16px'><h2>3. Fine tuning...</h2></td><td><h4>></h4></td><td><h3>4. Done! We'll email each Santa their selection</h3></td></tr>
		</table>";
		$names_emails_non_empty = TRUE;
		for ($i = 0; $i < $_POST["num_santas"]; $i++) {
			if (($_POST["santa_" . $i . "_name"] == "") || ($_POST["santa_" . $i . "_email"] == "")) {
				$names_emails_non_empty = FALSE;
			}
		}
		if ($names_emails_non_empty) {
			
			echo "<form action=\"\" method=\"post\">" .
			"<table><td>Gift price:<div class=whatsthis>(leave blank for no limit)</div></td><td valign=top>From &nbsp;&pound;<input class=inputText type=text name=\"lowerlimit\" size=8 />&nbsp; to &nbsp;&pound;<input class=inputText type=text name=\"upperlimit\" size=8 /></td></table><div style=\"height:15px\" > </div>" .
			"<input type=\"hidden\" name=\"num_santas\" value=" . $_POST["num_santas"] . " />
			<table class=canPick width=96%>";
			for ($i = 0; $i < $_POST["num_santas"]; $i++) {
				if (($i % 3) == 0) {
					echo "<tr>";
				}
				if (($i % 2) == 0) {
					$tdc = "#EEAAAA";
				} else {
					$tdc = "#FF9999";
				}
				echo "<td class=canPick width=30% bgcolor=\"" . $tdc . "\" ><b>" . $_POST["santa_" . $i . "_name"] . " can pick...</b><br><table class=canPick >";
				for ($j = 0; $j < $_POST["num_santas"]; $j++) {
					if ($i != $j) {
						echo "<tr><td>" . $_POST["santa_" . $j . "_name"] . "</td><td><input type=\"checkbox\" name=\"" . $i . "_" . $j . "\" checked=\"yes\"></td></tr>";
					}
				}
				echo "</table>
					<input type=\"hidden\" name=\"santa_" . $i . "_name\", value=\"" . $_POST["santa_" . $i . "_name"] . "\">
					<input type=\"hidden\" name=\"santa_" . $i . "_email\", value=\"" . $_POST["santa_" . $i . "_email"] . "\"><p>";
				echo "</td>";
			}
			echo "</table><input type=\"submit\" name=\"submit_santas\" value=\"DONE!\" class=button ></form>";
		} else {
			echo "<h2>It appears at least one of the names or email addresses you entered was empty.<br>
			<a href='javascript:history.go(-1);'>
			Go back and fix this!</a></h2>";
		}
	} else {
		echo "<tr><td><h3>1. Tell us how many Santas you want</h3></td><td><h4>></h4></td><td><h3>2. Enter names and email addresses</h3></td><td><h4>></h4></td><td style='padding:16px'><h3>3. Fine tuning...</h3></td><td><h4>></h4></td><td><h2>4. Done! We'll email each Santa their selection</h2></td></tr>
		</table>";
		
		$names_emails_non_empty = TRUE;
		for ($i = 0; $i < $_POST["num_santas"]; $i++) {
			if (($_POST["santa_" . $i . "_name"] == "") || ($_POST["santa_" . $i . "_email"] == "")) {
				$names_emails_non_empty = FALSE;
			}
		}
		
		if ($names_emails_non_empty) {
			$santas = array();
			for ($i = 0; $i < $_POST["num_santas"]; $i++) {
				$exclude = array();
				if ($_POST["submit_santas"] == "DONE!") {
					for ($j = 0; $j < $_POST["num_santas"]; $j++) {
						if ($i != $j && !isset($_POST["" . $i . "_" . $j])) {
							$exclude[] = $j;
						}
					}
				}
				$santas[] = array("name" => $_POST["santa_" . $i . "_name"], "email" => $_POST["santa_" . $i . "_email"], "exclude" => $exclude, "buying.for" => NULL);
			}
		
			//$santas = array_reverse($santas);
			$exclude_lengths = array();
			for ($i = 0; $i < $_POST["num_santas"]; $i++) {
				$exclude_lengths[] = count($santas[$i]["exclude"]);
			}
			arsort($exclude_lengths);
			$exclude_length_keys = array_keys($exclude_lengths);
			/*
			$sorted_santas = array();
			for ($i = 0; $i < $_POST["num_santas"]; $i++) {
				$sorted_santas[] = $santas[$exclude_length_keys[$i]];
			}
			$santas = $sorted_santas;
			*/
			$remaining = array();
			for ($i = 0; $i < count($santas); $i++) {
				$remaining[] = $i;
			}
		 
			$i = 0;
			$num_attempts = 0;
			$last = $exclude_length_keys[count($exclude_length_keys)-1];
			while (is_null($santas[$last]["buying.for"]) && $num_attempts < 100000) {
				$x = $exclude_length_keys[$i];
				$eligible = array_merge(array_diff($remaining, $santas[$x]["exclude"], array($x)));
				if (count($eligible) > 0) {
					$picked = $eligible[rand(0, count($eligible)-1)];
					$santas[$x]["buying.for"] = $picked;
					$remaining = array_diff($remaining, array($picked));
					$i++;
				} else {
					$remaining = array();
					for ($j = 0; $j < count($santas); $j++) {
						$remaining[] = $j;
					}
					$i = 0;
					$num_attempts++;
				}
			}
			if ($num_attempts > 99999) {
				echo "Hmm. We've not managed to find a situation where everyone is picked once (and we've tried A LOT).<br>
				Are you sure it's possible with the group (and any fine tuning) you specified? Feel free to try again!";
			} else {
				echo "All names picked!";
	 
				//require_once "class.phpmailer.php";
			    /*
			    $smtpconf['username'] = 'secret.santa.head.elf@gmail.com';
			    $smtpconf['password'] = 'rosesuchak';
			    $smtpconf['host'] = 'ssl://smtp.gmail.com';
			    $smtpconf['port'] = '465';
			    $smtpconf['auth'] = true;

			    // set the recipient, subject and body
			    $to = 'wirthchris@aol.com';
			    $from = $smtpconf['username'];
			    $subject = 'This is a Gmail SMTP test email..';
			    $body = '..and it works! :)';

                            $headers['From'] = $from;
			    $headers['To'] = $to;
			    $headers['Subject'] = $subject;

			    require_once 'Mail.php';

			    $smtp = Mail::factory('smtp', $smtpconf);

			    $mail = $smtp->send($to, $headers, $body);

			    if (PEAR::isError($mail)) {
			    	// if error then use php mail() instead 
			    	// mail($to, $subject, $body, 'From: '.$from);
			    	echo 'Err... there was an err';
			    } else echo 'Message sent successfully!';
	                    */
	                    
		
			    $smtpconf['username'] = "secret.santa.head.elf@gmail.com";
			    $smtpconf['password'] = 'rosesuchak';
			    $smtpconf['host'] = 'ssl://smtp.gmail.com';
			    $smtpconf['port'] = '465';
			    $smtpconf['encryption'] = 'ssl';
			    $smtpconf['auth'] = true;
			    require_once 'Mail.php';
			    $maily = new Mail();
			    $smtp =& Mail::factory('smtp', $smtpconf);
			    $from = "Secret Santa's Head Elf <" . $smtpconf['username'] . ">";
			    $subject = 'Secret Santa news!';
			
				
				
			    for ($i = 0; $i < count($santas); $i++) {
                                /*
                                $mail = new PHPMailer();
                                $mail->IsSMTP();
                                $mail->SMTPAuth   = true;                  
                                $mail->SMTPSecure = "ssl";                
                                $mail->Host       = "level.x10hosting.com";      
                                $mail->Port       = 465;                   
                                $mail->Username   = "headelf@secretsanta.x10.mx";  
                                $mail->Password   = "r0se5uchak";            

                                $mail->SetFrom('headelf@secretsanta.x10.mx', "Secret Santa's Head Elf");

                                $mail->AddReplyTo("headelf@secretsanta.x10.mx","Secret Santa's Head Elf");

                                $mail->Subject    = "Secret Santa news!";
				*/

				$limitText = "";
				$somethingInUpperLimit = false;
				$somethingInLowerLimit = false;
				if (isset($_POST["upperlimit"])) {
					if ($_POST["upperlimit"] != "") {
						$somethingInUpperLimit = true;
					}
				}
				if (isset($_POST["lowerlimit"])) {
					if ($_POST["lowerlimit"] != "") {
						$somethingInLowerLimit = true;
					}
				}
				if ($somethingInUpperLimit && $somethingInLowerLimit) {
					if ($_POST["lowerlimit"] == $_POST["upperlimit"]) {
						$limitText = "The budget is £" . $_POST["upperlimit"] . ".";
					} else {
						$limitText = "You should spend between £" . $_POST["lowerlimit"] . " and £" . $_POST["upperlimit"] . ".";
					}
				} else if ($somethingInUpperLimit) {
					$limitText = "You should spend no more than £" . $_POST["upperlimit"] . ".";
				} else if ($somethingInLowerLimit) {
					$limitText = "You should spend at least £" . $_POST["lowerlimit"] . ".";
				}
				
					$body = "Hi " . $santas[$i]["name"] . ",\n\n"
					. "For our Secret Santa, you have drawn " . $santas[$santas[$i]["buying.for"]]["name"] . ". Nobody has been shown this information other than you. Now the fun part starts - get thinking of a special gift for " . $santas[$santas[$i]["buying.for"]]["name"] . "! " . $limitText . "\n\n"
					. "Have fun and, of course, Merry Christmas!\n\n"
					. "Secret Santa's Head Elf";
					$htmlBody = str_replace("\n\n", "<p>", $body);
					$htmlBody = str_replace("£", "&pound;", $htmlBody);
					
					$to = $santas[$i]["name"] . " <" . $santas[$i]["email"] . ">";
					
                            		$headers['From'] = $from;
			    		$headers['To'] = $to;
			    		$headers['Subject'] = $subject;

/*# comment this when actually sending mail
					echo "<br><p>";
					$htmlBody = str_replace("Hi", "This is a message for", $htmlBody);
					$htmlBody = str_replace("Nobody has been shown this information other than you. ", "", $htmlBody);
					$htmlBody = str_replace("Merry", "have a Merry", $htmlBody);			
					$htmlBody = str_replace(",<p>", ".<p>", $htmlBody);	
					echo $htmlBody;
					echo "<p><br>";
		*/			
 # uncomment this when actually sending mail					
					$mail = $smtp->send($to, $headers, $body);


			    		if (PEAR::isError($mail)) {
			    		        //echo "<p>" . $mail->getMessage() . "<p>";
			    			// if error then use php mail() instead 
			    			// mail($to, $subject, $body, 'From: '.$from);
			    			echo $mail->getMessage() . '<p>Oh no! Something went wrong trying to email ' . $santas[$i]["name"] . '. Sorry. Please try again ...Please!</p>';
			    		} else echo '<p> Message sent to ' . $santas[$i]["name"] . '!';

					
					/*$mail->AltBody    = $body;
					$mail->MsgHTML($htmlBody);
					$mail->AddAddress($santas[$i]["email"], $santas[$i]["name"]);
					if(!$mail->Send()) {
					  echo("<p>Oh no! Something went wrong trying to email " . $santas[$i]["name"] . ". Sorry. Please try again ...Please!</p>");
					} else {
					  echo("<p>Message sent to " . $santas[$i]["name"] . "!</p>");
					}*/

			    }
			}
		} else {
			echo "<h2>It appears at least one of the names or email addresses you entered was empty.<br>
			<a href='javascript:history.go(-1);'>
			Go back and fix this!</a></h2>";
		}
	}
 } else if (isset($_POST["num_santas"]) && is_numeric($_POST["num_santas"]) && $_POST["num_santas"] > 2) {
 	
	echo "<tr><td><h3>1. Tell us how many Santas you want</h3></td><td><h4>></h4></td><td><h2>2. Enter names and email addresses</h2></td><td><h4>></h4></td><td style='padding:16px'><h3>3. Fine tuning...</h3></td><td><h4>></h4></td><td><h3>4. Done! We'll email each Santa their selection</h3></td></tr>
	</table>
	<form action=\"\" method=\"post\"><table><tr><td>Name</td><td>Email</td></tr>";
	
	for ($i = 0; $i < $_POST["num_santas"]; $i++) {
		echo "<tr><td><input class=inputText type=\"text\" name=\"santa_" . $i . "_name\" /></td><td><input class=inputText type=\"text\" name=\"santa_" . $i . "_email\" /></td></tr>";
	}
	echo "<input type=\"hidden\" name=\"num_santas\" value=" . $_POST["num_santas"] . " />
	<tr>
	<td align=right valign=top class=whatsthis ><input type=\"submit\" name=\"submit_santas\" value=\"fine tuning\" class=button /><br>
	<span style=\"position:relative; text-align:justify;\">
	<span id=\"what\" class=\"whatsthispop\">
	Sometimes life can be complicated. If certain people don't want to pick each other for this Secret Santa - for example if some Santas don't know everybody involved, or if some of the Santas are family members or a couple who are already buying presents for each other - you can click 'fine tuning' to specify who can buy for whom.
	<div style=\"height:8px\"></div>
	You can also set a price limit, if you want!
	</span>
	<a href=\"javascript:void(0);\" onClick=\"togglePop('what');\">
	what's this?
	</a></span>
	</td><td align=left valign=top><input type=\"submit\" name=\"submit_santas\" value=\"DONE\" class=button /></td></tr></table>
	</form>";
	
 } else {
 
 
	echo 
	"<tr><td><h2>1. Tell us how many Santas you want</h2></td><td><h4>></h4></td><td><h3>2. Enter names and email addresses</h3></td><td><h4>></h4></td><td style='padding:16px'><h3>3. Fine tuning...</h3></td><td><h4>></h4></td><td><h3>4. Done! We'll email each Santa their selection</h3></td></tr>
	</table>
	<form action=\"\" method=\"post\">
	Number of Santas: <input class=inputText type=\"text\" name=\"num_santas\" />
	<input type=\"submit\" value=\"Next!\" class=button />
	</form>";
 }

 ?>

</div>
</body>
</html>		