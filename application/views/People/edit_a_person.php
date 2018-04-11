 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit a person
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

     <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $person->Name . " " . $person->Surname ?></h3>
          <span class="label label-info"><?php echo $this->session->flashdata('person_edited'); ?></span>
          <span class="label label-warning"><?php echo $this->session->flashdata('person_not_edited'); ?>
        </div>
        <div class="box-body">
                  	<p class="validation_errors"><?php echo validation_errors(); ?></p>
                    </span>
      				      <?php echo form_open('People_Controller/edit_person'); ?></span>
                    <div class = "form-group">
                      <div class = "row">
                        
                        <div class = "col-md-6">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($person->Name)) echo $person->Name; ?>">
                        </div>
                        <div class = "col-md-6">
                          <label for="surname">Surname</label>
                          <input type="text" class="form-control" id = "surname" name = "surname" value="<?php if(isset($person->Surname)) echo $person->Surname; ?>">
                        </div>
                      </div>
                      
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="said">SA ID</label>
                          <input type="text" class="form-control" id = "said" name = "said" value="<?php if(isset($person->SA_ID)) echo $person->SA_ID; ?>">
                        </div>
                        <div class = "col-md-6">
                          <label for="mnumber">Mobile Number</label>
                          <input type="text" class="form-control" id = "mnumber" name = "mnumber" value="<?php if(isset($person->Mobile_Number)) echo $person->Mobile_Number; ?>">
                        </div>
                      </div>
                      
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id = "email" name = "email" value="<?php if(isset($person->Email)) echo $person->Email; ?>">
                        </div>
                        <div class = "col-md-6">
                          <label for="dob">Date of Birth</label>
                          <input type="text" class="form-control" id = "dob" name = "dob" value="<?php if(isset($person->DOB)) echo date('Y/m/d', strtotime($person->DOB)); ?>">
                        </div>
                      </div>
                      
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="language">Language</label>
                          <?php $attributes = 'class="form-control" id="language" name="language"'; echo form_dropdown('language', $languages, $person->Language_ID, $attributes); ?>
                        </div>
                        <div class = "col-md-6">
                          <label for="interests">Interests</label><font color='red'><b> Note:</b></font>&nbsp;&nbsp;<b>To Select Multiple Options Press ctrl+left click</b>
                          <?php $attributes = 'class="form-control" multiple id="interests" name="interests[]"'; echo form_dropdown('interests[]', $interests, explode(',', $person->interests), $attributes); ?>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class = "col-md-6">
                          <input type="hidden" name="person_id" value="<?php if(isset($person->id)) echo $person->id; ?>">
                  <button type="submit" class="btn btn-default pull-left" id="btnSave" name="btnSave" onclick="return confirm('Are you sure you want to save the changes?')">Save Changes</button>
                </div>
                </div>
                    </div>
                    </form>
                  </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
