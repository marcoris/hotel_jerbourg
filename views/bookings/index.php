<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Buchung erstellen</h2>
    <form action="<?php echo URL; ?>bookings/create" method="post">
        <fieldset>
            <legend>1. Person</legend>
            <label for="guest">Gast 1</label>
            <select name="guest" id="guest">
                <option value="">--- Gast 1 wählen</option>
                <?php
                foreach ($this->setGuests as $key => $value) {
                    echo "<option value='$value[guest_id]'>$value[guest]</option>";
                }
                ?>
            </select><br>
            <label for="salutation">Anrede<span class="required-star">*</span></label>
            <select name="salutation" id="salutation">
                <option value="0">Herr</option>
                <option value="1">Frau</option>
            </select><br>
            <label for="firstname">Vorname<span class="required-star">*</span></label><input type="text" id="firstname" name="firstname" autocomplete="no"><br>
            <label for="lastname">Nachname<span class="required-star">*</span></label><input type="text" id="lastname" name="lastname" autocomplete="no"><br>
            <label for="birthday">Geburtsdatum<span class="required-star">*</span></label><input type="text" id="birthday" name="birthday" autocomplete="no"><br>
            <label for="identity">Pass/ID<span class="required-star">*</span></label><input type="text" id="identity" name="identity" autocomplete="no"><br>            
            </fieldset>
            <fieldset>
            <legend>2. Person</legend>
            <label for="guest2">Gast 2</label>
            <select name="guest2" id="guest2">
                <option value="">--- Gast 2 wählen</option>
                <?php
                foreach ($this->setGuests as $key => $value) {
                    echo "<option value='$value[guest_id]'>$value[guest]</option>";
                }
                ?>
            </select><br>
            <label for="salutation2">Anrede</label>
            <select name="salutation2" id="salutation2">
                <option value="0">Herr</option>
                <option value="1">Frau</option>
            </select><br>
            <label for="firstname2">Vorname</label><input type="text" id="firstname2" name="firstname2" autocomplete="no"><br>
            <label for="lastname2">Nachname</label><input type="text" id="lastname2" name="lastname2" autocomplete="no"><br>
            <label for="birthday2">Geburtsdatum</label><input type="text" id="birthday2" name="birthday2" autocomplete="no"><br>
            <label for="identity2">Pass/ID</label><input type="text" id="identity2" name="identity2" autocomplete="no"><br>
            </fieldset>
            <hr>
            <label for="room">Zimmer<span class="required-star">*</span></label>
            <select name="room" id="room">
                <option value="">--- Zimmer wählen</option>
                <?php
                foreach ($this->setFreeRooms as $key => $value) {
                    echo "<option value='$value[room_id]'>$value[room]</option>";
                }
                ?>
            </select><br>
            <label for="arrive">Check-In<span class="required-star">*</span></label><input type="text" id="arrive" name="arrive" autocomplete="no"><br>
            <label for="depart">Check-Out<span class="required-star">*</span></label><input type="text" id="depart" name="depart" autocomplete="no"><br>
        </fieldset>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <h2>Buchungen</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Buchungs-Nummer</td>
                <th>Gast 1</td>
                <th>Gast 2</td>
                <th>Zimmer-Nummer</td>
                <th>Buchungsstatus</td>
                <th>Check-In</td>
                <th>Check-Out</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($this->bookingList as $key => $value) {
                $nr = explode(" ", $value['created']);
                $booking_nr = str_replace("-", "", $nr[0] . $value['booking_id']);
                echo '<tr class="' .
                    ($value['category_id'] == 1 ? 'standard' : '') .
                    ($value['category_id'] == 2 ? 'premium' : '') .
                    ($value['category_id'] == 3 ? 'suite' : '') .
                    ($value['booking_status'] == 0 ? ' storno' : '') .
                    ($value['booking_status'] == 3 ? ' checkout' : '') .
                    '">';
                echo '<td>' . $i . '.</td>';
                echo '<td>' . $booking_nr . '</td>';
                echo '<td>' . $value['first_guest'] . '</td>';
                echo '<td>' . ($value['second_guest'] ? $value['second_guest'] : '-') . '</td>';
                echo '<td>' . $value['room_number'] . '</td>';
                echo '<td>' . 
                    ($value['booking_status'] == 0 ? '<em>Storniert</em>' : '') .
                    ($value['booking_status'] == 1 ? 'Reserviert' : '') .
                    ($value['booking_status'] == 2 ? 'Check-In' : '') .
                    ($value['booking_status'] == 3 ? 'Check-Out' : '') .
                    '</td>';
                echo '<td>' . $value['arrive'] . '</td>';
                echo '<td>' . $value['depart'] . '</td>';
                echo '<td><a class="btn btn-success" href="' . URL . 'bookings/edit/' . $value['booking_id'] . '"><i class="fas fa-pen"></i></a>';
                echo '<a class="btn btn-danger delete" href="' . URL . 'bookings/delete/' . $value['booking_id'] . '"><i class="fas fa-trash"></i></a>';
                echo '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
    <label><strong>Legende</strong></label><br>
    <label class="suite">Suite</label>
    <label class="premium">Premium</label>
    <label class="standard">Standard</label>
</div>
