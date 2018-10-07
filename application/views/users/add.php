<!DOCTYPE html>
<html lang = "en">

   <head>
      <meta charset = "utf-8">
      <title>Registration</title>
   </head>
   <body>
         <?php
            echo form_open('Users/register_user');
            echo form_label('Email');
            echo form_input(array('id'=>'email','name'=>'email'));
            echo "<br/>";

            echo form_label('First Name');
            echo form_input(array('id'=>'first_name','name'=>'first_name'));
            echo "<br/>";

            echo form_label('Last Name');
            echo form_input(array('id'=>'last_name','name'=>'last_name'));
            echo "<br/>";

            echo form_label('Password');
            echo form_input(array('id'=>'passwd','name'=>'passwd'));
            echo "<br/>";

            echo form_label('Age');
            echo form_input(array('id'=>'age','name'=>'age'));
            echo "<br/>";

            echo form_label('Gender');
            echo form_input(array('id'=>'gender','name'=>'gender'));
            echo "<br/>";

            echo form_label('Occupation');
            echo form_input(array('id'=>'occupation','name'=>'occupation'));
            echo "<br/>";

            echo form_submit(array('id'=>'submit','value'=>'Add'));
            echo form_close();
         ?>
   </body>
</html>
