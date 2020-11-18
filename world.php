<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$context = filter_input(INPUT_GET, "context", FILTER_SANITIZE_STRING);

if ($context == "cities") {
	$locate = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");
}else {
	$locate = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

$results= $locate->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if($context == "cities"): ?>
  <table>
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>

    <?php foreach ($results as $row): ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['district']; ?></td>
        <td><?php echo $row['population']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

<?php else: ?>
  <table>
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>

    <?php foreach ($results as $row): ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['continent']; ?></td>
        <td><?php echo $row['independence_year']; ?></td>
        <td><?php echo $row['head_of_state']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif ?>