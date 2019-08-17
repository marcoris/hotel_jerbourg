<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Gast <strong><?php echo $this->guest[0]['firstname'] . " " . $this->guest[0]['lastname']; ?></strong> bearbeiten</h2>
    <form action="<?php echo URL; ?>guests/editSave/<?php echo $this->guest[0]['guest_id']; ?>" method="post">
        <label for="salutation">Anrede<span class="required-star">*</span></label>
        <select name="salutation" id="salutation">
            <option <?php echo ($this->guest[0]['salutation'] == 0) ? 'selected' : ''; ?> value="0">Herr</option>
            <option <?php echo ($this->guest[0]['salutation'] == 1) ? 'selected' : ''; ?> value="1">Frau</option>
        </select><br>
        <label for="firstname">Vorname<span class="required-star">*</span></label><input value="<?php echo $this->guest[0]['firstname']; ?>" type="text" id="firstname" name="firstname" autocomplete="no"><br>
        <label for="lastname">Nachname<span class="required-star">*</span></label><input value="<?php echo $this->guest[0]['lastname']; ?>" type="text" id="lastname" name="lastname" autocomplete="no"><br>
        <label for="birthday">Geburtsdatum<span class="required-star">*</span></label><input value="<?php echo $this->guest[0]['birthday']; ?>" type="text" id="birthday" name="birthday" autocomplete="no"><br>
        <label for="identity">Pass/ID<span class="required-star">*</span></label><input value="<?php echo $this->guest[0]['identity']; ?>" type="text" id="identity" name="identity" autocomplete="no"><br>            
        <a class="btn btn-primary" href="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</a>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>
