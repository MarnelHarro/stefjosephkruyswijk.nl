<?php
           
    class DB {

        /**
         * Get the data from db.ini file to create a connection 
         * It uses the keys: server, username, password and database
         * 
         * @return boolean/connection  false when it fails, a connection when it succeeds       
         */            
        private function getConnection() {
            
            $config = parse_ini_file("db.ini"); 
            $connection = mysqli_connect($config["server"], $config["username"], $config["password"], $config["database"]);
        
            if($connection === false) {
                error_log("Failed to connect to the database!");
                
                return false;
            }                

            return $connection;

        }

        /**
         * Execute the query
         * 
         * @param string    $query the query to be executed
         * 
         * @return string/connection  string when it fails, connection when it succeeds       
         */            
        public function executeTheQuery($query) {

            $conn = $this->getConnection();

            if ($conn !== false) {

                return $conn->query($query);
            
            }

            return "DB->executeTheQuery | Failed to establish connection";
        }        

        /**
         * Execute the insert query
         * 
         * @param array     $object The associative array with the column names and values
         * @param string    $table The name of the table
         * 
         * @return string/result  false when it fails, a connection when it succeeds       
         */            
        public function executeTheInsertQuery($object, $table) {

            $columns = "";
            $values = "";

            foreach ($object as $key => $value) {

                $columns .= $key . ", ";
                $values .= $value . ", ";

            }

            $columns = substr($columns, 0, -2);
            $values = substr($values, 0, -2);

            $query = "insert into $table ($columns) values ($values);";

            return $this->executeTheQuery($query);
        }

        private function setupQuery($object, $table) {
            
            $columns = "";

            foreach ($object as $item) {

                $columns .= $item . ", ";

            }

            $columns = substr($columns, 0, -2);
            
            return "select $columns from $table";             
        }

        private function setupQueryFilter($filter, $query) {

            if (!empty($filter)) {

                $where = " where";

                foreach ($filter as $key => $value) {

                    $where .= " " . $key . " in (" . $value . ") and ";

                }

                $where = substr($where, 0, -4) . ";";
                $query .= $where;

            }          
            
            return $query;
        }

        private function setupQueryOrder($order, $query) {

            if (!empty($order)) {

                $orderby = " order by ";

                foreach ($order as $key => $value) {

                    $orderby .= " " . $key . " " . $value . " and ";

                }

                $orderby = substr($orderby, 0, -4);
                $query .= $orderby;

            }            

            return $query;
        }

        private function setupQueryLimit($limit, $query) {

            if (!empty($limit)) {

                $limit = " limit " . $limit;
                $query .= $limit;

            }                        

            return $query;
        }

        private function setupQueryExecute($query) {

            $conn = $this->getConnection();

            if ($conn !== false) {

                $result = $conn->query($query);
                $array = array();

                while($row = mysqli_fetch_array($result)) {

                    array_push($array, $row);

                }

                return $array;
            }
            
            return false;
        }

        /**
         * Execute the select query
         * 
         * @param array     $object The array with the column names
         * @param string    $table  The name of the table
         * @param array     $filter The associative array with the column name and value(s)
         * @param array     $order  The associative array with the column name and value(s)
         * @param string    $limit  The limit for the query
         * 
         * @return string/result  false when it fails, a connection when it succeeds       
         */            
        public function executeTheSelectQuery($object, $table, $filter = "", $order = "", $limit = "") {

            $query = $this->setupQuery($object, $table);
            $query = $this->setupQueryFilter($filter, $query);
            $query = $this->setupQueryOrder($order, $query);
            $query = $this->setupQueryLimit($limit, $query);
            $result = $this->setupQueryExecute($query);

            if ($result !== false) {

                return $result;

            }

            error_log("executeTheSelectQuery | Incorrect connection");

            return false;            
        }

        /**
         * Execute the select query
         * 
         * @param array     $object The array with the column names
         * @param string    $table  The name of the table
         * @param array     $filter The associative array with the column name and value(s)
         * @param array     $like   The associative array with the column name and value(s)
         * @param array     $order  The associative array with the column name and value(s)
         * @param string    $limit  The limit for the query
         * 
         * @return string/result  false when it fails, a connection when it succeeds       
         */            
        public function executeTheSelectLikeQuery($object, $table, $filter = "", $like = "", $order = "", $limit = "") {

            $columns = "";
            $where = "";

            foreach ($object as $item) {

                $columns .= $item . ", ";

            }

            $columns = substr($columns, 0, -2);
            $query = "select $columns from $table"; 

            $where = " where";

            if (!empty($filter)) {

                foreach ($filter as $key => $value) {
                    $where .= " " . $key . " " . $value . " and ";
                }

                $where = substr($where, 0, -4);
                $query .= $where;

            }

            if (!empty($like)) {

                if (!empty($where)) {
                    $where = " and ";
                }

                foreach ($like as $key => $value) {
                    $where .= " " . $key . " like '%" . $value . "%' and ";
                }

                $where = substr($where, 0, -4);
                $query .= $where;

            }

            if (!empty($order)) {

                $orderby = " order by ";

                foreach ($order as $key => $value) {
                    $orderby .= " " . $key . " " . $value . " and ";
                }

                $orderby = substr($orderby, 0, -4);
                $query .= $orderby;

            }

            if (!empty($limit)) {

                $limit = " limit " . $limit;
                $query .= $limit;

            }            

            $conn = $this->getConnection();

            if ($conn !== false) {

                $result = $conn->query($query);
                $array = array();

                while($row = mysqli_fetch_array($result)) {

                    array_push($array, $row);

                }

                return $array;
            }

            error_log("executeTheSelectQuery | Incorrect connection");

            return false;            

        }

        /**
         * Execute the select query
         * 
         * @param array     $object The array with the column names
         * @param string    $table  The name of the table
         * @param array     $filter The associative array with the column name and value(s)
         * @param array     $order  The associative array with the column name and value(s)
         * @param string    $limit  The limit for the query
         * 
         * @return string/result  false when it fails, a connection when it succeeds       
         */            
        public function executeTheSelectWhereQuery($object, $table, $filter = "", $order = "", $limit = "") {

            $columns = "";
            $where = "";

            foreach ($object as $item) {

                $columns .= $item . ", ";

            }

            $columns = substr($columns, 0, -2);
            $query = "select $columns from $table"; 

            if (!empty($filter)) {

                $where = " where";

                foreach ($filter as $key => $value) {

                    $where .= " " . $key . " " . $value . " and ";

                }

                $where = substr($where, 0, -4);
                $query .= $where;

            }

            if (!empty($order)) {

                $orderby = " order by ";

                foreach ($order as $key => $value) {

                    $orderby .= " " . $key . " " . $value . " and ";

                }

                $orderby = substr($orderby, 0, -4);
                $query .= $orderby;

            }

            if (!empty($limit)) {

                $limit = " limit " . $limit;
                $query .= $limit;

            }            

            $conn = $this->getConnection();

            if ($conn !== false) {

                $result = $conn->query($query);
                $array = array();

                while($row = mysqli_fetch_array($result)) {
                    array_push($array, $row);
                }

                return $array;
            }

            error_log("executeTheSelectQuery | Incorrect connection");

            return false;            

        }
    }

?>