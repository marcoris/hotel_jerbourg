<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Umsatz pro Kategorie pro Monat</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Umsatz</td>
                <th>Kategorie</td>
                <th>Monat</td>
            </tr>
        </thead>
        <tbody>
            <?php
            pvd($this->sales);
            $i = 1;
            foreach ($this->sales as $key => $value) {
                echo '<tr>';
                echo '<td>' . $i . '.</td>';
                echo '<td>' . $value['price'] . '</td>';
                echo '<td>' . $value['category_id'] . '</td>';
                echo '<td>' . $value['month'] . '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>