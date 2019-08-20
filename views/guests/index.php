<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Gast erstellen</h2>
    <form action="<?php echo URL; ?>guests/create" method="post">
        <label for="salutation">Anrede<span class="required-star">*</span></label>
        <select name="salutation" id="salutation">
            <option value="0">Herr</option>
            <option value="1">Frau</option>
        </select><br>
        <label for="firstname">Vorname<span class="required-star">*</span></label><input type="text" id="firstname" name="firstname" autocomplete="no"><br>
        <label for="lastname">Nachname<span class="required-star">*</span></label><input type="text" id="lastname" name="lastname" autocomplete="no"><br>
        <label for="birthday">Geburtsdatum<span class="required-star">*</span></label><input type="text" id="birthday" name="birthday" autocomplete="no"><br>
        <label for="identity">Pass/ID<span class="required-star">*</span></label><input type="text" id="identity" name="identity" autocomplete="no"><br>            
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <h2>Gäste-Liste</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Anrede</td>
                <th>Vorname</td>
                <th>Nachname</td>
                <th>Geburtsdatum</td>
                <th>Pass/ID</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($this->setGuestlist as $key => $value) {
                echo '<tr>';
                echo '<td>' . $i . '.</td>';
                echo '<td>';
                if ($value['salutation'] == 0) {
                    echo 'Herr';
                } else {
                    echo 'Frau';
                }
                echo '</td>';
                echo '<td>' . $value['firstname'] . '</td>';
                echo '<td>' . $value['lastname'] . '</td>';
                echo '<td>' . $value['birthday'] . '</td>';
                echo '<td>' . $value['identity'] . '</td>';
                echo '<td><a class="btn btn-default" href="' . URL . 'guests/edit/' . $value['guest_id'] . '"><i class="fas fa-pen"></i></a>';
                echo '<a class="btn btn-default delete" href="' . URL . 'guests/delete/' . $value['guest_id'] . '"><i class="fas fa-trash"></i></a>';
                echo '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
