<?php
    class Course extends DB_object {
        protected static $db_table = "Course";
        protected static $db_table_fields = array('course_code', 'title', 'weekly_hours');
        public $course_code;
        public $title;
        public $weekly_hours; 
        public static function find_course_by_semester($semester_code) {
            $sql = "SELECT * FROM  Registration";
            $sql .= " WHERE semester_code = '$semester_code'";
            $the_result_array = self::find_by_query($sql);
            $registered_courses = array();
            foreach ($the_result_array as $course){
                array_push($registered_courses, $course->course_code);
            }
            $sql = "SELECT * FROM  Course";
            $sql .= " INNER JOIN CourseOffer";
            $sql .= " ON Course.course_code = CourseOffer.course_code";
            $sql .= " WHERE semester_code = '$semester_code'";
            $the_result_array = self::find_by_query($sql);       
            foreach ($the_result_array as $course){
                if ( in_array ($course->course_code, $registered_courses)){
                    unset($the_result_array[array_search($course, $the_result_array)]);
                }
            }
            return $the_result_array;           
        }
        public static function find_course_by_code($course_code) {
            $sql = "SELECT * FROM  Course";
            $sql .= " WHERE course_code = '$course_code'";
            $the_result_array = self::find_by_query($sql);
            return $the_result_array[0];           
        }
        public static function calculate_hours_student_already_has($student_id, $semester_code) {
            global $database;
            $student_id = $database->escape_string($student_id);
            $sql = "SELECT * FROM  Course";
            $sql .= " INNER JOIN Registration";
            $sql .= " ON Course.course_code = Registration.course_code";
            $sql .= " WHERE student_id = '$student_id' AND semester_code = '$semester_code'";            
            $courses_student_already_has_array = self::find_by_query($sql);
            $total_hours_student_already_has = 0;
            foreach ($courses_student_already_has_array as $course_student_already_has) {
                $total_hours_student_already_has += $course_student_already_has->weekly_hours;
            }
            return $total_hours_student_already_has;  
        }
        public static function calculate_hours_student_can_have($student_id, $semester_code) {
            $total_hours_student_already_has = self::calculate_hours_student_already_has($student_id, $semester_code);
            return $total_hours_student_can_have = 16 - $total_hours_student_already_has;
        }
        public static function calculate_hours_student_wants_to_add($courses_codes) {    
            $actual_courses = array();
            foreach ($courses_codes as $course_code) {
                array_push($actual_courses, self::find_course_by_code($course_code));                
            }
            $total_hours_student_wants_to_add = 0;
            foreach ($actual_courses as $actual_course) {
                $total_hours_student_wants_to_add += $actual_course->weekly_hours;
            }
            return $total_hours_student_wants_to_add;       
        }        
    }