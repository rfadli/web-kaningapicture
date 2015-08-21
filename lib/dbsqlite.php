<?php

class dbsqlite{
	private static $dbs;
	
	public static function init() {
        if (self::$dbs == null)
		{
			$db = new SQLite3('./db/mysqlitedb.db');
			
			self::$dbs = $db;
		}
        return self::$dbs;
    }
}