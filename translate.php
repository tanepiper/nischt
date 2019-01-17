<?php 
	$source_language = $argv[1];
	$target_language = $argv[2];

	$api_key = 'TJzaSyBBXuS8m454oBRpp3fWn6oXg5fTW7WBrTx3';

	$file_content_lines = file ("input.txt", FILE_IGNORE_NEW_LINES);

	echo "----------------\r\n";
	echo "*** INTERNAL STRINGS ***\r\n";
	echo "----------------\r\n";

	$en_array = array();
	$target_array = array();

	foreach ($file_content_lines as $file_line) {
		if (!empty($file_line)) {
			
			$string_name = str_replace(',', '', substr($file_line, 0, 25));
			
			$key_internal_string = str_replace(" ","_", strtoupper($string_name));
			$value_internal_string = str_replace(" ","", ucwords($string_name));

			array_push($en_array, "\"".$value_internal_string."\": \"". $file_line."\",");

			if (!empty($target_language)) {
				$query = [
					'source' => $source_language,
					'target' => $target_language,
					'key' => $api_key,
					'q' => $file_line
				];

				$url = "https://translation.googleapis.com/language/translate/v2?".http_build_query($query);

				$json_response = json_decode(file_get_contents($url));
				
				$translated_text = $json_response->data->translations[0]->translatedText;

				array_push($target_array, "\"".$value_internal_string."\": \"". $translated_text."\",");
			}

			$internal_string = $key_internal_string.": '".$value_internal_string."',\r\n";

			echo $internal_string;
		}
	}

	// var_dump($en_array);
	echo "----------------\r\n";
	echo "*** EN STRINGS ***\r\n";
	echo "----------------\r\n";

	foreach ($en_array as $str_en) {
		echo $str_en."\r\n";
	}

	// var_dump($en_array);
	echo "----------------\r\n";
	echo "*** ".strtoupper($target_language)." STRINGS ***\r\n";
	echo "----------------\r\n";

	foreach ($target_array as $str_target) {
		echo $str_target."\r\n";
	}

	die();
?>