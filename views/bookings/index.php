<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Reservationen</h2>
    <form action="<?php echo URL; ?>rollmaterial/create" method="post">
        <label for="number">Nummer:<span class="required-star">*</span></label><input type="text" id="number" name="number"><br>
        <label for="type">Typ:<span class="required-star">*</span></label>
        <select name="type" id="type">
            <option value="2">Waggon</option>
            <option value="1">Lokomotive</option>
        </select><br>
        <label for="date_of_commissioning">Erste Inbetriebnahme:<span class="required-star">*</span></label><input type="text" id="date_of_commissioning" name="date_of_commissioning"><br>
        <label for="date_of_last_revision">Letzte Revision:<span class="required-star">*</span></label><input type="text" id="date_of_last_revision" name="date_of_last_revision"><br>
        <label for="date_of_next_revision">Nächste Revision:<span class="required-star">*</span></label><input type="text" id="date_of_next_revision" name="date_of_next_revision"><br>
        <label for="class">Klasse:<span class="required-star">*</span></label>
        <select name="class" id="class">
            <option value="0">Keine</option>
            <option value="1">1. Klasse</option>
            <option value="2">2. Klasse</option>
        </select><br>
        <label for="seating">Sitzplätze:<span class="required-star">*</span></label><input type="number" id="seating" name="seating" value="0" min="0"><br>
        <label for="availability">Verfügbar:<span class="required-star">*</span></label>
        <select name="availability" id="availability">
            <option value="1">Ja</option>
            <option value="0">Nein</option>
        </select><br>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <h2>Rollmaterial</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Nummer</td>
                <th>Typ</td>
                <th>Erste Inbetriebnahme</td>
                <th>Letzte Revision</td>
                <th>Nächste Revision</td>
                <th>Klasse</td>
                <th>Sitzplätze</td>
                <th>Verfügbar</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($this->rollmaterialList as $key => $value) {
                echo '<tr class="'.($value['type'] == 1 && $value['availability'] ? 'lok ' : '').(!$value['availability'] ? 'krank ' : '').(($value['class'] == 1 && $value['type'] != 1) ? 'ferien' : '').'">';
                echo '<td>' . $i . '.</td>';
                echo '<td>' . $value['number'] . '</td>';
                echo '<td>' . ($value['type'] == 1 ? 'Lokomotive' : 'Waggon') . '</td>';
                echo '<td>' . $value['date_of_commissioning'] . '</td>';
                echo '<td>' . $value['date_of_last_revision'] . '</td>';
                echo '<td>' . $value['date_of_next_revision'] . '</td>';
                echo '<td>';
                if ($value['class'] == 0 || $value['type'] == 1) {
                    echo '-';
                } else if ($value['class'] == 1) {
                    echo '1. Klasse';
                } else {
                    echo '2. Klasse';
                }
                echo '</td>';
                echo '<td>' . ($value['type'] != 1 ? $value['seating'] : '0') . '</td>';
                echo '<td>' . ($value['availability'] ? 'Ja' : 'Nein') . '</td>';
                echo '<td><a class="btn btn-success" href="' . URL . 'rollmaterial/edit/' . $value['rollmaterial_id'] . '"><i class="fas fa-pen"></i></a>';
                echo '<a class="btn btn-danger delete" href="' . URL . 'rollmaterial/delete/' . $value['rollmaterial_id'] . '"><i class="fas fa-trash"></i></a>';
                echo '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
    <label><strong>Legende</strong></label><br>
    <label class="lok">Lokomotive</label>
    <label class="ferien">1. Klasse Waggon</label>
    <label class="krank">Nicht verfügbar</label>
</div>