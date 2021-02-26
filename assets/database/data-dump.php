<?php

include "./db-constants.php";

// LOCATIONS DUMP
const LOCATION_URL = "https://rickandmortyapi.com/api/location";
$locations = fetchAll(LOCATION_URL);
echo count($locations) . " locations fetched\n";
saveLocations($locations);

// EPISODES DUMP
const EPISODES_URL = "https://rickandmortyapi.com/api/episode";
$episodes = fetchAll(EPISODES_URL);
echo count($episodes) . " episodes fetched\n";
saveEpisodes($episodes);

// CHARACTERS DUMP
const CHARACTER_ULR = "https://rickandmortyapi.com/api/character";
$characters = fetchAll(CHARACTER_ULR);
echo count($characters) . " characters fetched\n";
saveCharacters($characters);
saveCharacterEpisode($characters);

function fetchAll($initialURL) {
    $results = array();
    $output = array();
    $output['info']['next'] = $initialURL;
    do {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $output['info']['next']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $results = array_merge($results, $output['results']);

    } while($output['info']['next']);
    return $results;
}

function saveLocations($locations) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $valuesString = join(",", array_map ( function ($location) {
        return "(". $location['id'] . "," .
        '"'.$location['name'].'"' . "," .
        '"'.$location['type'].'"' . "," .
        '"'.$location['dimension'].'"' . ")";
    }, $locations));
    $query = "INSERT INTO location VALUES $valuesString";
    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $conn->close();
}

function saveEpisodes($episodes) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $valuesString = join(",", array_map ( function ($episode) {
        return "(". $episode['id'] . "," .
        '"'.$episode['name'].'"' . "," .
        '"'.date("Y-m-d", strtotime($episode['air_date'])).'"' . "," .
        '"'.substr($episode['episode'], 1, 2).'"' . "," .
        '"'.substr($episode['episode'], 4, 2).'"' . ")";
    }, $episodes));
    $query = "INSERT INTO episode VALUES $valuesString";
    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $conn->close();
}

function saveCharacters($characters) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $valuesString = join(",", array_map ( function ($character) {
        return "(". $character['id'] . "," .
        '"'.$character['name'].'"' . "," .
        '"'.$character['status'].'"' . "," .
        '"'.$character['species'].'"' . "," .
        '"'.$character['gender'].'"' . "," .
        (basename($character['origin']['url']) ? basename($character['origin']['url']) : 'NULL') . "," .
        (basename($character['location']['url']) ? basename($character['location']['url']) : 'NULL') . ")";
    }, $characters));
    $query = "INSERT INTO character_ VALUES $valuesString";
    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $conn->close();
}

function saveCharacterEpisode($characters) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $valuesString = join(",", array_map ( function ($character) {
        return join(",", array_map ( function ($episodeUrl) use($character) {
            return "(". 
            $character['id'] . "," .
            (basename($episodeUrl) ? basename($episodeUrl) : 'NULL') . ")";
        }, $character['episode']));
    }, $characters));
    $query = "INSERT INTO character_episode(character_id, episode_id) VALUES $valuesString";
    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $conn->close();
}