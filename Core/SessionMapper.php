<?php

namespace Core;

use Core\Database;

/**
 * Class SessionMapper
 * @package Core
 */
class SessionMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM sessions ";
    protected const INSERT = "INSERT INTO sessions 
            ( session_id,date_touched,sess_data,created_at, updated_at)
            VALUE ( :session_id,NOW(), sess_data,NOW(),NOW())";
    protected const UPDATE = "SELECT sessions SET";

    /**
     * @param $attributes
     * @param $newAttributes
     * @param $session_id
     * @return array
     * @throws \Exception
     */
    /*public static function updateSession($attributes, $newAttributes, $session_id): array
    {
        $sql = "UPDATE sessions SET $attributes = :newAttributes WHERE session_id=:session_id";

        return Database::queryData($sql, ["newAttributes" => $newAttributes, "session_id" => $session_id]);
    }
*/
    /**
     * @param $data
     * @param $sess_id
     * @throws \Exception
     */
   /* public static function updateSessionData($data, $sess_id): void
    {
        $datas = [
            ':sess_data' => $data,
            ':session_id' => $sess_id
        ];

        $sql = "UPDATE sessions SET date_touched=NOW(), sess_data = :sess_data WHERE  session_id= :sess_id";

        Database::addData($sql, $datas);
    }*/

    /**
     * @param $sess_id
     * @return array
     */
    /*public static function deleteSession($sess_id): array
    {
        $sql = "DELETE FROM sessions WHERE session_id = $sess_id";
        return Database::query($sql);
    }*/

    /**
     * @param $session_id
     * @return array
     * @throws \Exception
     */
    /*public static function sessionGB($session_id): array
    {
        $sql = "DELETE FROM sessions WHERE  session_id =:session_id";
        return Database::queryData($sql, [':session_id' => $session_id]);
    }*/
}
