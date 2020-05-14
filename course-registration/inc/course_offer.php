<?php
    class Course_Offer extends DB_object {
        protected static $db_table = "CourseOffer";
        protected static $db_table_fields = array('course_code', 'semester_code');
        public $course_code;
        public $semester_code;          
    }