<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Gästeverwaltung</h2>
    <form action="<?php echo URL; ?>station/create" method="post">
        <label for="station_name">Name:<span class="required-star">*</span></label><input type="text" id="station_name" name="station_name"><br>
        <label for="station_time">Zeit:<span class="required-star">*</span></label><input type="text" id="station_time" name="station_time"><br>
        <label for="station_sequence">Reihenfolge:<span class="required-star">*</span></label><input type="text" id="station_sequence" name="station_sequence"><br>
        <label for="station_to_line">Linie:<span class="required-star">*</span></label>
        <select name="station_to_line" id="station_to_line">
        <?php
            foreach($this->getLines as $key => $value) {
                echo '<option value="' . $value['line_id'] . '">' . $value['line_name'] . '</option>';
            }
            ?>
        </select><br>
        <label for="station_status">Status:<span class="required-star">*</span></label>
        <select name="station_status" id="station_status">
            <option value="0">Station</option>
            <option value="1">Endstation</option>
            <option value="2">Hauptbahnhof</option>
        </select><br>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <h2>Stations-Liste</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Name</td>
                <th>Zeit</td>
                <th>Reihenfolge</td>
                <th>Status</td>
                <th>Linie</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach($this->stationList as $key => $value) {
                echo '<tr class="'.($value['station_status'] == 2 ? 'ferien ' : '').($value['station_status'] == 1 ? 'lok' : '').'">';
                echo '<td>' . $i . '.</td>';
                echo '<td>' . $value['station_name'] . '</td>';
                echo '<td>' . $value['station_time'] . '</td>';
                echo '<td>' . $value['station_sequence'] . '</td>';
                echo '<td>';
                if ($value['station_status'] == 2) {
                    echo '<strong>Hauptbahnhof</strong>';
                } else if ($value['station_status'] == 1) {
                    echo '<strong>Endstation</strong>';
                } else {
                    echo 'Station';
                }
                echo '</td>';
                echo '<td>' . $value['line_name'] . '</td>';
                echo '<td><a class="btn btn-success" href="' . URL . 'station/edit/' . $value['station_id'] . '"><i class="fas fa-pen"></i></a>';
                echo '<a class="btn btn-danger delete" href="' . URL . 'station/delete/' . $value['station_id'] . '"><i class="fas fa-trash"></i></a>';
                echo '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
    <label><strong>Legende</strong></label><br>
    <label class="ferien">Hauptbahnhof</label>
    <label class="lok">Endstation</label>
</div>