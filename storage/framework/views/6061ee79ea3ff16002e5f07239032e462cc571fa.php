<?php $__env->startSection('titel','Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
      
      

      <div class="col-lg-12 col-md-12" id="toggle-detail" >
          <div class="card"  >
              <div class="header">
                  <h4 class="title">create visit</h4>
              </div>
              <div class="content">
                  <form action="<?php echo e(url ('visit')); ?>" method="POST" enctype="multipart/form-data" >
                    <?php echo csrf_field(); ?>

                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Pationt</label>
                                  <p class="form-control border-input"><?php echo e($patient); ?></p>
                                  <input type="hidden" value="<?php echo e($patient); ?>">
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label>Date</label>
                                  <p class="form-control border-input"><?php echo e($stamp); ?> <?php echo e($visit_date); ?></p>
                                  <input type="hidden" value="<?php echo e($visit_date); ?>">
                              </div>
                          </div>
                            <?php $user_role = App\UserRole::where('role_id','=','1')->get(); ?>

                            <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Doctor</label>
                                      <select id="doctor_id" name="doctor_id" class="form-control border-input" required="true">
                                          <?php $__currentLoopData = $user_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                          <?php 
                                            $user = App\User::where('id','=',$value->user_id)->first();
                                            $employee_work_times = App\Employee_work_time::all();
                                          ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                      </select>
                                  </div>
                              </div>

                      </div>

                      <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="patient_address" class="form-control border-input" placeholder="Home Address">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="date" name="patient_birthday" class="form-control border-input">
                            </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Chronic Diseases</label>
                                  <textarea rows="5" name="patient_diseases" class="form-control border-input" placeholder="Description"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="text-center">
                          <button type="submit" class="btn btn-info btn-fill btn-wd">Add</button>
                      </div>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>