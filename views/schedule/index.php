<div class="jumbotron jumbotron-fluid bg bg-lok">
    <div class="wrap">
        <div class="row">
            <h1 style="text-align: center;" class="col-6">Fahrplan</h1>
        </div>
        <div class="row">
            <form action="<?php echo URL; ?>schedule/showschedule" method="post">
                <label for="start_station">Start-Station:<span class="required-star">*</span></label><input type="text" id="start_station" name="start_station"><br>
                <label for="end_station">End-Station:<span class="required-star">*</span></label><input type="text" id="end_station" name="end_station"><br>
                <label for="month">Monat:<span class="required-star">*</span></label>
                <select id="month" name="month">
                    <?php
                    $months = array(
                        1 => 'Januar',
                        2 => 'Februar',
                        3 => 'März',
                        4 => 'April',
                        5 => 'Mai',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'August',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Dezember'
                    );
                    foreach ($months as $key => $value) {
                        if ($key < date("m")) {
                            echo "<option disabled>$value</option>";
                        } else if ($key == date("m")) {
                            echo "<option selected value='$key'>$value</option>";
                        } else {
                            echo "<option value='$key'>$value</option>";
                        }
                    }
                    ?>
                </select><br>
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Verbindung suchen</button>
            </form>
        </div>
    </div>
</div>