<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$urlrequest = $_SERVER['REQUEST_URI'];
$query = parse_url($urlrequest, PHP_URL_QUERY);
parse_str($query, $param);
$contxt = $_GET['context'];
$context = filter_var($contxt, FILTER_SANITIZE_STRING);


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$s_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$s_result = $s_country->fetchAll(PDO::FETCH_ASSOC);
$s_cities = $conn->query("SELECT * FROM countries JOIN cities ON countries.code = cities.country_code where countries.name LIKE '%$country%'");
$c_result = $s_cities->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if ($context == "cities"): ?>

	<table>
		<tr>
			<th>Name</th>
			<th>District</th>
			<th>Population</th>
		</tr>
	<?php foreach ($c_result as $row): ?>
		<tr>
	  		<td><?= $row['name'];?></td>
	  		<td><?= $row['district'];?></td>
	  		<td><?= $row['population'];?></td>
	  	</tr>
	<?php endforeach; ?>
	</table>
<?php endif;?>

<?php if ($context != "cities"): ?>
<table>
	<tr>
		<th>Name</th>
		<th>Continent</th>
		<th>Independence</th>
		<th>Head of State</th>
	</tr>
<?php foreach ($s_result as $row): ?>
	<tr>
  		<td><?= $row['name'];?></td>
  		<td><?= $row['continent'];?></td>
  		<td><?= $row['independence_year'];?></td>
  		<td><?= $row['head_of_state']; ?></td>
  	</tr>
<?php endforeach; ?>
</table>
<?php endif;?>
  



