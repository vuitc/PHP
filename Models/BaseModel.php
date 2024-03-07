<?php
require_once 'DatabaseModel.php';

class BaseModel extends Database
{
    public $conn;

    public function __construct()
    {
        // Gọi phương thức connect() của lớp cha để thiết lập kết nối
        $this->conn = $this->connect();
    }

    public function getAll($table)
    {
        try {
            // Sử dụng prepared statement để tránh SQL injection
            $stmt = $this->conn->prepare("SELECT * FROM `{$table}`");
            $stmt->execute();

            // Lấy tất cả các dòng dữ liệu
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    public function prepare($sql)
    {
        // Chuẩn bị truy vấn
        return $this->conn->prepare($sql);
    }
    public function getAllSql($sql)
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    public function getFind($sql, $id)
    {
        try {
            // Sử dụng prepared statement để tránh SQL injection
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Lấy dòng dữ liệu tương ứng với $id
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    public function getFindAll($sql, $id)
    {
        try {
            // Sử dụng prepared statement để tránh SQL injection
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Lấy dòng dữ liệu tương ứng với $id
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    public function getCount($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // Lấy số lượng dòng kết quả
        $rowCount = $stmt->rowCount();
        return $rowCount;
    }
    public function insertData($table, $data)
    {
        try {
            // Chuẩn bị danh sách tên cột và giá trị dựa trên dữ liệu đầu vào
            $columns = implode(', ', array_keys($data));
            $valueData = ':' . implode(', :', array_keys($data));
            // Sử dụng prepared statement để tránh SQL injection
            $stmt = $this->conn->prepare("INSERT INTO $table ($columns) VALUES ($valueData)");
            // Bind các giá trị từ mảng dữ liệu
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            // Thực thi truy vấn
            $stmt->execute();
            // Trả về ID của bản ghi mới được chèn
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    public function updateData($table, $data, $condition, $params = [])
    {
        try {
            $setClause = implode(', ', array_map(fn ($key) => "$key = :$key", array_keys($data)));
            $sql = "UPDATE $table SET $setClause WHERE $condition";
            $stmt = $this->conn->prepare($sql);
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            return $rowCount > 0;
        } catch (PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }
    public function getOneSql($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }

            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result !== false ? $result : null;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function deleteData($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            return $rowCount > 0;
        } catch (PDOException $e) {
            die("Delete failed: " . $e->getMessage());
        }
    }
    
}