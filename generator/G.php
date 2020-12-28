<?php
require __DIR__ . '/vendor/autoload.php';
use Codedungeon\PHPCliColors\Color;

echo "Nama database: ";
$DBName = fopen("php://stdin", "r");
$DBName = trim(fgets($DBName));

echo "Nama table: ";
$tableName = fopen("php://stdin", "r");
$tableName = trim(fgets($tableName));

echo "Nama primary key: ";
$primaryKey = fopen("php://stdin", "r");
$primaryKey = trim(fgets($primaryKey));

$host = "localhost";
$userName = "root";
$password = "";

// Koneksi DB
$mysqli = new mysqli($host, $userName, $password, $DBName);

/* check connection */
if (mysqli_connect_error()) {
    printf(Color::RED, 'ERROR', Color::RESET, PHP_EOL, mysqli_connect_error());
    exit();
}

$query = "SHOW COLUMNS FROM " . $tableName;
$result = $mysqli->query($query);

if (empty($result)) echo "Table tidak ditemukan";

while ($row = $result->fetch_array()) {
    $rows[] = $row[0];
}

// Run functions
Models($tableName, $primaryKey, $rows);
Controllers($tableName, $rows);
Views($tableName, $primaryKey, $rows);

// Create Models
function Models($tableName, $primaryKey, $rows)
{
    $dir = "../app/Models";
    if (is_dir($dir) == false) {
        mkdir("../app");
        mkdir($dir);
    }

    if (is_dir($dir) == true) {
        $check = file_exists("../app/Models/" . $tableName . "Model.php");
        if ($check == 0) {

            $models = '';
            foreach ($rows as $row => $value) {
                $models .= '"' . $value . '", ';
            }

            $fileModel = file_get_contents("Model.php");
            $replace = str_replace('Table', $tableName, $fileModel);
            file_put_contents('../app/Models/' . $tableName . "Model.php", $replace);

            $fileModel = file_get_contents('../app/Models/' . $tableName . "Model.php");
            $replace = str_replace('Primary', $primaryKey, $fileModel);
            file_put_contents('../app/Models/' . $tableName . "Model.php", $replace);

            $fileModel = file_get_contents('../app/Models/' . $tableName . "Model.php");
            $replace = str_replace("'fields'", $models, $fileModel);
            file_put_contents('../app/Models/' . $tableName . "Model.php", $replace);
        }
        echo Color::GREEN, 'Your ' . $tableName . "Model.php was created", Color::RESET, PHP_EOL;
    }
}

function Controllers($tableName, $rows)
{
    $dir = "../app/Controllers";
    if (is_dir($dir) == false) {
        mkdir($dir);
    }

    if (is_dir($dir) == true) {
        $check = file_exists("../app/Controllers/" . $tableName . "Controller.php");

        if ($check == 0) {
            // Fungsi save
            $save = '';
            foreach (array_slice($rows, 1) as $row => $value) {
                $save .= '"' . $value . '" => $this->request->getVar("' . $value . '"),' . "\n";
            }

            $file = file_get_contents("Controller.php");
            $replace = str_replace('Generator', $tableName, $file);
            file_put_contents('../app/Controllers/' . $tableName . "Controller.php", $replace);

            $fileController = file_get_contents('../app/Controllers/' . $tableName . "Controller.php");
            $replace = str_replace("SAVE", $save, $fileController);
            file_put_contents('../app/Controllers/' . $tableName . "Controller.php", $replace);

            // Fungsi update
            $saveUpdate = '';
            foreach ($rows as $row => $value) {
                $saveUpdate .= '"' . $value . '" => $this->request->getVar("' . $value . '"),' . "\n";
            }

            $fileController = file_get_contents('../app/Controllers/' . $tableName . "Controller.php");
            $replace = str_replace(
                "STORE",
                $saveUpdate,
                $fileController
            );
            file_put_contents('../app/Controllers/' . $tableName . "Controller.php", $replace);
        }
        echo Color::GREEN, 'Your ' . $tableName . "Controller.php was created", Color::RESET, PHP_EOL;
    }
}

