 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add a Person
        <small></small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

     <div class="box">
        
        <div class="box-body">
                    <p class="validation_errors"><?php echo validation_errors(); ?></p>
                    <span class="label label-warning"><?php echo $this->session->flashdata('person_not_added'); ?></span>
                    <?php echo form_open('People_Controller/add_person'); ?></span>
                    <div class = "form-group">
                      <div class = "row">

                        <div class = "col-md-6">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id = "name" name = "name" placeholder="first name">
                        </div>
                        <div class = "col-md-6">
                          <label for="surname">Surname</label>
                          <input type="text" class="form-control" id = "surname" name = "surname" placeholder="last name">
                        </div>
                      </div>
                      
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="said">SA ID</label>
                          <input type="text" class="form-control" id = "said" name = "said" placeholder="sa id number">
                        </div>
                        <div class = "col-md-6">
                          <label for="mnumber">Mobile Number</label>
                          <input type="text" class="form-control" id = "mnumber" name = "mnumber" placeholder="mobile number">
                        </div>
                      </div>
                      
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id = "email" name = "email" placeholder="email address">
                        </div>
                        <div class = "col-md-6">
                          <label for="EMP_EMAIL">Date of Birth</label>
                          <input type="text" class="form-control" id = "dob" name = "dob" placeholder="date of birth">
                        </div>
                      </div>
                      
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="language">Language</label>
                          <?php $attributes = 'class="form-control" id="language" name="language"'; echo form_dropdown('language', $languages, set_value('language'), $attributes); ?>
                        </div>
                        <div class = "col-md-6">
                          <label for="LINE_MGR_EMAIL">Interests</label><font color='red'><b> Note:</b></font>&nbsp;&nbsp;<b>To Select Multiple Options Press ctrl+left click</b></p>
                          <?php $attributes = 'class="form-control" multiple id="interests" name="interests[]"'; echo form_dropdown('interests[]', $interests, set_value('interests[]'), $attributes); ?>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class = "col-md-6">
                  <button type="submit" class="btn btn-default pull-left" id="btnSave" name="btnSave">Add Person</button>
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
