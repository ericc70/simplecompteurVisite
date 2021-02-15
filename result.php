<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            height: 50px;
        }
        h1{
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['passwd']) and $_POST['passwd'] == "Ton mot de passe ici") {
        $filename = 'compteur.txt';
        $visitors = unserialize(file_get_contents($filename));
    ?>

    <h1>Visite du OnePage</h1>
        <table>
            <tr>
                <th>IP</th>
                <th>Dernière visite</th>
                <th>Nombres de visite*</th>
                <th>Premiere visite</th>
                <th>Referent</th>
            </tr>
            <?php
            foreach ($visitors as $key => $value) {
                echo "<tr>";

                echo "<td>" . $key . "</td>";
                echo "<td>" . date('d-m-Y H:m:s', $value[0]) . "</td>";
                echo "<td>" . $value[1] . "</td>";
                echo "<td>" . date('d-m-Y H:m:s', $value[2]) . "</td>";
                echo "<td>" ;
                foreach( $value[3] as $v ){
                    if ($v == NULL) echo "/";
                    echo  $v;
                    echo "</br>";
                }
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <p>* le nombre correspond au nombre de fois que la page à été vue ou actualisée</p>
    <?php
    } else { ?>
        <div>
            <form method="POST">
              Mot de passe :
                <input type="password" name="passwd" id="">
                <button type="submit">valider</button>
            </form>

        </div>
    <?php
    }

    ?>


</body>

</html>
