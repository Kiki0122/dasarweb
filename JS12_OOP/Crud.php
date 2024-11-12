<?php
require_once 'Database.php';

class Crud {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Create
    public function create($jabatan, $keterangan) {
        $query = "INSERT INTO jabatan (jabatan, keterangan) VALUES ('$jabatan', '$keterangan')";
        return $this->db->conn->query($query);
    }

    // Read
    public function read() {
        $query = "SELECT * FROM jabatan";
        $result = $this->db->conn->query($query);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Read By Id
    public function readById($id) {
        $query = "SELECT * FROM jabatan WHERE id = $id";
        $result = $this->db->conn->query($query);
        return $result->num_rows == 1 ? $result->fetch_assoc() : null;
    }

    // Update
    public function update($id, $jabatan, $keterangan) {
        $query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = $id";
        return $this->db->conn->query($query);
    }

    // Delete
    public function delete($id) {
        $query = "DELETE FROM jabatan WHERE id = $id";
        return $this->db->conn->query($query);
    }
}
?>