 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        People
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Current People</h3>
          <span class="label label-info"><?php echo $this->session->flashdata('person_added'); ?></span>
          <span class="label label-warning"><?php echo $this->session->flashdata('person_added_no_email'); ?></span>
          <span class="label label-info"><?php echo $this->session->flashdata('person_deleted'); ?></span>
          <span class="label label-warning"><?php echo $this->session->flashdata('person_not_deleted'); ?></span>
          <div class="box-tools pull-right">
            <a href="<?php echo site_url('People_Controller/add_person_view'); ?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add a Person</a>
          </div>
        </div>
        <div class="box-body">
          
          <!-- Data table to display contractors -->
          <table class="table table-hover table-bordered table-striped display" id="tblPeople" name = "tblPeople">  
            <thead>
              <th>Fullname</th>
              <th>SA ID</th>
              <th>Mobile Number</th>
              <th>Email</th>
              <th>Date of Birth</th>
              <th>Language</th>
              <th>Interests</th>
              <th>Actions</th>
            </thead>
            <tbody>
              <?php

                if(sizeof($people) > 0){
                  foreach ($people as $row) {
                      
                      $link="";
                      $link .= "<a href='" . site_url("People_Controller/edit_person_view/$row->id") . "'id='edit' name='edit' class='btn btn-warning btn-circle' title='edit'><i class='fa fa-edit'></i></a> | <a href='" . site_url("People_Controller/delete/$row->id/$row->Name/$row->Surname") . "'id='delete' name='delete' class='btn btn-danger btn-circle' title='delete' onclick='javascript:return confirm(\"Are you sure to you want to delete this person?\")'><i class='fa fa-trash'></i></a>";
                      echo "<tr>";
                      echo "<td>" . $row->Name . " " . $row->Surname . "</td>";
                      echo "<td>" . $row->SA_ID . "</td>";
                      echo "<td>" . $row->Mobile_Number . "</td>";
                      echo "<td>" . $row->Email . "</td>";
                      echo "<td>" . $row->DOB . "</td>";
                      echo "<td>" . $row->language . "</td>";
                      echo "<td>" . $row->interests . "</td>";
                      echo "<td>" . $link . "</td>"; 
                      echo "</tr>";
                  }
                }

              ?>
            </tbody>
            <tfoot>
              <th>Fullname</th>
              <th>SA ID</th>
              <th>Mobile Number</th>
              <th>Email</th>
              <th>Date of Birth</th>
              <th>Language</th>
              <th>Interests</th>
              <th>Actions</th>
            </tfoot>
          </table>
        </div>
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 