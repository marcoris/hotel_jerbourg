<?php

class Schedule_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Shows the list of stations
     *
     * @param string $start The start station
     * 
     * @return array The stations data
     */
    public function getStations($start)
    {
        // get station id
        $station_id = $this->db->select(
            'SELECT
                station_id
            FROM
                station
            WHERE
                station_name = :stationName',
                array(
                    ':stationName' => $start
                )
        );

        if (isset($station_id[0])) {
            // get line id
            $line_id = $this->db->select(
                'SELECT
                    line_id
                FROM
                    station_to_line
                WHERE
                    station_id = :stationID',
                    array(
                        ':stationID' => $station_id[0]['station_id']
                    )
            );
    
            // get station id
            $getStationIDs = $this->db->select(
                'SELECT
                    station_id
                FROM
                    station_to_line
                WHERE
                    line_id = :lineID',
                    array(
                        ':lineID' => $line_id[0]['line_id']
                    )
            );
            $stationIDs = '';
            for ($i=0; $i<count($getStationIDs); $i++)
            {
                $stationIDs .= "station_id = {$getStationIDs[$i]['station_id']} OR ";
            }
    
            $where = substr($stationIDs, 0, -4);
    
            return $this->db->select(
                "SELECT
                    station_id,
                    station_name,
                    station_time,
                    `sequence`,
                    station_status
                FROM
                    station
                WHERE
                    $where"
            );
        } else {
            return false;
        }
    }

    /**
     * Get train number
     *
     * @param string $month The month
     * @param string $month The station name
     * 
     * @return array train number
     */
    public function getTrainNr($month, $start)
    {
        $station_id = $this->db->select(
            'SELECT
                station_id
            FROM
                station
            WHERE
                station_name = :stationName',
                array(
                    ':stationName' => $start
                )
        );

        if (isset($station_id[0])) {
            $line_id = $this->db->select(
                'SELECT
                    line_id
                FROM
                    station_to_line
                WHERE
                    station_id = :stationID',
                    array(
                        ':stationID' => $station_id[0]['station_id']
                    )
            );

            return $this->db->select(
                "SELECT
                    useplan_train_nr
                FROM
                    `useplan`
                    LEFT JOIN useplan_to_line AS utl ON (utl.line_id = :lineID)
                WHERE
                    useplan_date = $month",
                array(
                    ':lineID' => $line_id[0]['line_id']
                )
            );
        } else {
            return false;
        }
    }

    /**
     * Get station sequences
     *
     * @param string $start The start station
     * 
     * @return array sequence
     */
    public function getSequence($start)
    {
        return $this->db->select(
            "SELECT
                `sequence`
            FROM
                station
            WHERE
                station_name = '$start'"
        );
    }
}