function Views($tableName, $primaryKey, $rows)
{
    $dir = "../app/Views/" . $tableName;
    $dirTemplate = "../app/Views/template";

    if (is_dir("../app/Views") == false) {
        mkdir("../app/Views");
    }

    if (is_dir($dir) == false) {
        mkdir($dir);
    }

    if (is_dir($dirTemplate) == false) {
        mkdir($dirTemplate);
    }

    if (is_dir($dir) == true and is_dir($dirTemplate) == true) {

        // create view template directory
        $check = file_exists("../app/Views/template/template.php");
        if ($check == 0) {
            $file = file_get_contents("Views/template.php");
            $replace = str_replace('TITLE', $tableName, $file);
            file_put_contents('../app/Views/template/template.php', $replace);
        }

        // create view index.php
        $check = file_exists("../app/Views/" . $tableName . "/index.php");
        if ($check == 0) {
            $thead = '';
            foreach (array_slice($rows, 1) as $row => $value) {
                $thead .= '<th scope="col" class="text-center">' . $value . '</th>' . "\n";
            }

            $file = file_get_contents("Views/index.php");
            $replace = str_replace('THEAD', $thead, $file);
            file_put_contents('../app/Views/' . $tableName . "/index.php", $replace);

            $tbody = '';
            foreach (array_slice(
                $rows,
                1
            ) as $row => $value) {
                $tbody .= '<td class="text-center"><?= $p["' . $value . '"]; ?></td>' . "\n";
            }
            $tbody .= '
            <td class="text-center">
                <a href="/VariableController/update/<?= $p["' . $rows[0] . '"]; ?>" class="btn btn-warning">Edit</a>
                <a href="/VariableController/detail/<?= $p["' . $rows[0] . '"]; ?>" class="btn btn-success">Detail</a>
                <a href="/VariableController/delete/<?= $p["' . $rows[0] . '"]; ?>" class="btn btn-danger">Delete</a>
            </td>';
            $file = file_get_contents('../app/Views/' . $tableName . "/index.php");
            $replace = str_replace('TBODY', $tbody, $file);
            file_put_contents('../app/Views/' . $tableName . "/index.php", $replace);

            $file = file_get_contents('../app/Views/' . $tableName . "/index.php");
            $replace = str_replace('Variable', $tableName, $file);
            file_put_contents('../app/Views/' . $tableName . "/index.php", $replace);
        }

        // Create Add.php
        $check = file_exists("../app/Views/" . $tableName . "/add.php");
        if ($check == 0) {
            $addForm = '';
            foreach (array_slice($rows, 1) as $row => $value) {
                $addForm .= '
                <div class="form-group row">
                    <label for="' . $value . '" class="col-sm-2 ml-4 col-form-label">' . $value . '</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("' . $value . '")) ? "is-invalid" : ""; ?>" id="' . $value . '" name="' . $value . '" value="<?= old("' . $value . '"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("' . $value . '"); ?>
                        </div>
                    </div>
                </div>' . "\n";
            }

            $file = file_get_contents("Views/add.php");
            $replace = str_replace('FORM', $addForm, $file);
            file_put_contents('../app/Views/' . $tableName . "/add.php", $replace);

            $file = file_get_contents('../app/Views/' . $tableName . "/add.php");
            $replace = str_replace('Variable', $tableName, $file);
            file_put_contents('../app/Views/' . $tableName . "/add.php", $replace);
        }


        // Update Views
        $check = file_exists("../app/Views/" . $tableName . "/update.php");
        if ($check == 0) {
            $update = '<input type="hidden" name="id" value="<?= $' . $tableName . '["' . $primaryKey . '"]; ?>">';
            foreach (array_slice($rows, 1) as $row => $value) {
                $update .= '<div class="form-group row">
                            <label for="' . $value . '" class="col-sm-2 ml-4 col-form-label">' . $value . '</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("' . $value . '")) ? "is-invalid" : ""; ?>" id="' . $value . '" name="' . $value . '" autofocus value="<?= (old("' . $value . '")) ? old("' . $value . '") : $' . $tableName . '["' . $value . '"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("' . $value . '"); ?>
                                </div>
                            </div>
                        </div>' . "\n";
            }

            $file = file_get_contents("Views/update.php");
            $replace = str_replace('UPDATE', $update, $file);
            file_put_contents('../app/Views/' . $tableName . "/update.php", $replace);

            $file = file_get_contents('../app/Views/' . $tableName . "/update.php");
            $replace = str_replace('Variable', $tableName, $file);
            file_put_contents('../app/Views/' . $tableName . "/update.php", $replace);
        }

        $check = file_exists("../app/Views/" . $tableName . "/detail.php");
        if ($check == 0) {
            $detail = '';
            foreach ($rows as $row => $value) {
                $detail .= '<li class="list-group-item"><b>' . $value . '":</b><?= $' . $tableName . '["' . $value . '"];?></li>' . "\n";
            }

            $file = file_get_contents("Views/detail.php");
            $replace = str_replace('DETAIL', $detail, $file);
            file_put_contents('../app/Views/' . $tableName . "/detail.php", $replace);

            $file = file_get_contents('../app/Views/' . $tableName . "/detail.php");
            $replace = str_replace('Variable', $tableName, $file);
            file_put_contents('../app/Views/' . $tableName . "/detail.php", $replace);
        }
        echo Color::GREEN, 'Your ' . $tableName . " Views was created", Color::RESET, PHP_EOL;
    }
}

/* free result set */
$result->close();

/* close connection */
$mysqli->close();
