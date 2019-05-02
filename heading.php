<?php
	function parsedJSONToUL($pjson) // return void, idk if we're on php 7 so i can't use typehints
	{
		foreach($pjson as $val)
		{
			?><li><a href="<?=$val['location'];?>"><?=$val['name'];?></a><?php // that echoed the beginning of the li tag and the a tag with the file location and tab title from the JSON
			
			if($val['dropdown'] === "true")
			{
				echo "<ul>\r\n";
				parsedJSONToUL($val['dropdown-data']); 
				// recursion probably bad, but it's quick and dirty
				// besides, no one should be nesting more than one level anyways
				
				echo "</ul>\r\n";
			}
			
			echo "</li>\r\n";
		}
	}
?>

<h1>ESports Database</h1>
<nav>
	<ul class="navigation">
		<?php
			$json = file_get_contents('navdata.json');
			$assoc_array = json_decode($json, true)['nav'];
			parsedJSONToUL($assoc_array);
		?>
	</ul>
</nav>