<?php
    class Semester extends DB_object {
        protected static $db_table = "Semester";
        protected static $db_table_fields = array('semester_code', 'term', 'year');
        public $semester_code;
        public $term;
        public $year;   
    }

