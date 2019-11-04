<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Response extends Model
{

    protected $fillable = [
        'new_users_id', 'rating', 'name', 'email', 'text', 'image'
    ];

    public function getLimitProducts($perPage, $pageNumber){

        $result = array();
        $mysql = new \mysqli('localhost','root','','test_task_php');
        $limit = $perPage * ($pageNumber - 1);
        $db = $mysql->query("SELECT * FROM `responses` LIMIT $limit,$perPage");
//        $count_array = $db->fetch_array(MYSQLI_NUM);

        while($result[] = mysqli_fetch_array($db))
        return $result;
//        $select = DB::table('responses')->limit($perPage,$perPage)->orderBy('id', 'desc')
//            ->get();
//        return $select;

//        $mysql->close();



//        $select = DB::table('responses')->limit($perPage)->orderBy('id', 'desc')
//            ->where('id','>=', $leftLimit)->where('id', '<',$rightLimit)
//            ->get();
//        $result = array();
//        $mysql = new \mysqli('localhost','root','','test_task_php');
//        $db = $mysql->query("SELECT * FROM `responses` LIMIT '$perPage' WHERE id >= $leftLimit and id < '$rightLimit'");
//
//        while($row = $db->fetch_assoc()) {
//            echo $row['name'].' '.$row['text'];
//        }
//        return $result;
//
//        $mysql->close();
//


//        $sql = "SELECT * FROM products LIMIT :leftLimit, :rightLimit";
//        $stmt = $this->db->prepare($sql);
//        $stmt->bindValue(":leftLimit", $leftLimit, PDO::PARAM_INT);
//        $stmt->bindValue(":rightLimit", $rightLimit, PDO::PARAM_INT);
//        $stmt->execute();
//        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            $result[$row['id']] = $row;
//        }
//        return $result;
    }
    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }

    /**
     * Get the connection of the entity.
     *
     * @return string|null
     */
    public function getQueueableConnection()
    {
        // TODO: Implement getQueueableConnection() method.
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        // TODO: Implement resolveRouteBinding() method.
    }
}
