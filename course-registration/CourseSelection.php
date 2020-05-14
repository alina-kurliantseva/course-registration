<?php
    include 'inc/Header.php';
    if (!$session->is_signed_in()) {
        redirect("Login.php");
    }  
    $validation = TRUE;
    extract($_POST);  
    if(isset($btnSubmit))
    {
        $errorCourseSelection = ValidateCourseSelection($CourseSelected, $session->user_id, $selected_semester);
        if((strlen(trim($errorCourseSelection)) != 0)) {
            $validation = FALSE; 
        } elseif (isset($btnClear)) {
            unset($CourseSelected);                        
        }      
        if($validation) {
                foreach ($CourseSelected as $newCourseId) {
                $newRegistration = new Registration();
                $newRegistration->student_id = $session->user_id;
                $newRegistration->course_code = $newCourseId;
                $newRegistration->semester_code = $selected_semester;
                $newRegistration->create();               
            }
        }                              
    }    
?>
<div class="container text-center">
    <h2>Course Selection</h2><br />
    <p>Welcome, <?php echo Student::find_user_by_id($session->user_id)->name; ?>!</p> <!-- $session - because we have logged in -->
    <p>You have registered <?php echo Course::calculate_hours_student_already_has($session->user_id, $selected_semester); ?> hours for the selected semester.</p>
    <p>You can register <?php echo Course::calculate_hours_student_can_have($session->user_id, $selected_semester); ?> more hours of course(s) for the semester.</p>
    <p>Please note that the courses you have registered will not be displayed in the list.</p><br />
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="row">
            <div class="col-md-2 col-md-offset-10">                                            
                <select class="form-control" name="selected_semester" onchange="this.form.submit();">
                    <option value="-1">Semester</option>
                    <?php $semesters = Semester::find_all();
                        foreach ($semesters as $semester): ?>
                            <option value="<?php echo $semester->semester_code; ?>"
                                <?php if ($_POST['selected_semester'] == $semester->semester_code) { echo 'selected="selected"'; } ?>>
                                <?php echo $semester->year. " ". $semester->term; ?>
                            </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div><br />
        <div class="text-danger">
            <?php
                if(!$validation)
                {                
                    echo $errorCourseSelection;
                }                    
            ?>
        </div><br />        
        <table class="table table-hover text-left">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Course Title</th>
                    <th>Hours</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $selected_semester = $_POST['selected_semester'];
                    $courses = Course::find_course_by_semester($selected_semester);
                    foreach ($courses as $course):
                ?>
                <tr>
                    <td><?php echo $course->course_code; ?></td>
                    <td><?php echo $course->title; ?></td>
                    <td><?php echo $course->weekly_hours; ?></td>
                    <td><input type="checkbox" name="CourseSelected[]" value="<?php echo $course->course_code; ?>"></td>
                </tr>                
                <?php endforeach;?>                
            </tbody>
        </table><br />
        <p>
            <input type="submit" name="btnSubmit" value="Submit" class="btn btn-success btn-lg" />
            &nbsp; &nbsp; &nbsp;
            <input type="submit" name="btnClear" value="Clear" class="btn btn-success btn-lg" />
        </p><br />
    </form>    
</div>
<?php include "inc/Footer.php";