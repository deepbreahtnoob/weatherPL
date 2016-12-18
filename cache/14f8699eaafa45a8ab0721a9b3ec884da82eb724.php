<?php $__env->startSection('content'); ?>
<?php if($city != ''): ?>
<div class="container">
  <div class="mt-1">
    <h1>Pogoda</h1>
  </div>
  <p class="lead">Temperatura w <?php echo e($city); ?> wynosi <?php echo e($temp); ?> stopni celsiusz</p>
</div>
<?php endif; ?>
<?php if($city == ''): ?>
<div class="container">
  <div class="mt-1">
    <h1>Pogoda</h1>
  </div>
<form action="index.php" method="post">
  <div class="form-group">
    <label for="city">Podaj miasto</label>
    <input type="text" class="form-control" name='city' placeholder="Podaj Miasto:">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>