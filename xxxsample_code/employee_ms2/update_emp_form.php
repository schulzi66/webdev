<h3>Update Employee</h3>

<form action="update_emp.php" method="post">
    <input type="hidden" name="employee_no" required value="<?php echo $employee; ?>"/> </p>
    <p> First Name: <input type="TEXT" name="first_name" maxlength=20 autofocus required value="<?php echo $first; ?>"/> </p>
    <p> Last Name: <input type="TEXT" name="last_name" size=20 	maxlength=20 required value="<?php echo $last; ?>"/> </p>
    <p> DOB: <input type="TEXT" name="date_of_birth" required value="<?php echo $birth; ?>"/> </p>
    <p> Gender: </p>
    <p> <input type="RADIO" name="gender" value="Male" <?php if ($gender === 'Male') echo 'checked="checked"'; ?>/> Male
        <input type="RADIO" name="gender" value="Female" <?php if ($gender === 'Female') echo 'checked="checked"'; ?>/> Female </p>
    <p> Telephone: <input type="TEL" name="mobile_no" required value="<?php echo $telephone; ?>"/> </p>
    <p> Email: <input type="EMAIL" name="email" maxlength=40 required value="<?php echo $email; ?>"/> </p>
    <p> Address: <textarea name="address" cols="30" rows="6" maxlength=50 required><?php echo $address; ?></textarea> </p>
    <p> Salary: <input type="NUMBER" name="salary" min="20000" max="80000" required value="<?php echo $salary; ?>"/> </p>
    <p> Hire Date: <input type="TEXT" name="hire_date" required value="<?php echo $hire_date; ?>"/> </p>
    <p> <button class="add_employee" type="submit" name="_submit">Update</button> </p>

</form>