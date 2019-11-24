<?php
require 'DB.php';

class ShortLink
{
    private static $DB;

    public function __construct()
    {
        self::$DB = DB::getDbh();
    }

    /**
     * Получение короткой ссылки и сохранение ее в базу
     * @param $url
     * @return bool|string
     */
    public function generate($url) {
        $link = substr(md5(sha1($url)) , 0 , 5);
        $sgmt = self::$DB->query("SELECT * FROM short_links WHERE LINK = '".$link."'");
        $res = $sgmt->fetch(PDO::FETCH_ASSOC);
        if(!$res) {
            $sql = "INSERT INTO short_links (URL, LINK) VALUES (?,?)";
            try {
                $stmt= self::$DB->prepare($sql);
                $stmt->execute([$url , $link]);
                $result = $link;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        } else {
            $result = $res['LINK'];
        }
        return $result;
    }
}