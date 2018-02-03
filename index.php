<!DOCTYPE html>
<html>
<head>
    <title>Pokedex</title>
</head>
<body>
<h2>Welcome, Trainer!</h2>
<p>I've selected some random Pokemon that you can check the information of. Just use the drop down box below to choose one and hit submit!</p>
<form>
    <select name="pokemon">
        <option disabled selected value="false">--- Choose a Pokemon ---</option>
        <?php
            for ($i = 0; $i < 11; $i++){
                $mon_name = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . rand(1, 150) . "/");
                $mon_name = json_decode($mon_name, true);
                echo "<option value='" . $mon_name['name'] . "'>" . $mon_name['name'] . "</option>";
            }
        ?>
    </select>
    <input type="submit" value="Submit">
</form>
<div>
    <?php
        if(array_key_exists('pokemon', $_GET)){

            $name = $_GET['pokemon'];
            echo "<h3>" . $name . "</h3>";
            $pokemon = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $name . "/");
            $pokemon = json_decode($pokemon, true);
            echo "<p>ID: " . $pokemon['id'] . "</p>";
            echo "<p>Height: " . $pokemon['height'] . "</p>";
            echo "<p>Weight: " . $pokemon['weight'] . "</p>";
            echo "<p>Type: " . ucwords($pokemon['types'][0]['type']['name']) . "</p>";
        }
    ?>
</div>
</body>
</html>