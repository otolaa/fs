<?php
namespace Html\Models;

use Html\Database\Connection;

class NewsModel
{
    public $conn = null;
    public $table = 'news';
    public $limit = 10;

    public function __construct()
    {
        try {
            $this->conn = Connection::get()->connect();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getItemById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $sth = $this->conn->prepare($sql);
        $sth->execute([':id'=>$id]);

        $sth->setFetchMode(\PDO::FETCH_ASSOC);

        return $sth->fetch();
    }

    public function getItemList()
    {
        $res = [];

        $sql = "SELECT * FROM $this->table ORDER BY date DESC LIMIT $this->limit";
        $sth = $this->conn->prepare($sql);
        $sth->execute();

        $sth->setFetchMode(\PDO::FETCH_ASSOC);

        while ($row = $sth->fetch())
            $res[] = $row;

        return $res;
    }

    /**
    * $params = [':slug'=>'', ':title'=>'', ':description'=>'']
    */
    public function addItem($params = [])
    {
        // подготовка запроса для добавления данных
        $sql = "INSERT INTO $this->table (slug, title, description) VALUES(:slug, :title, :description)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        // возврат полученного значения id
        return $this->conn->lastInsertId();
    }

    public function deleteItem($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);

        return true;
    }

}