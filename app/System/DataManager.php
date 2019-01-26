<?php
    class DataManager{
		protected static function connection(){
			$opt  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			$link = new PDO(
                            __DB_CONNECTION__.":host=".__DB_HOST__.";dbname=".__DB_DATABASE__,
                            __DB_USERNAME__,
							__DB_PASSWORD__,
							$opt
						);
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			return $link;
		}
    }
?>