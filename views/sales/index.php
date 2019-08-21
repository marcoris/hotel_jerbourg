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
                echo "<tr>
                    <td>$i</td>
                    <td>CHF. $value[sales].-</td>
                    <td>$value[category]</td>
                    <td>" . date('F', mktime(0, 0, 0, $value['month'], 10)) . "</td>
                    <td>$value[year]</td>
                </tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>