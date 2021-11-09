<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$s_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$s_result = $s_country->fetchAll(PDO::FETCH_ASSOC);

?>


<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
  </tr>

  <?php foreach ($s_result as $row): ?>
<tr>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['continent']; ?></td>
  <td><?php echo $row['independence_year']; ?></td>
  <td><?php echo $row['head_of_state']; ?></td>
</tr>

<?php endforeach; ?>
  



