  <select name="location" id="location" class="form-control">
    <option value="">Select City</option>
    <?php foreach ($city as  $row) { ?>
      <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
    <?php } ?>
  </select>