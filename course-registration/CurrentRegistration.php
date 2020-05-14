<?php
    include 'inc/Header.php';
    if (!$session->is_signed_in()) {
        redirect("Login.php");
    }
    $student_id = Student::find_user_by_id($session->user_id);
    
    if(isset($_POST['btnSubmit']))
    { 
        $courseSelected = $_POST['courseSelected'];
        foreach ($courseSelected as $courseId) 
            {
                $studentID = $session->user_id;
                
                Registration::delete_course($studentID, $courseId);   
            }
    }   
?>
<div class="container text-center">
    <h2>Current Registrations</h2><br />
    <p>Hello, <?php echo $student_id->name; ?>!</p>
    <p><?php echo $mssg; ?></p>
    <p>You are currently registered for the following course(s):</p><br />
    <form method="post" id="form_id" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return confirmDelete(this);">
        <table class="table table-hover text-left">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Term</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Hours</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $currentStudent = Student::find_user_by_id($session->user_id);
                    $currentRegistration = $currentStudent->get_all_registered_courses();
                    $semester_total_hours = 0;
                    $year = $currentRegistration[0]->year;
                    $term = $currentRegistration[0]->term;
                    if (is_array($currentRegistration) || is_object($currentRegistration)) {
                    foreach ($currentRegistration as $cr): 
                        if ($year != $cr->year OR $term != $cr->term) {
                        $year = $cr->year;
                        $term = $cr->term;?>
                    <tr>
                        <th colspan="4" class="text-right">Total Weekly Hours</th>
                        <th><?php echo $semester_total_hours; $semester_total_hours=0;?></th>
                        <th></th>
                    </tr>
                <?php
                    }
                    $semester_total_hours += $cr->weekly_hours;?>
                    <tr>
                        <td><?php print $cr->year; ?></td> 
                        <td><?php print $cr->term; ?></td>
                        <td><?php print $cr->course_code; ?></td>
                        <td><?php print $cr->title; ?></td>
                        <td><?php print $cr->weekly_hours; ?></td>
                        <td><input type="checkbox" name="courseSelected[]" value="<?php echo $cr->course_code; ?>"></td>
                     </tr>
                <?php
                    endforeach; }?>
                    <tr>
                        <th colspan="4" class="text-right">Total Weekly Hours</th>
                        <th><?php echo $semester_total_hours; $semester_total_hours=0;?> </th>
                        <th></th>
                    </tr>
            </tbody>       
        </table><br />
        <p>
            <input type="submit" name="btnSubmit" value="Delete" class="btn btn-success btn-lg" />
            &nbsp; &nbsp; &nbsp;
            <input type="reset" name="btnClear" value="Clear" class="btn btn-success btn-lg" />
        </p>
    </form>    
</div>

<script>
    function confirmDelete()
    {
        var yes = confirm('Are you sure you want to delete selected registration?');
        if (yes) document.getElementById("form_id").submit();
        else return false;
    }
</script>
<?php include 'inc/Footer.php'; 