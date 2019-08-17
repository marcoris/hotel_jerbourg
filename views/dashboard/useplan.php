<div class="jumbotron jumbotron-fluid loggedin">
    <h1>Einsatzplan von <?php echo Session::get('firstname') . ' ' . Session::get('lastname'); ?></h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Einsatzplan Details</td>
                <th></th>
            </tr>
        </thead>
        <tbody>
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
            ?>
            <tr>
                <td>Datum:</td>
                <td><?= "{$months[$this->month-1]} " . date('Y'); ?></td>
            </tr>
            <tr>
                <td>Zugnummer:</td>
                <td><?= $this->trainNr[0]['useplan_train_nr']; ?></td>
            </tr>
            <tr>
                <td>Linie:</td>
                <td><?= $this->line[0]['line_name']; ?></td>
            </tr>
            <tr>
                <td>Lokführer:</td>
                <td><?php
                    echo isset($this->locDriver[0]['firstname']) ? ($this->locDriver[0]['firstname'] . ' ' . $this->locDriver[0]['lastname']) : ($this->locDriver[0] . ' ' . $this->locDriver[1]); ?></td>
            </tr>
            <tr>
                <td>Kontrolleur:</td>
                <td><?php
                    echo isset($this->controller[0]['firstname']) ? ($this->controller[0]['firstname'] . ' ' . $this->controller[0]['lastname']) : ($this->controller[0] . ' ' . $this->controller[1]); ?></td>
            </tr>
            <tr>
                <td>Lok-Nummer:</td>
                <td><?= $this->train[0]['number']; ?></td>
            </tr>
            <tr>
                <td>Waggon-Nummer:</td>
                <td>
                    <?php
                    for ($i=1; $i < count($this->train); $i++) {
                        echo '<span class="waggonslist">' . $this->train[$i]['number'] . '</span>';
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary no-print" href="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</a>
    <a class="btn btn-primary no-print" href="javascript:print();"><i class="fa fa-print"></i> Drucken</a>
</div>