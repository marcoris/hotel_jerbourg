<div class="jumbotron jumbotron-fluid loggedin">
    <h1>Dashboard</h1>
    <h2>Willkommen <?php echo Session::get('firstname') . ' ' . Session::get('lastname'); ?></h2>
    <?php
    $months = array(
        'Januar',
        'Februar',
        'März',
        'April',
        'Mai',
        'Juni',
        'Juli',
        'August',
        'September',
        'Oktober',
        'November',
        'Dezember'
    );
    // check if the user is an employee or stuff
    if (Session::get('usergroup') > 2) : ?>
    <p>Im Dashboard kannst du deine Einsatzpläne anschauen und ausdrucken.<br>Monate in der Vergangenheit können nicht angeschaut werden!</p>
    <?php else : ?>
    <p>Im Dashboard kannst du die generierten Einsatzpläne bearbeiten, oder neue erstellen.</p>
    <?php endif; ?>
    <hr>
    <?php
    if (Session::get('usergroup') > 2) : ?>
    <h2 style="text-align: center; margin-bottom: 20px;">Einsatzplan</h2>
    <div class="useplan">
        <?php
        for ($i = 0; $i < 12; $i++) {
            if ($i+1 >= intval(date("m"))) {
                echo '<div><a href="' . URL . 'dashboard/useplan/' . $_SESSION['employee_id'] . '/' . ($i+1) . '">' . $months[$i] . '</a></div>';
            } else {
                echo '<div>' . $months[$i] . '</div>';
            }
        }
        ?>
    </div>
    <?php
    else : ?>
    <h2>Neuen Einsatzplan erfassen</h2>
    <form action="<?php echo URL; ?>dashboard/create" method="post">
        <label for="date">Datum:<span class="required-star">*</span></label>
        <select name="date" id="date">
        <option value="119" disabled>Januar</option>
        <option value="219" disabled>Februar</option>
        <option value="319" selected>März</option>
        <option value="419">April</option>
        <option value="519">Mai</option>
        <option value="619">Juni</option>
        <option value="719">Juli</option>
        <option value="819">August</option>
        <option value="919">September</option>
        <option value="1019">Oktober</option>
        <option value="1119">November</option>
        <option value="1219">Dezember</option>
        </select><br>
        <label for="train_nr">Zugnummer:<span class="required-star">*</span></label><input type="text" id="train_nr" name="train_nr"><br>
        <label for="line">Linie:<span class="required-star">*</span></label>
        <select name="line" id="line">
            <?php
            foreach ($this->lines as $key => $value) {
                echo "<option value='{$value['line_id']}'>{$value['line_name']}</option>";
            }
            ?>
        </select><br>
        <label for="lok">LokführerIn:<span class="required-star">*</span></label>
        <select name="lok" id="lok">
            <?php
            foreach ($this->locdriver as $key => $value) {
                echo "<option value='{$value['employee_id']}'>{$value['firstname']} {$value['lastname']}</option>";
            }
            ?>
        </select><br>
        <label for="kont">KontrolleurIn:<span class="required-star">*</span></label>
        <select name="kont" id="kont">
            <?php
            foreach ($this->controller as $key => $value) {
                echo "<option value='{$value['employee_id']}'>{$value['firstname']} {$value['lastname']}</option>";
            }
            ?>
        </select><br>
        <label for="locomotive">Loknummer:<span class="required-star">*</span></label>
        <select name="locomotive" id="locomotive">
            <?php
            foreach ($this->locomotives as $key => $value) {
                echo "<option value='{$value['rollmaterial_id']}'>{$value['number']}</option>";
            }
            ?>
        </select><br>
        <label for="waggons">Waggons<span class="required-star">*</span></label>
        <select name="waggons[]" id="waggons" multiple size="10">
            <?php
            foreach ($this->waggons as $key => $value) {
                echo "<option value='{$value['rollmaterial_id']}'>{$value['number']}</option>";
            }
            ?>
        </select><br>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <h2>Einsatzpläne</h2>
    <table class="table table-striped useplantable">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</th>
                <th>Datum</th>
                <th>Zugnummer</th>
                <th>Linie</th>
                <th>LokführerIn</th>
                <th>KontrolleurIn</th>
                <th>Loknummer</th>
                <th>Waggons</th>
                <th>Bearbeiten</th>
            </th></tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($this->useplans as $key => $value) {
                echo "<tr>
                    <td>$i</td>
                    <td>{$months[substr($value['useplan_date'], 0, -2) - 1]} 20" . substr($value['useplan_date'], -2) . "</td>
                    <td>{$value['useplan_train_nr']}</td>
                    <td>{$value['line_name']}</td>
                    <td>{$value['lok']['firstname']} {$value['lok']['lastname']}</td>
                    <td>{$value['kont']['firstname']} {$value['kont']['lastname']}</td>
                    <td>{$value['lok']['number']}</td>
                    <td>";
                foreach ($value['waggons'] as $waggonkey => $waggonvalue) {
                    echo "<div class='useplandivs'>" . $value['waggons'][$waggonkey] . "</div>";
                }
                echo '</td>
                <td>
                    <a href="dashboard/edit/' . $key . '" class="btn btn-success edit"><i class="fas fa-pen"></i></a>
                    <a href="dashboard/delete/' . $key . '" class="btn btn-danger delete"><i class="fas fa-trash"></i></a>
                </td>
                </tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
    <?php
    endif;
    ?>
</div>