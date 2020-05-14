<?php
    class Student extends DB_object {
        protected static $db_table = "Student";
        protected static $db_table_fields = array('student_id', 'name', 'phone', 'password');
        public $student_id;
        public $name;
        public $phone;
        public $password;
        public static function verify_user($student_id, $password) {
            global $database;
            $student_id = $database->escape_string($student_id);
            $password = $database->escape_string($password);
            $sql = "SELECT * FROM  " . self::$db_table . "  WHERE ";
            $sql .= "student_id = '{$student_id}'";
            $sql .= "AND password = '{$password}'";
            $sql .= "LIMIT 1";
            $the_result_array = self::find_by_query($sql);
            return !empty($the_result_array) ? array_shift($the_result_array) : false;        
        }
        public static function check_user_id($student_id) {
            global $database;
            $student_id = $database->escape_string($student_id);
            $sql = "SELECT * FROM  " . self::$db_table . "  WHERE ";
            $sql .= "student_id = '{$student_id}'";
            $sql .= "LIMIT 1";
            $the_result_array = self::find_by_query($sql);
            return $the_result_array;       
        }
        public function get_all_registered_courses()
        {
            global $database;
            $sql  = "SELECT s.year, s.term, c.course_code, c.title, c.weekly_hours, s.semester_code ";
            $sql .= "FROM Course c, Registration r, Semester s ";
            $sql .= "WHERE c.course_code = r.course_code ";
            $sql .= "AND r.student_id = '".$database->escape_string($this->student_id)."' ";
            $sql .= "AND r.semester_code = s.semester_code ";
            $sql .= "ORDER BY s.year, s.term";
            $results = $database->query($sql);
            $objectArray = array(); 
            while($row = mysqli_fetch_array($results))
            {
                $object = new stdClass;
                $object->year = $row[0];
                $object->term = $row[1];
                $object->course_code = $row[2];
                $object->title = $row[3];
                $object->weekly_hours = $row[4];
                $objectArray[] = $object;
            } 
            return !empty($objectArray) ? $objectArray : false;
        }
    }        