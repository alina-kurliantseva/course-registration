<?php
    class Registration extends DB_object {
        protected static $db_table = "Registration";
        protected static $db_table_fields = array('student_id', 'course_code', 'semester_code');
        public $student_id;
        public $course_code;
        public $semester_code;       
        public static function delete_course($studentId, $courseCode) {
            global $database;        
            $sql = "DELETE FROM  " . self::$db_table . "  ";
            $sql .= "WHERE student_id= '" . $database->escape_string($studentId) . "'";
            $sql .= "AND course_code = '" . $database->escape_string($courseCode) . "'";
            $sql .= " LIMIT 1";
            $database->query($sql);
            return (mysqli_affected_rows($database->connection) == 1) ? true : false; 
        }        
    }
    
    
    

