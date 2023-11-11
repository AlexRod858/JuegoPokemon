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

// ME LOS GUARDO EN EL ARAY
if (isset($_POST['add'])) {
    $nombre = $_POST['input'];
    $url = 'https://pokeapi.co/api/v2/pokemon/' . strtolower($nombre);
    $pokemonData = file_get_contents($url);
    $pokemonInfo = json_decode($pokemonData, true);

    $pokemon = new Pokemon(
        $pokemonInfo['name'],
        $pokemonInfo['sprites']['back_default'],
        $pokemonInfo['stats'][0]['base_stat'],
        $pokemonInfo['stats'][1]['base_stat'],
        $pokemonInfo['stats'][2]['base_stat']
    );

    $cinturon[] = $pokemon;

    // Almacenar $cinturon en la sesión
    $_SESSION['cinturon'] = $cinturon;
    header('Location: index.php');
}

// OBTENER FUNCION
function obtenerPokemon($numero)
{
    $url = 'https://pokeapi.co/api/v2/pokemon/' . $numero;
    $pokemonData = file_get_contents($url);
    $pokemonInfo = json_decode($pokemonData, true);

    return new Pokemon(
        $pokemonInfo['name'],
        $pokemonInfo['sprites']['front_default'],
        $pokemonInfo['stats'][0]['base_stat'],
        $pokemonInfo['stats'][1]['base_stat'],
        $pokemonInfo['stats'][2]['base_stat']
    );
}

// ARRAY CON 5 POKEMON RANDOM
function equipo_rival()
{
    $cinturon_rival = [];
    for ($i = 0; $i < 5; $i++) {
        $numeroAleatorio = rand(1, 151);
        $cinturon_rival[] = obtenerPokemon($numeroAleatorio);
    }
    return $cinturon_rival;
}
