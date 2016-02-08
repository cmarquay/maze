<?php

    /*J'initialise mes tableaux*/
    $nord = array( 0=>-1, 1=>0, 2=>-1, 3=>-1, 4=>1, 5=>-1, 6=>3, 7=>4, 8=>5, 9=>-1, 10=>-1);
    $est = array( 0=>-1, 1=>2, 2=>-1, 3=>-1, 4=>-1, 5=>6, 6=>10, 7=>8, 8=>9, 9=>-1, 10=>-1);
    $sud = array( 0=>1, 1=>4, 2=>-1, 3=>6, 4=>7, 5=>8, 6=>-1, 7=>-1, 8=>-1, 9=>-1, 10=>-1);
    $ouest = array(0=>-1, 1=>-1, 2=>1, 3=>-1, 4=>-1, 5=>-1, 6=>5, 7=>-1, 8=>7, 9=>8, 10=>6);
    $enigmes = array(
        0=>"Il est emprunté à l'ancien anglais suth (XI<sup>e</sup>-XII<sup>e</sup> siècles), lui-même déformé du saxon Sund, désignant le soleil",
        1=>"Le terme « méridien » en est un synonyme vieilli, mais l'adjectif « méridional » qui en découle reste très usité",
        2=>"Il correspond au point moyen (exact à l'équinoxe) de la direction du coucher du soleil",
        3=>"En géopolitique ou en économie, comprend de nombreux pays en voie de développement",
        4=>"Equivalent au terme de midi, désignant le moment où le soleil est à son apogée",
        5=>"Désignait, du temps de la Guerre froide, tous les pays de l'Europe centrale et orientale sous influence soviétique (Pacte de Varsovie) ou à économie socialiste",
        6=>"En Europe, ce terme est couramment utilisé pour désigner tout ce qui a trait à la géographie, l'histoire ou la culture des pays situés depuis la Turquie jusqu'au Japon",
        7=>"Il correspond au point moyen (exact à l'équinoxe) de la direction du lever du soleil",
        8=>"Département français comprenant les territoires les plus septentrionaux de la métropole, d'où son nom",
        9=>"Ce mot a été employé pour désigner les pays d'Amérique du Nord et d'Europe (incluant parfois quelques pays alliés comme le Japon et l'Australie) pendant la Guerre froide, caractérisés par une économie de marché et des systèmes politiques pluralistes"
    );

    /*J'initialise la variable piece qui vaut 0 par défaut, le numéro de la pièce sinon*/
    $piece=0;
    if(isset($_GET["numpiece"]) && !empty($_GET["numpiece"])) {
        $piece=$_GET["numpiece"];
    }

    /*Je place les valeurs de la pièce dans des variables pour ne pas chercher plusieurs fois la même chose dans les tableaux*/
    /*Il s'agit juste d'une question de temps-machine*/
    $nordPiece=$nord[$piece];
    $estPiece=$est[$piece];
    $sudPiece=$sud[$piece];
    $ouestPiece=$ouest[$piece];
    $enigmePiece=$enigmes[$piece];
?>

<!--DOCTYPE HTML -->
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Jeu du labyrinthe</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
    if($piece==0) {
        echo "<p>Vous êtes dans l'entrée du labyrinthe</p>";
    } else {
        if ($piece==10) {
            echo "<p>Félicitations, vous avez trouvé la sortie du labyrinthe</p>";
        } else {
            echo "<p>Vous êtes dans la pièce numéro $piece du labyrinthe</p>";
        }
    }
?>
<table>
    <tr>
        <?php
            if($nordPiece!=-1) {
                echo "<td><img src=\"image/porte.png\" alt=\"Porte Nord\" /></td>";
            }
            if($estPiece!=-1) {
                echo "<td><img src=\"image/porte.png\" alt=\"Porte Est\" /></td>";
            }
            if($sudPiece!=-1) {
                echo "<td><img src=\"image/porte.png\" alt=\"Porte Sud\" /></td>";
            }
            if($ouestPiece!=-1) {
                echo "<td><img src=\"image/porte.png\" alt=\"Porte Ouest\" /></td>";
            }
        ?>
    </tr>
    <tr>
        <?php
            if($nordPiece!=-1) {
                echo "<td><a href=\"index.php?numpiece=$nordPiece\">Nord</a></td>";
            }
            if($estPiece!=-1) {
                echo "<td><a href=\"index.php?numpiece=$estPiece\">Est</a></td>";
            }
            if($sudPiece!=-1) {
                echo "<td><a href=\"index.php?numpiece=$sudPiece\">Sud</a></td>";
            }
            if($ouestPiece!=-1) {
                echo "<td><a href=\"index.php?numpiece=$ouestPiece\">Ouest</a></td>";
            }
        ?>
    </tr>
</table>
<?php
    if($piece!=10) {
        echo "<p>Indice : $enigmePiece</p>";
    }
?>
</body>
</html>