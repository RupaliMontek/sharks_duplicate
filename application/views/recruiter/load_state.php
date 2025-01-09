  <select name="state" id="state" class="form-control" onchange="change_state()">
    <option value="">Select State</option>
    <?php foreach ($state as  $row) { ?>
      <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
    <?php } ?>
  </select>