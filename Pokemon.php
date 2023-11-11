<?php
// if (session_status() == PHP_SESSION_NONE) {
session_start();
// }
class Pokemon
{
    public $nombre;
    public $imagen;
    public $ataque;
    public $vida;
    public $defensa;

    public function __construct($nombre, $imagen, $ataque, $vida, $defensa)
    {
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->ataque = $ataque;
        $this->vida = $vida;
        $this->defensa = $defensa;
    }
}

$cinturon = [];

// Verificar si $_SESSION['cinturon'] está definido
if (isset($_SESSION['cinturon'])) {
    $cinturon = $_SESSION['cinturon'];
}

if (isset($_POST['add'])) {
    $nombre = $_POST['input'];
    $url = 'https://pokeapi.co/api/v2/pokemon/' . strtolower($nombre);
    $pokemonData = file_get_contents($url);
    $pokemonInfo = json_decode($pokemonData, true);

    // Verificar si la información de Pokemon es válida antes de crear el objeto
    if (!empty($pokemonInfo) && isset($pokemonInfo['name'], $pokemonInfo['sprites']['front_default'], $pokemonInfo['stats'][0]['base_stat'], $pokemonInfo['stats'][1]['base_stat'], $pokemonInfo['stats'][2]['base_stat'])) {
        $pokemon = new Pokemon(
            $pokemonInfo['name'],
            $pokemonInfo['sprites']['front_default'],
            $pokemonInfo['stats'][0]['base_stat'],
            $pokemonInfo['stats'][1]['base_stat'],
            $pokemonInfo['stats'][2]['base_stat']
        );

        $cinturon[] = $pokemon;

        // Almacenar $cinturon en la sesión
        $_SESSION['cinturon'] = $cinturon;
        header('Location: index.php');
    } else {
        echo "La información del Pokémon no es válida.";
    }
}
