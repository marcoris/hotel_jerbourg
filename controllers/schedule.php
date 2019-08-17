<?php

class Schedule extends Controller
{
    private $path = 'schedule';

    public function __construct()
    {
        parent::__construct();

        $this->view->js = array($this->path . '/js/checkValidation.js');
    }

    /**
     * Call the render function
     *
     */
    public function index()
    {
        $this->view->render($this->path . '/index');
    }

    /**
     * Call the schedule function
     *
     */
    public function showschedule()
    {
        // define some variables
        $start_time = 0;
        $end_time = 0;
        $total = 0;
        $output = '';
        $this->view->no_entry = false;
        $this->view->same_stations = false;
        $startingTime = "5:30";
        $this->view->from = $_POST['start_station'];
        $this->view->to = $_POST['end_station'];
        $month = $_POST['month'] . date("y");
        $trainNr = $this->model->getTrainNr($month, $_POST['start_station']);
        $this->view->trainNr = isset($trainNr[0]['useplan_train_nr']) ? $trainNr[0]['useplan_train_nr'] : 'X';

        // get sequences
        $start_sequence = $this->model->getSequence($_POST['start_station']);
        $end_sequence = $this->model->getSequence($_POST['end_station']);
        // get all stations
        $stations = $this->model->getStations($_POST['start_station']);

        // check if station exists
        if (isset($stations[0]) && isset($start_sequence[0]) && isset($end_sequence[0])) {
            // check if schedule is normal or reverse
            if ($start_sequence[0]['sequence'] < $end_sequence[0]['sequence']) {
                // normal loop throug all stations for calc times
                for ($i=0; $i<$end_sequence[0]['sequence']-1; $i++) {
                    // if the start station is the first
                    if ($stations[$i]['station_name'] == $_POST['start_station'] && $i == 0) {
                        for ($k=0; $k<$end_sequence[0]['sequence'] - $start_sequence[0]['sequence']; $k++) {
                            $end_time += $stations[$k]['station_time'];
                            $total += $stations[$k]['station_time'];
                            if ($k+1 < $end_sequence[0]['sequence'] - $start_sequence[0]['sequence']) {
                                $end_time += ($stations[$k]['station_status'] == 2 ? 5 : 2);
                                $total += ($stations[$k]['station_status'] == 2 ? 5 : 2);
                            }
                        }
                    }
                    // if the start station is not the first
                    if ($stations[$i]['station_name'] == $_POST['start_station'] && $i != 0) {
                        // add start time
                        for ($j=0; $j<$start_sequence[0]['sequence']; $j++) {
                            if ($j == 0) {
                                $start_time += $stations[0]['station_time'];
                            } else {
                                $start_time += $stations[$j]['station_time'] + ($stations[$j]['station_status'] == 2 ? 5 : 2);
                            }
                        }
                        $start_time += ($stations[$i]['station_status'] == 2 ? 5 : 2);
                        // add end
                        for ($k=$start_sequence[0]['sequence']; $k<=$end_sequence[0]['sequence']; $k++) {
                            $end_time += isset($stations[$k]['station_time']) ? $stations[$k]['station_time'] : 0;
                            $total += isset($stations[$k]['station_time']) ? $stations[$k]['station_time'] : 0;
                            if (($k + 1) < $end_sequence[0]['sequence']) {
                                $end_time += ($stations[$k]['station_status'] == 2 ? 5 : 2);
                                $total += ($stations[$k]['station_status'] == 2 ? 5 : 2);
                            }
                        }
                        $end_time += $start_time;
                    }
                }
                // time calc depart ------- arrival   total
                $endTime = strtotime("+ $end_time minutes", strtotime($startingTime));
                $startTime = strtotime("+ $start_time minutes", strtotime($startingTime));
                $this->view->start_time = date("h:i", $startTime);
                $this->view->end_time = date("h:i", $endTime);
                $this->view->total = $total;
    
                // between start and end stations
                $calcTime = 0;
                $geholt = true;
                if (isset($start_sequence[0]) && isset($end_sequence[0])) {
                    // if start station was nr 1
                    for ($i=$start_sequence[0]['sequence']; $i<$end_sequence[0]['sequence']-1; $i++) {
                        // break before end
                        if ($stations[$i]['station_name'] == $_POST['end_station']) {
                            break;
                        }
                        if ($start_sequence[0]['sequence'] > 1 && $geholt) {
                            $geholt = false;
                            $calcTime += $stations[$i-1]['station_time'] + ($stations[$i-1]['station_status'] == 2 ? 5 : 2);
                            $calcTime += $stations[$i]['station_time'] + ($stations[$i]['station_status'] == 2 ? 5 : 2);
                        } else {
                            $calcTime += $stations[$i]['station_time'] + ($stations[$i]['station_status'] == 2 ? 5 : 2);
                        }

                        // set output
                        $output .= '<tr><td><strong>';
                        $output .= date("h:i", strtotime("+ $calcTime minutes", strtotime($startingTime)));
                        $output .= '</strong> ';
                        $output .= $stations[$i]['station_name'];
                        $output .= '</td></tr>';
                    }
                }

                // add departure times (in table on bottom)
                $this->view->departures = $start_time;
            } else if ($start_sequence[0]['sequence'] > $end_sequence[0]['sequence']) {
                // reverse loop throug all stations for calc times
                $this->view->start_time = 0;
                $this->view->end_time = 0;
                $this->view->total = 0;
                $this->view->output = 'Muss zu einem späteren Zeitpunkt noch weiterentwickelt werden!';
            } else {
                $this->view->same_stations = true;
            }

            $this->view->output = $output;
        } else {
            $this->view->no_entry = true;
        }

        $this->view->render($this->path . '/timeboard');
    }
}