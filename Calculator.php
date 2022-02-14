<!DOCTYPE html>
<html>
<head>
   <title>Project 1</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
   <!-- Create the form -->
   <form action ="Project_1.php" method='POST'>
   <h2>Calculator</h2>
   <p><label>Enter first number: <input type="value1" name="first_number"></label></p>
   <p><label>Enter second number: <input type="value2" name="second_number"></label></p>
   <p><label>Please select an operator: <select name="operator">   
      <option value=""></option>
      <option value="+">+</option>
	  <option value="-">-</option>
	  <option value="*">*</option>
	  <option value="/">/</option>
   </select></label></p>
   <p><input type="submit" name="calculate" value="Calculate"></p>
   </form>
<?php
//Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//Form validation
	$first_number = $_POST['first_number'];
	$second_number = $_POST['second_number'];
	$operator = $_POST['operator'];
	$first_num = str_replace(' ', '', $first_number);
	$second_num = str_replace(' ', '', $second_number);
	//Calculate the results
	if (isset($_POST['calculate'])) {	
		if (($first_num == "" and $second_num == "") and
		    $operator == "") {
			$calculate = "<h4>...Please fill out the form.</h4>";	
		}
		else if (($first_num == "" or $second_num == "") and 
			($operator == "+" or $operator == "-" or $operator == "*" 
			or $operator == "/")) {
			$calculate = "<h4>$first_number $operator $second_number</h4>";
		}
		else if ((is_numeric($first_num) !== true and  
		    is_numeric($second_num) !== true) or
            (is_numeric($first_num) !== true or  
		    is_numeric($second_num) !== true) and 
			($operator == "+" or $operator == "-" or $operator == "*" 
			or $operator == "/")) {
			$calculate = "<h4>...Please input only numbers.</h4>";
		}
		else if ($operator == "+") {
			$calculate = $first_num + $second_num;
		}
		else if ($operator == "-") {
			$calculate = $first_num - $second_num;
		}
		else if ($operator == "*") {
			$calculate = $first_num * $second_num;
		}
		else if ($first_num == "0" and $second_num == "0" and
		$operator == "/") {
			$calculate = "<h4>Undefined.</h4>";
		}
		else if ($operator == "/") {
			$calculate = $first_num / $second_num;
		}
		else {
			$calculate = "<h4>$first_number $operator $second_number</h4>";	
		}
		//Print the results
        echo "<h4>$first_number $operator $second_number</h4>";	
        echo "<h4>The answer is: $calculate</h4>";		
    }
}
?>
</body>
</html>
