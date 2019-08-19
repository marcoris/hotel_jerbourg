<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Reservation <strong><?php echo str_replace(".", "", $this->booking[0]['created']) . $this->booking[0]['booking_id']; ?></strong> bearbeiten</h2>
    <form action="<?php echo URL; ?>bookings/editSave/<?php echo $this->booking[0]['booking_id']; ?>" method="post">
    <label for="guest">Gast 1</label>
        <select name="guest" id="guest">
            <?php
            foreach ($this->setGuests as $key => $value) {
                $selected = ($value['guest_id'] == $this->booking[0]['guest1_id']) ? 'selected' : '';
                echo "<option $selected value='$value[guest_id]'>$value[guest]</option>";
            }
            ?>
        </select><br>
        <label for="guest2">Gast 2</label>
        <select name="guest2" id="guest2">
            <?php
            echo ($this->booking[0]['guest2_id'] == 0) ? '<option value="">--- Gast 2 wählen</option>' : '';
            foreach ($this->setGuests as $key => $value) {
                $selected = ($value['guest_id'] == $this->booking[0]['guest2_id']) ? 'selected' : '';
                echo "<option $selected value='$value[guest_id]'>$value[guest]</option>";
            }
            ?>
        </select><br>
        <label for="room">Zimmer</label>
        <select name="room" id="room">
            <?php
            echo "<option value='" . $this->setBookedRoom[0]['room_id'] . "'>" . $this->setBookedRoom[0]['room'] . "</option>";
            foreach ($this->setFreeRooms as $key => $value) {
                $selected = ($value['room_id'] == $this->booking[0]['room_id']) ? 'selected' : '';
                echo "<option $selected value='$value[room_id]'>$value[room]</option>";
            }
            ?>
        </select><br>
        <label for="arrive">Check-In<span class="required-star">*</span></label><input value="<?php echo $this->booking[0]['arrive']; ?>" type="text" id="arrive" name="arrive" autocomplete="no"><br>
        <label for="depart">Check-Out<span class="required-star">*</span></label><input value="<?php echo $this->booking[0]['depart']; ?>" type="text" id="depart" name="depart" autocomplete="no"><br>
        <label for="booking_status">Buchungs Status</label>
        <select name="booking_status" id="booking_status">
            <option <?php echo ($this->booking[0]['booking_status'] == 0) ? 'selected' : ''; ?> value="0">Storniert</option>
            <option <?php echo ($this->booking[0]['booking_status'] == 1) ? 'selected' : ''; ?> value="1">Reserviert</option>
            <option <?php echo ($this->booking[0]['booking_status'] == 2) ? 'selected' : ''; ?> value="2">Bezahlt</option>
            <option <?php echo ($this->booking[0]['booking_status'] == 3) ? 'selected' : ''; ?> value="3">Check-In</option> 
            <option <?php echo ($this->booking[0]['booking_status'] == 4) ? 'selected' : ''; ?> value="4">Check-Out</option> 
        </select><br>
        <a class="btn btn-primary" href="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</a>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>
