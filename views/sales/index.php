<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Umsatz pro Kategorie pro Monat</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Umsatz</td>
                <th>Kategorie</td>
                <th>Monat</td>
                <th>Jahr</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($this->sales as $key => $value) {
                echo '<tr>';
                echo '<td>' . $i . '.</td>';
                echo '<td>CHF. ' . $value['sales'] . '.-</td>';
                echo '<td>';
                if ($value['category_id'] == 1) {
                    echo "Standard";
                } else if ($value['category_id'] == 2) {
                    echo "Premium";
                } else {
                    echo "Suite";
                }
                echo '</td>';
                echo '<td>' . date('F', mktime(0, 0, 0, $value['month'], 10)) . '</td>';
                echo '<td>' . $value['year'] . '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>