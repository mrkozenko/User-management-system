<?php

function buildTable($associativeArray) {

    foreach ($associativeArray as $row) {
        echo '<tr>';
        foreach ($row as $value) {
            echo '<td>' . htmlspecialchars($value) . '</td>';
        }
        echo '</tr>';
    }

}


?>