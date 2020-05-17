<!DOCTYPE html>
<html>
<head>
	<title>Read Text Files</title>
	<link rel="stylesheet" type="text/css" href="readFileStyle.css">
</head>
<body>
	<h1>Smart Home</h1>
	<h2>Read Text Files</h2>
	<div id="container">
		<table border="2px dashed">
			<tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>
			<?php 
				$root= $_SERVER['DOCUMENT_ROOT'];
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					if (file_exists("$root/../contacts.txt")) {
						unlink("$root/../contacts.txt");
					}					
				}
				try {
					@$file=fopen("$root/../contacts.txt", 'rb');
					if(!$file){
		              throw new Exception("<h2>No messages have been sent</h2>", 404);
	           		 }
	           		 else{
		            	flock($file, LOCK_SH);
		            	echo "<tr>";
		            	while (!feof($file)) {
		            		$data=fgetss($file);
		            		if (preg_match("/\-{5,10}/", $data)==1) {
		            			echo "</tr><tr>";
		            		}
		            		else{
		            			echo "<td>$data</td>";
		            		}
		            	}
		            }
		            flock($file, LOCK_UN);
		            fclose($file);
				} 
				catch (Exception $e) {
					echo $e->getMessage();
				}												
	            

			?>

		</table>	
		<p id="fileSize">Total file size is: <?php if(file_exists("contacts.txt")){
			echo filesize("contacts.txt");
		};?> bytes</p>
		<form method="POST" action="">
			<button type="submit">Delete Messages</button>	
			<p class="warning">Warning: Delete messages only if you've proccessed them!</p>
		</form>		
	</div>	
</body>
</html>