<div class="jumbotron jumbotron-fluid bg bg-lok">
    <div class="wrap">
        <div class="row">
            <?php
            if ($this->no_entry) : ?>
                <h1>Sorry!</h1>
                <p>Leider konnte zu Ihrer Anfrage keine Verbindung gefunden werden.<br>
                Möglicherweise möchten Sie Ihre Reise an einem Datum unternehmen, an dem Start oder Ziel gar nicht oder nicht mit dem gewählten Verkehrsmittel angefahren werden (Haltestellen werden z. B. am Wochenende manchmal nicht bedient).<br>
                </p>
                <div class="buttons no-print">
                    <a class="btn btn-primary" href="javascript:history.back();"><i class="fa fa-chevron-left"></i> Zurück</a>
                </div>
            <?php
            elseif ($this->same_stations) : ?>
                <h1>Sorry!</h1>
                <p>Die Start Station und die End Station sind identisch!
                </p>
                <div class="buttons no-print">
                    <a class="btn btn-primary" href="javascript:history.back();"><i class="fa fa-chevron-left"></i> Zurück</a>
                </div>
            <?php
            else : ?>
                <div class="schedule-container">
                    <h2><i class='fas fa-subway'></i> R <?= $this->trainNr ?> Richtung <?= $this->to ?></h2>
                    <div class="start-end-time-container">
                        <span class="start-time">Abfahrt <strong><?= $this->start_time ?></strong></span>
                        <span class="start-time-circle"></span>
                        <span class="start-time-line"></span>
                        <span class="start-time-circle"></span>
                        <span class="end-time">Ankunft <strong><?= $this->end_time ?></strong></span>
                        <span class="total-time">Dauer <strong><?= $this->total ?> min.</strong></span>
                    </div>
                    <table class="table table-striped">
                        <tr><td><strong><?= $this->start_time ?></strong> <strong><?= $this->from ?></strong></td></tr>
                        <?= $this->output ?>
                        <tr><td><strong><?= $this->end_time ?></strong> <strong><?= $this->to ?></strong></td></tr>
                    </table>
                    <div class="buttons no-print">
                        <a class="btn btn-primary" href="javascript:history.back();"><i class="fa fa-chevron-left"></i> Zurück</a>
                        <a class="btn btn-primary" href="javascript:print();"><i class="fa fa-print"></i> Drucken</a>
                    </div>
                    <div class="page-break departure">
                        <h2>Abfahrtszeiten</h2>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center"><i class="far fa-clock"></i></th>	
                                    <th>Montag bis Freitag</th>	
                                    <th class="text-center"><i class="far fa-clock"></i></th>	
                                    <th>Samstag und Sonntag</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bold text-center">05</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("5:30"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("5:45"))) ?></span>
                                    </td>
                                    <td class="bold text-center">05</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("5:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">06</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("6:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("6:15"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("6:30"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("6:45"))) ?></span>
                                    </td>
                                    <td class="bold text-center">06</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("6:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("6:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">07</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("7:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("7:15"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("7:30"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("7:45"))) ?></span>
                                    </td>
                                    <td class="bold text-center">07</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("7:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("7:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">08</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("8:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("8:15"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("8:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">08</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("8:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("8:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">09</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("9:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("9:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">09</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("9:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("9:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">10</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("10:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("10:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">10</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("10:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("10:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">11</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("11:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("11:30"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("11:45"))) ?></span>
                                    </td>
                                    <td class="bold text-center">11</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("11:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("11:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">12</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("12:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("12:15"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("12:30"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("12:45"))) ?></span>
                                    </td>
                                    <td class="bold text-center">12</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("12:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("12:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">13</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("13:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("13:15"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("13:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">13</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("13:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("13:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">14</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("14:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("14:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">14</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("14:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("14:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">15</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("15:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("15:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">15</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("15:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("15:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">16</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("16:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("16:15"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("16:30"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("16:45"))) ?></span>
                                    </td>
                                    <td class="bold text-center">16</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("16:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("16:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">17</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("17:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("17:15"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("17:30"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("17:45"))) ?></span>
                                    </td>
                                    <td class="bold text-center">17</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("17:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("17:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">18</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("18:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("18:15"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("18:30"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("18:45"))) ?></span>
                                    </td>
                                    <td class="bold text-center">18</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("18:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("18:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">19</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("19:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("19:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">19</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("19:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("19:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">20</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("20:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("20:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">20</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("20:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("20:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">21</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("21:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("21:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">21</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("21:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("21:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">22</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("22:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("22:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">22</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("22:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("22:30"))) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold text-center">23</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("23:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("23:30"))) ?></span>
                                    </td>
                                    <td class="bold text-center">23</td>
                                    <td>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("23:00"))) ?></span>
                                        <span><?= date("i", strtotime("+ $this->departures minutes", strtotime("23:30"))) ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>