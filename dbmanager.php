<?php
try {
    $conn = new PDO('mysql:host=info344.c6rpdb8jg59z.us-east-2.rds.amazonaws.com;dbname=info344', 'info344user', '<password>');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
include_once('player.php');
$output = '';
$grace = 2;
if (isset($_POST['search'])){
    $search = $_POST['search'];
    $stmt = $conn -> query("SELECT * FROM NBA_PLAYERS WHERE levenshtein(Name, '$search') < $grace || levenshtein(Fname, '$search') < $grace || levenshtein(Lname, '$search') < $grace"); 
    if ($stmt -> rowCount() == 0) {
        echo "<br /> No Player Found";
    } else {
        while ($row = $stmt -> fetch()) {
            $player = new Player();
            $player -> name = $row['Name'];
            $player -> fname = $row['Fname'];
            $player -> lname = $row['Lname'];
            $player -> team = $row['Team'];
            $player -> gp = $row['GP'];
            $player -> ppg = $row['PPG'];
            $player -> m3pt = $row['M-3PT'];
            $player -> reb = $row['Tot-Rb'];
            $player -> ast = $row['Ast'];
            $output .=  '<div class="player">' .
                            '<div class="info">'. 
                                '<h2 class="name">' . $player->name.'</h2>' . 
                                '<h4>' .$player-> getTeam(). '</h4>' .
                                '<img src=' .$player-> getImg() . '/>' .
                            '</div>' . 
                            '<div>' .
                                '<p>' .$player-> getGp(). '</p>' . 
                                '<p>' .$player-> getPpg(). '</p>' .
                                '<p>' .$player-> getM3pt(). '</p>'. 
                                '<p>' .$player-> getReb(). '</p>'.
                                '<p>' .$player-> getAst(). '</p>' . '
                            </div>'. 
                        '</div>'; 
        }
    }
}
echo($output);

?>