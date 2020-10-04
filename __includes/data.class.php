<?php

	/*
		THe only class that can connect with the database layer
	*/
    class Data {
		
		public static function __executeQuery() {
			$db = new DB();	

			$query = "select columns from table";
            $result = $db->executeTheQuery($query);	
		}

		public static function __executeSelectQuery() {
			$db = new DB();

			$query = "select columns from table";
			$result = $db->executeTheQuery($query);	
			
			$array = array();

			while($row = mysqli_fetch_array($result)) {
				array_push($array, $row);
			}

            return $array;            
		}

		public static function __executeSelectQueryViaObject() {
			$db = new DB();
			
			$object = array();
			array_push($object, "column_01");
			array_push($object, "column_02");
			
			$table = "string";
			$filter["column_01"] = "< " . "variable";
			$orderby["column_02"] = "desc";
			$limit = "0, 31";
			
			return $db->executeTheSelectQuery($object, $table, $filter, $orderby, $limit);
		}

        /**
         * Execute the given query
         * 
         * @param string $query the query 
         */         
		public static function executeQuery($query) {
			$db = new DB();	

			FUNCTIONS::logErrorFromFunction($db->executeTheQuery($query));
		}

        /**
         * Execute the given query
         * 
         * @param string $query the query 
         * 
         * @return array the rows found       
         */         
		public static function executeSelectQuery($query) {
			$db = new DB();

			$result = $db->executeTheQuery($query);	
			
			$array = array();

			while($row = mysqli_fetch_array($result)) {
				array_push($array, $row);
			}

            return $array;            
		}

        /**
         * Count the number of records found 
         * 
         * @param string $table the name of the table
         * 
         * @return int the rows found       
         */         
		public static function countTotalRecords($table) {
			$db = new DB();

			$query = "select count(1) as count from " . $table;
			$result = $db->executeTheQuery($query);	
			
			$array = array();

			while($row = mysqli_fetch_array($result)) {
				array_push($array, $row);
			}

            return $array[0]["count"]; 			
		}
    }

?>