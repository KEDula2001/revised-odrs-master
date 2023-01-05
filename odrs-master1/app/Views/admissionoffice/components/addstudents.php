<section class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Dashboard</h1>
          <a href="<?php echo base_url('admission'); ?>" class="btn btn-primary">
            Back
          </a>
  </div>
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <div class="card">
        <div class="card-body p-4">
          <nav style="--bs-breadcrumb-divider: '<'; font-weight: bold;" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> Student Personal Information</li>
            </ol>
          </nav>
          <hr>
          <div class="row">
            <?php if (isset($errors['success_message'])): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?=$errors['success_message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
             <?php if (isset($errors['error_message'])): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?=$errors['success_message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <form class="form-floating" action="<?php echo base_url('/admission/insert-student'); ?>" method="post" autocomplete="off">
              <!-- first row -->
              <div class="row justify-content-center">
              <!-- student no. -->
                <div class="col-6">
                  <div class="form-group mb-3">
                    <label for="student_number" class="form-label">Student Numner*</label>
                    <input value="" type="text" name="student_number" class="form-control" id="student_number">
                    <?php if (isset($errors['student_number'])): ?>
                      <div class="text-danger">
                        <?=esc($errors['student_number'])?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
                <!-- student no. -->
                <!-- firstname -->
                <div class="col-6">
                  <div class="form-group mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input value="" type="text" name="firstname" class="form-control" id="firstname">
                    <?php if (isset($errors['firstname'])): ?>
                      <div class="text-danger">
                        <?=esc($errors['firstname'])?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <!-- first row -->
              <!-- second row -->
              <div class="row justify-content-center">  
                <div class="col-6">
                  <div class="form-group mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input value="" type="text" name="lastname" class="form-control" id="lastname">
                    <?php if (isset($errors['lastname'])): ?>
                      <div class="text-danger">
                        <?=esc($errors['lastname'])?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group mb-3">
                    <label for="middlename" class="form-label">Middle Name</label>
                    <input value="" type="text" name="middlename" class="form-control" id="middlename">
                    <?php if (isset($errors['middlename'])): ?>
                      <div class="text-danger">
                        <?=esc($errors['middlename'])?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <!-- second row -->                        
              <!-- third row -->
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" value="" name="email" id="email">
                    <?php if (isset($errors['email'])): ?>
                      <div class="text-danger">
                        <?=esc($errors['email'])?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <!-- third row -->
              <!-- third row -->
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="form-group mb-3">
                    <label for="course">Course</label>
                      <select class="form-control" name="course_id">
                        <option class="active">Select Course</option>
                        <?php if (!empty($courses)): ?>
                          <?php foreach ($courses as $course): ?>
                            <option value="<?=esc($course['id'])?>"><?=esc($course['course'])?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>     
                      </select>
                  </div>
                </div>
              </div>
              <!-- third row -->
              <button type="submit" class="float-end btn btn-primary" name="button">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2"></div>
  </div>
</section>