<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Buchung erstellen</h2>
    <form action="<?php echo URL; ?>bookings/create" method="post">
        <label for="guest">Gast</label>
        <select name="guest" id="guest">
            <option value="">--- Gast wählen</option>
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
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <h2>Buchungen</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Buchungs-Nummer</td>
                <th>Gast</td>
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
                echo '<tr class="' .
                    ($value['category_id'] == 1 ? 'standard' : '') .
                    ($value['category_id'] == 2 ? 'premium' : '') .
                    ($value['category_id'] == 3 ? 'suite' : '') .
                    ($value['booking_status'] == 0 ? ' storno' : '') .
                    ($value['booking_status'] == 4 ? ' checkout' : '') .
                    '">';
                echo '<td>' . $i . '.</td>';
                echo '<td>' . $value['booking_nr'] . '</td>';
                echo '<td>' . $value['guest'] . '</td>';
                echo '<td>' . $value['room_number'] . '</td>';
                echo '<td>' . 
                    ($value['booking_status'] == 0 ? '<em>Storniert</em>' : '') .
                    ($value['booking_status'] == 1 ? 'Reserviert' : '') .
                    ($value['booking_status'] == 2 ? 'Bezahlt' : '') .
                    ($value['booking_status'] == 3 ? 'Check-In' : '') .
                    ($value['booking_status'] == 4 ? 'Check-Out' : '') .
                    '</td>';
                echo '<td>' . $value['arrive'] . '</td>';
                echo '<td>' . $value['depart'] . '</td>';
                echo '<td><a class="btn btn-default" href="' . URL . 'bookings/edit/' . $value['booking_id'] . '"><i class="fas fa-pen"></i></a>';
                echo '<a class="btn btn-default cancel" href="' . URL . 'bookings/cancel/' . $value['booking_id'] . '"><i class="fas fa-ban"></i></a>';
                echo '<a class="btn btn-default delete" href="' . URL . 'bookings/delete/' . $value['booking_id'] . '"><i class="fas fa-trash"></i></a>';
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
