<link rel="stylesheet" href="<?php echo e(asset("css/report.css")); ?>" />
<header class="clearfix">
  
     
     <img style="margin: auto; display: block;" height="100px" width="250px" src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="<?php echo e(config('app.name', 'Laravel')); ?>">
  

      <h1>REPORT EXPENSES :   [ <?php echo e($from_date); ?> ] to [ <?php echo e($to_date); ?> ]</h1>
    <main>


      <table class="table table-bordered">
        <thead>
          <tr>
           <th class="">name</th>
           <th class="">category</th>
           <th class="">description</th>
           <th class="">date</th>
           <th class="">price / SDG</th>
          </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
            <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
                <td><?php echo e($expense->expense_name); ?></td>
                <td><?php echo e($expense->expense_category); ?></td>
                <td><?php echo e($expense->expense_description); ?></td>
                <td><?php echo e($expense->expense_date); ?></td>
                <td><?php echo e($expense->expense_price); ?></td><?php $total = $total +  $expense->expense_price ?>

              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total"><?php echo e($total); ?></td>
          </tr>
        </tbody>
      </table>
      <div id="notices"><h1></h1>
        xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx[Taiba Center: www.obaaa.sd]xxxx
        <div class="notice"> .</div>
      </div>
    </main>
    <!-- <footer>
      xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx[obaaa.sd]xxxx
    </footer> -->
