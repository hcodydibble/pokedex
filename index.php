<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Pokedex</title>
</head>
<body>
    <header>
        <div class='red-stripe'></div>
    </header>
    <div class='middle'>
        <h1 class='center'>Welcome, Trainer!</h1>
        <p class='center'>I've selected some random Pokemon that you can check the information of. Just use the drop down box below to choose one and hit submit!</p>
        <form class='center'>
            <select name="pokemon" class="other-center">
                <option disabled selected value="false">--- Choose a Pokemon ---</option>
                <?php
                    for ($i = 0; $i < 11; $i++){
                        $mon_name = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . rand(1, 150) . "/");
                        $mon_name = json_decode($mon_name, true);
                        echo "<option value='" . $mon_name['name'] . "'>" . ucwords($mon_name['name']) . "</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Submit">
        </form>
        <div class='center'>
            <?php
                if(array_key_exists('pokemon', $_GET)){

                    $name = $_GET['pokemon'];
                    echo "<h3>" . ucwords($name) . "</h3><hr class='shorten'>";
                    $pokemon = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $name . "/");
                    $pokemon = json_decode($pokemon, true);
                    echo "<img src='" . $pokemon['sprites']['front_default'] . "'>";
                    echo "<p>ID: " . $pokemon['id'] . "</p>";
                    echo "<p>Height: " . $pokemon['height'] . "</p>";
                    echo "<p>Weight: " . $pokemon['weight'] . "</p>";
                    echo "<p>Type: " . ucwords($pokemon['types'][0]['type']['name']) . "</p><br>";
                    echo "<p><strong>STATS</strong></p><hr class='shortener'>";
                    for ($i = count($pokemon['stats']) - 1; $i >= 0; $i--) {
                        echo "<p>" . ucwords($pokemon['stats'][$i]['stat']['name']) . ": " . $pokemon['stats'][$i]['base_stat'] . "</p>";
                    }
                }
            ?>
        </div>
    </div>
    <footer>
        <div class='red-stripe'></div>
    </footer>
</body>
</html>