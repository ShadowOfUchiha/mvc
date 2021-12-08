<?php

class DataHandler {
    private $username = "name";
    private $password = "pass";
    private $dbName = "dunk";
    private $serverHostname = "localhost";
    private $handle = 0;

    function __construct(string $dbName)
    {
        $this->handle = new PDO("mysql:host=" . $this->serverHostname . ";dbname=" . $this->dbName, $this->username, $this->password);
        $this->handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function CreateData(string $sql, array $params): int {
        $stmt = $this->handle->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    public function ReadData(string $sql, array $params): array {
        $stmt = $this->handle->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function UpdateData(string $sql, array $params): int {
        $stmt = $this->handle->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    public function DeleteData(string $sql, array $params): int {
        $stmt = $this->handle->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}