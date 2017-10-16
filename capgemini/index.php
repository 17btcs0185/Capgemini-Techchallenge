<?php

/*
 * Complete the function below.
 */									
class capgemini {
		
	public function fnumber($input1,$input2)
	{ 	
		//First need to check city F value is unique;
		$unique = count($input2) !== count(array_unique($input2));
		//if all are unique city number then time to help a king
		
		if(!$unique){
			//$array_left = NULL;
			for($i = 1 ; $i <= count($input2) ; $i++)
			{ 
				
				///cheaking first city's power with kingdom K's power if they survive 
				if($i == 1){
						//Max F number of city in Servive kingdom 
						$city_1 = max($input2);
						if($input1 < $city_1){
							$index = $i;
							$index = $index - 1;
							//echo 'city '.$input2[$i].' is survive power '.$city_1;
							$first_city = $input2[$index];
							//print_r($survive_city);
						}else{
							$first_city = NULL;
						}
					}
				//Cheaking middile city if they can survive by Kingdom k's attack 
				if($i > 1 && $i < count($input2)){
					
					$index = $i;
					$index = $index - 1;
					$array_left = NULL;
					$array_right = NULL;
					///Checking  left side of city power and saving in to array 
					for($j = $index; $j >= 0; $j--){
						
						  $array_left[] = $input2[$j];
					}
					$array_sum_l = array_sum($array_left);
					
					///Checking  right side of city power and saving in to array 
					for($k = $index; $k < count($input2); $k++){
						
						  $array_right[] = ($input2[$k]);
					}
					$array_sum_r = array_sum($array_right);
					//cheaking loop city's power with kingdom K's power if they survive
				    $max_val = max($array_sum_l,$array_sum_r).'<br>';
					
					if($input1 < $max_val){
						//Middle City's Who is Servive
					    $middle_city[] = $input2[$index];
					}
					else{
						//No City is survive in middle passing NULL value
						$middle_city[] = NULL;
					}
				}
				
				///cheaking last city's with kingdom K's power if they survive or not
				if($i == count($input2)){
						$city_last = array_sum($input2);
						if($input1 < $city_last){
							$index = $i;
							$index = $index - 1;
							//echo 'city '.$input2[$index].' is survive power '.$city_last;
							$last_city = $input2[$index];
						}else{
							$last_city = NULL;
						}
				}
				
			}
			///cheaking all survive city on Kingdom and its lower F number
				if($last_city !=NULL){
					if($first_city != NULL){
						//if first city is survive then comphare to minmum f value with last city and middle cities
						//echo $first_city;
						//echo $last_city;
						echo min($first_city, min($middle_city),$last_city);
					}
					else{
						//if last city is survive checking min value with middle city
						if(strlen(implode($middle_city)) != NULL){
							echo min($last_city, min($middle_city));
						}else{
							//middle city is not survive  
							echo $last_city;
						}
					}
					
				}
				else{ echo '-1';}
			}else
			{
				echo 'City F number are not unique please re-enter number again.';
			}
	}
	
}

$obj = new capgemini;
$input1 = 5;
$input12 = array(4,2,3);
echo $get = $obj->fnumber($input1,$input12);

?>