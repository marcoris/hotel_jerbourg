<?php

class Guests_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Shows the list of stations
     *
     * @return array The stations list
     */
    public function stationList()
    {
        return $this->db->select(
            'SELECT
                st.station_id,
                st.station_name,
                st.station_time,
                st.sequence AS station_sequence,
                st.station_status,
                l.line_name AS line_name
            FROM
                station AS st
                LEFT JOIN station_to_line AS stl ON (st.station_id = stl.station_id)
                LEFT JOIN line AS l ON (l.line_id = stl.line_id)'
        );
    }
    
    /**
     * Get lines
     *
     * @return array The lines data
     */
    public function getLines()
    {
        return $this->db->select(
            'SELECT
                line_id,
                line_name
            FROM
                line
            WHERE
                line_id != 1'
        );
    }
    
    /**
     * Get line to station
     * 
     * @param integer the affected id
     *
     * @return array The line id
     */
    public function getLineToStation($id)
    {
        return $this->db->select(
            'SELECT
                line_id
            FROM
                station_to_line
            WHERE
                station_id = :station_id',
            array(':station_id' => $id)
        );
    }

    /**
     * Creates a station
     *
     * @param array $data The data
     */
    public function create($data)
    {
        $insertStation = array(
            'station_name' => $data['station_name'],
            'station_time' => $data['station_time'],
            'sequence' => $data['station_sequence'],
            'station_status' => $data['station_status']
        );
        
        // insert station
        $this->db->insert('station', $insertStation);

        // get last inserted station id
        $getLastID = $this->db->select(
            'SELECT
                station_id
            FROM
                station
            ORDER BY
                station_id DESC
            LIMIT 1'
        );

        $insertStationToLine = array(
            'station_id' => $getLastID[0]['station_id'],
            'line_id' => $data['station_to_line']
        );
        
        // insert relation
        $this->db->insert('station_to_line', $insertStationToLine);
    }

    /**
     * Shows the affected station to edit
     *
     * @param int $id The affected id
     * 
     * @return array station data
     */
    public function edit($id)
    {
        return $this->db->select(
            'SELECT
                station_id,
                station_name,
                station_time,
                sequence,
                station_status
            FROM
                station
            WHERE
                station_id = :_id', array(':_id' => $id)
        );
    }

    /**
     * Saves the edited station data
     *
     * @param array $data The data
     */
    public function editSave($data)
    {
        $updateArray = array(
            'station_name' => $data['station_name'],
            'station_time' => $data['station_time'],
            'sequence' => $data['station_sequence'],
            'station_status' => $data['station_status']
        );
        $this->db->update('station', $updateArray, "`station_id`={$data['station_id']}");

        $updateStationToLine = array(
            'line_id' => $data['station_to_line']
        );
        $this->db->update('station_to_line', $updateStationToLine, "`station_id`={$data['station_id']}");
    }

    /**
     * Deletes the affected station
     *
     * @param int $id The affected id
     */
    public function delete($id)
    {
        // delete station
        $this->db->delete('station', "station_id = '$id'");

        // delete relation
        $this->db->delete('station_to_line', "station_id = '$id'");
    }
}
