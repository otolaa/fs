<?php
namespace Html\Models;

use Html\Database\Connection;

class LinksModel
{
    public $conn = null;
    public $table = 'links';
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

    public function getItemBySlug($slug)
    {
        $sql = "SELECT * FROM $this->table WHERE slug = :slug";
        $sth = $this->conn->prepare($sql);
        $sth->execute([':slug'=>$slug]);

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
    * $url = 'https://pybo.ru'
    */
    public function addItem($url)
    {
        if (!$url)
            return false;

        $slug = $this->gen_password(6);
        $sql = "INSERT INTO $this->table (slug, url) VALUES(:slug, :url)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':slug'=>$slug,
            ':url'=>$url,
        ]);

        return ['id'=>$this->conn->lastInsertId(), 'slug'=>$slug, 'url'=>$url];
    }

    public function deleteItem($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);

        return true;
    }

    public function gen_password($length = 6)
    {
        $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP';
        $size = strlen($chars) - 1;
        $password = '';
        while($length--)
            $password .= $chars[random_int(0, $size)];

        return $password;
    }

}