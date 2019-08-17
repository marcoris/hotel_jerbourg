<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Hitliste der Gäste</h2>

    <form action="<?php echo URL; ?>line/create" method="post">
        <label for="line_name">Linien-Name<span class="required-star">*</span></label><input type="text" id="line_name" name="line_name"><br>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <h2>Linienliste</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Linien-Name</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($this->lineList as $key => $value) {
                if ($value['line_name'] != '-') {
                    echo '<tr><td>' . $i . '.</td>';
                    echo '<td>' . $value['line_name'] . '</td>';
                    echo '<td><a class="btn btn-success" href="' . URL . 'line/edit/' . $value['line_id'] . '"><i class="fas fa-pen"></i></a>';
                    if ($value['line_id'] > 5) {
                        echo '<a class="btn btn-danger delete" href="' . URL . 'line/delete/' . $value['line_id'] . '"><i class="fas fa-trash"></i></a>';
                    }
                    echo '</td></td>';
                    echo '</tr>';
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>