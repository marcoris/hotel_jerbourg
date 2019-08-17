<?php

class Dashboard extends Controller
{
    private $path = 'dashboard';

    public function __construct()
    {
        parent::__construct();
        Auth::check();

        $this->view->js = array($this->path . '/js/checkValidation.js');
    }

    /**
     * Call the render function
     */
    public function index()
    {
        // get data to work with (create form)
        // $this->view->lines = $this->model->getLines();
        // $this->view->locdriver = $this->model->getEmployees('', 1);
        // $this->view->controller = $this->model->getEmployees('', 2);
        // $this->view->locomotives = $this->model->getRollmaterials(1);
        // $this->view->waggons = $this->model->getRollmaterials(2);

        // // get useplans
        // $this->view->useplans = $this->model->getUseplans();
        
        $this->view->render($this->path . '/index');
    }
    
    /**
     * Shows the create page
     *
     */
    public function create()
    {
        $data = array();
        $data['date'] = $_POST['date'];
        $data['train_nr'] = $_POST['train_nr'];
        $data['line'] = $_POST['line'];
        $data['lok'] = $_POST['lok'];
        $data['kont'] = $_POST['kont'];
        $data['locomotive'] = $_POST['locomotive'];
        $data['waggons'] = $_POST['waggons'];

        $this->model->create($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * Shows the edit page
     *
     * @param int $id The affected employee id
     */
    public function edit($id)
    {
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
        $this->view->months = $months;
        $this->view->useplan_id = $id;
        $this->view->useplanData = $this->model->getUseplanData($id);
        $this->view->lines = $this->model->getLines();
        $this->view->locdriver = $this->model->getEmployees('', 1);
        $this->view->controller = $this->model->getEmployees('', 2);
        $this->view->locomotives = $this->model->getRollmaterials(1);
        $this->view->waggons = $this->model->getRollmaterials(2);
        $this->view->render($this->path . '/edit');
    }

    /**
     * The edit save function
     *
     * @param int $id The affected id
     */
    public function editSave($id)
    {
        $data = array();
        $data['useplan_id'] = $id;
        $data['date'] = $_POST['date'];
        $data['train_nr'] = $_POST['train_nr'];
        $data['currentLine'] = $_POST['currentLine'];
        $data['line'] = $_POST['line'];
        $data['lok'] = $_POST['lok'];
        $data['currentLok'] = $_POST['currentLok'];
        $data['currentLocomotive'] = $_POST['currentLocomotive'];
        $data['kont'] = $_POST['kont'];
        $data['currentKont'] = $_POST['currentKont'];
        $data['locomotive'] = $_POST['locomotive'];
        $data['waggons'] = $_POST['waggons'];
        $data['currentWaggons'] = $_POST['currentWaggons'];

        $this->model->editSave($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * The delete function
     *
     * @param int $id The affected id
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . $this->path);
    }

    /**
     * Call useplan
     *
     * @param int $employeeID The affected employee id
     * @param int $month The affected month
     * @param boolean $created If the useplan was automatically created
     */
    public function useplan($employeeID, $month, $created = false)
    {
        // define date and train number
        $date = date($month . "y");

        // add trailing 0
        if (strlen($date) < 4) {
            $date = "0" . $date;
        }

        // check if the useplan exists
        if ($created ||
            $this->model->checkUseplan($employeeID, $date)) {
            // get useplan details
            $this->view->month = $month;
            $this->view->trainNr = $this->model->getTrainNr($date);
            $this->view->line = $this->model->getLine($date);
            if ($_SESSION['category'] == 1) {
                $this->view->locDriver = array($_SESSION['firstname'], $_SESSION['lastname']);
                $this->view->controller = $this->model->getTheEmployees($date);
            } else {
                $this->view->locDriver = $this->model->getTheEmployees($date, true);
                $this->view->controller = array($_SESSION['firstname'], $_SESSION['lastname']);
            }
            $this->view->train = $this->model->getTrain($date, $_SESSION['employee_id']);

            $this->view->render($this->path . '/useplan');
        } else {
            // get lines and set the random line
            $lines = $this->model->getLines();
            $lineID = array_rand($lines);
            $theLineID = $lines[$lineID]['line_id'];
            $trainNr = $date . strtoupper(substr(md5(microtime()), rand(0, 26), 3));

            // insert useplan data
            $this->model->insertUseplan($date, $trainNr);

            // get last inserted id from useplan
            $lastUseplanID = $this->model->getLastUseplanID();
            $theUseplanID = $lastUseplanID[0]['useplan_id'];

            // create useplan to line relation
            $this->model->insertUseplanToLine($theLineID, $theUseplanID);

            // get employees
            $employees = $this->model->getEmployees($_SESSION['employee_id'], $_SESSION['category']);
            $employeeID = array_rand($employees);
            $coworkerID = $employees[$employeeID]['employee_id'];

            // create useplan to employee relations
            $this->model->insertUseplanToEmployee($theUseplanID, $_SESSION['employee_id']);
            $this->model->insertUseplanToEmployee($theUseplanID, $coworkerID);

            // get locomotives and set the random locomotive
            $locomotives = $this->model->getRollmaterials(1);
            $locomotiveID = array_rand($locomotives);
            $theLocomotiveID = $locomotives[$locomotiveID]['rollmaterial_id'];

            // create useplan to rollmaterial relation
            $this->model->insertUseplanToRollmaterial($theUseplanID, $theLocomotiveID);

            // get waggons and set the random waggons
            if ($theLineID == 3 || $theLineID == 4) {
                // get 2 x 1. class waggons
                $waggons = $this->model->getRollmaterials(2, 1);
                $waggonID = array_rand($waggons, 2);
                $theWaggonID1 = $waggons[$waggonID[0]]['rollmaterial_id'];
                $theWaggonID2 = $waggons[$waggonID[1]]['rollmaterial_id'];

                // create useplan to rollmaterial relations
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID1);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID2);

                // get 4 x 2. class waggons
                $waggons = $this->model->getRollmaterials(2, 2);
                $waggonID = array_rand($waggons, 4);
                $theWaggonID1 = $waggons[$waggonID[0]]['rollmaterial_id'];
                $theWaggonID2 = $waggons[$waggonID[1]]['rollmaterial_id'];
                $theWaggonID3 = $waggons[$waggonID[2]]['rollmaterial_id'];
                $theWaggonID4 = $waggons[$waggonID[3]]['rollmaterial_id'];

                // create useplan to rollmaterial relations
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID1);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID2);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID3);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID4);
            } else {
                // get 1 x 1. class waggon
                $waggons = $this->model->getRollmaterials(2, 1);
                $waggonID = array_rand($waggons);
                $theWaggonID = $waggons[$waggonID]['rollmaterial_id'];

                // create useplan to rollmaterial relation
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID);

                // 2 x 2. class waggons
                $waggons = $this->model->getRollmaterials(2, 2);
                $waggonID = array_rand($waggons, 2);
                $theWaggonID1 = $waggons[$waggonID[0]]['rollmaterial_id'];
                $theWaggonID2 = $waggons[$waggonID[1]]['rollmaterial_id'];

                // create useplan to rollmaterial relations
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID1);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID2);
            }
            
            // call the newly created useplan
            $this->useplan($employeeID, $month, true);
        }
    }
}