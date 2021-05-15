<?php

class DB
{

    private $kn = null;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        // hàm kết nối
        $this->kn = new mysqli(DB['server'], DB['username'], DB['password'], DB['name']);
        mysqli_set_charset($this->kn, "utf8");
        if (!$this->kn) {
            echo ('Lỗi kết nối cơ sở dữ liệu');
            return;
        }
    }

    public function query($sql)
    {
        $query = $this->kn->query($sql);
        if ($query) {
            if (is_object($query)) {
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_object()) {
                        $data[] = $row;
                    }
                    return $data;
                }
            }
            $sql = explode(' ', $sql);
            if ($sql[0] == 'SELECT') {
                return "Không có bản ghi nào ";
            }
            return 'Xử lý thành công ';
        } else {
            return 'Thao tác thất bại !';
        }
    }
    public function queryOne($sql)
    {
        $query = $this->kn->query($sql);
        if ($query) {
            if (is_object($query)) {
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_object()) {
                        $data = $row;
                    }
                    return $data;
                }
            }
            $sql = explode(' ', $sql);
            if ($sql[0] == 'SELECT') {
                return "Không có bản ghi nào ";
            }
            return 'Xử lý thành công ';
        } else {
            return 'Thao tác thất bại !';
        }
    }
    public function lastId()
    {
        return $this->kn->insert_id;
    }

    public function create($table, $data)
    {
        if (is_array($data)) {
            $dataKey   = implode(',', array_keys($data));
            $dataValue = [];
            foreach ($data as $value) {
                $dataValue[] = "'$value'";
            }
            $dataValue = implode(',', $dataValue);
            $sql       = "INSERT INTO $table($dataKey) VALUES($dataValue) ";
            $created = $this->kn->query($sql);
            if ($created) {
                return true;
            } else {
                return 'Thêm mới thất bại';
            }
        } else {
            die('Data bắt buộc phải là mảng !');
        }
    }
    public function update($table, $data, $id)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $dataUpdate[] = "$key = '$value'";
            }

            $dataUpdate = implode(',', $dataUpdate);

            $sql       = "UPDATE $table SET $dataUpdate WHERE id = '$id'";
            $updated = $this->kn->query($sql);
            if ($updated) {
                return true;
            } else {
                return 'Cập nhật thất bại';
            }
        } else {
            echo ('Data bắt buộc phải là mảng !');
        }
    }
    public function updateComment($table, $data, $id)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $dataUpdate[] = "$key = $value";
            }

            $dataUpdate = implode(',', $dataUpdate);

            $sql       = "UPDATE $table SET $dataUpdate WHERE id = '$id'";
            $updated = $this->kn->query($sql);
            if ($updated) {
                return 'Cập nhật thành công';
            } else {
                return 'Cập nhật thất bại';
            }
        } else {
            echo ('Data bắt buộc phải là mảng !');
        }
    }

    public function delete($table, $id, $where = [])
    {
        if (!empty($where)) {
            $sql = "DELETE FROM $table WHERE $where[0] = '$id'";
            $deleted = $this->kn->query($sql);
            if ($deleted) {
                return true;
            } else {
                return 'Xóa thất bại';
            }
        } else {

            $sql = "DELETE FROM $table WHERE id = '$id'";
            $deleted = $this->kn->query($sql);
            if ($deleted) {
                return true;
            } else {
                return 'Xóa thất bại';
            }
        }
    }
    public function find($table, $id)
    {
        $sql       = "SELECT * FROM $table WHERE id = '$id'";
        $dataTable = $this->kn->query($sql);
        if ($dataTable->num_rows > 0) {
            while ($row = $dataTable->fetch_object()) {
                $data = $row;
            }
        } else {
            $data = 'ID Không tồn tại !';
        }
        return $data;
    }
    public function findBanner($table, $status)
    {
        $sql       = "SELECT * FROM $table WHERE trang_thai = '$status'";
        $dataTable = $this->kn->query($sql);
        if ($dataTable->num_rows > 0) {
            while ($row = $dataTable->fetch_object()) {
                $data = $row;
            }
        } else {
            $data = 'ID Không tồn tại !';
        }
        return $data;
    }

    public function all($table)
    {
        $sql       = "SELECT * FROM $table";
        $dataTable = $this->kn->query($sql);
        $data = [];
        if ($dataTable->num_rows > 0) {
            while ($row = $dataTable->fetch_object()) {
                $data[] = $row;
            }
        } else {
            $data = 'Không có bản ghi nào !';
        }
        return $data;
    }
    public function CountRecord($table, $where = [])
    {
        if (empty($where)) {
            $sql = "SELECT count(id) as count FROM $table";
            $dataTable = $this->kn->query($sql);
            if ($dataTable->num_rows > 0) {
                while ($row = $dataTable->fetch_object()) {
                    $data = $row;
                }
            } else {
                $data = 'ID Không tồn tại !';
            }
        } else {

            foreach ($where as $key => $value) {
                $where = $key .= " = $value ";
            }

            $sql = "SELECT count(id) as count FROM $table Where $where ";
            $dataTable = $this->kn->query($sql);
            if ($dataTable->num_rows > 0) {
                while ($row = $dataTable->fetch_object()) {
                    $data = $row;
                }
            } else {
                $data = 'ID Không tồn tại !';
            }
        }

        return $data;
    }
    public function CountRecordLike($table, $where = [])
    {

        foreach ($where as $key => $value) {
            $where = $key .= " LIKE '$value' ";
        }

        $sql = "SELECT count(id) as count FROM $table Where $where ";
        $dataTable = $this->kn->query($sql);
        if ($dataTable->num_rows > 0) {
            while ($row = $dataTable->fetch_object()) {
                $data = $row;
            }
        } else {
            $data = 'ID Không tồn tại !';
        }

        return $data;
    }
    public function getInsertID()
    {
        return $this->kn->insert_id;
    }
}
