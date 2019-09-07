<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Hitliste der Gäste (wer hat uns wie oft besucht?)</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Gast</td>
                <th>Besuche</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($this->hitlist as $key => $value) {
                echo '<tr><td>' . $i . '.</td>';
                echo '<td>' . htmlentities($value['guest_name']) . '</td>';
                echo '<td>' . $value['counts'] . '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
