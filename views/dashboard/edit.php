<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Einsatzplan bearbeiten</h2>
    <form action="<?php echo URL; ?>dashboard/editSave/<?php echo $this->useplan_id; ?>" method="post">
        <label for="date">Datum:<span class="required-star">*</span></label>
        <select name="date" id="date">
            <?php
            foreach ($this->months as $key => $month) {
                echo "<option value='{$key}" . date("y") . "' " . ($this->useplanData['useplan_date'] == ($key . date("y")) ? 'selected ' : '') . ($key < date("m") ? 'disabled' : '') . ">{$month}</option>";
            }
            ?>
        </select><br>
        <label for="train_nr">Zugnummer:<span class="required-star">*</span></label><input type="text" id="train_nr" name="train_nr" value="<?= $this->useplanData['useplan_train_nr'] ?>"><br>
        <label for="line">Linie:<span class="required-star">*</span></label>
        <input type="hidden" name="currentLine" value="<?= $this->useplanData['line_id']?>">
        <select name="line" id="line">
            <?php
            foreach ($this->lines as $key => $value) {
                echo "<option value='{$value['line_id']}'" . ($value['line_id'] == $this->useplanData['line_id'] ? 'selected' : '') . ">{$value['line_name']}</option>";
            }
            ?>
        </select><br>
        <label for="lok">LokführerIn:<span class="required-star">*</span></label>
        <input type="hidden" name="currentLok" value="<?= $this->useplanData['lok']['employee_id']?>">
        <select name="lok" id="lok">
            <?php
            foreach ($this->locdriver as $key => $value) {
                echo "<option value='{$value['employee_id']}'" .($value['employee_id'] == $this->useplanData['lok']['employee_id'] ? 'selected' : '') . ">{$value['firstname']} {$value['lastname']}</option>";
            }
            ?>
        </select><br>
        <label for="kont">KontrolleurIn:<span class="required-star">*</span></label>
        <input type="hidden" name="currentKont" value="<?= $this->useplanData['kont']['employee_id']?>">
        <select name="kont" id="kont">
            <?php
            foreach ($this->controller as $key => $value) {
                echo "<option value='{$value['employee_id']}'" .($value['employee_id'] == $this->useplanData['kont']['employee_id'] ? 'selected' : '') . ">{$value['firstname']} {$value['lastname']}</option>";
            }
            ?>
        </select><br>
        <label for="locomotive">Loknummer:<span class="required-star">*</span></label>
        <input type="hidden" name="currentLocomotive" value="<?= $this->useplanData['lok']['lok_id']?>">
        <select name="locomotive" id="locomotive">
            <?php
            foreach ($this->locomotives as $key => $value) {
                echo "<option value='{$value['rollmaterial_id']}'" .($value['number'] == $this->useplanData['lok']['number'] ? 'selected' : '') . ">{$value['number']}</option>";
            }
            ?>
        </select><br>
        <label for="waggons">Waggons<span class="required-star">*</span></label>
        <?php
        for ($i=0; $i<count($this->useplanData['waggons']['id']); $i++) {
            if ($i % 2 == 0) {
                echo '<input type="hidden" name="currentWaggons[]" value="'. $this->useplanData['waggons']['id'][$i]. '">';
            }
        }
        ?>
        <select name="waggons[]" id="waggons" multiple size="10">
            <?php
            foreach ($this->waggons as $key => $value) {
                echo "<option value='{$value['rollmaterial_id']}'" .($value['number'] == isset($this->useplanData['waggons'][$value['number']]) ? $this->useplanData['waggons'][$value['number']] : '' ? 'selected' : '') . ">{$value['number']}</option>";
            }
            ?>
        </select><br>
        <a class="btn btn-primary" href="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</a>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>