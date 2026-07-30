<?php
  $page_title = 'Add Product';
  require_once('includes/load.php');
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));
     $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
     $media_id = '0';

     // Handle image upload
     if (!empty($_FILES['product-image']['name'])) {
       $target_dir = "uploads/products/";
       $target_file = $target_dir . basename($_FILES["product-image"]["name"]);
       if (!is_dir($target_dir)) {
         mkdir($target_dir, 0777, true);
       }
       if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file)) {
         $file_name = $db->escape($_FILES["product-image"]["name"]);
         $file_type = $db->escape($_FILES["product-image"]["type"]);
         $query_media = "INSERT INTO media (file_name, file_type) VALUES ('{$file_name}', '{$file_type}')";
         if($db->query($query_media)){
           $media_id = $db->insert_id();
         }
       }
     } else if (!empty($_POST['product-photo'])) {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }

     $date    = make_date();
     $query  = "INSERT INTO products (";
     $query .=" name,quantity,buy_price,sale_price,categorie_id,media_id,date";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$media_id}', '{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Product added ");
       redirect('add_product.php', false);
     } else {
       $session->msg('d',' Sorry failed to add!');
       redirect('product.php', false);
     }
   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add New Product</span>
        </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-12">
          <form method="post" action="add_product.php" class="clearfix" enctype="multipart/form-data">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-th-large"></i>
                </span>
                <input type="text" class="form-control" name="product-title" placeholder="Product Title">
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="product-categorie">
                    <option value="">Select Product Category</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <select class="form-control" name="product-photo" id="product-photo">
                    <option value="">Select Existing Product Photo</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['file_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <small id="selected-photo" class="text-info"></small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="product-image">Or Upload New Product Image</label>
              <input type="file" name="product-image" class="form-control" id="product-image">
              <small id="file-name" class="text-info"></small>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                    </span>
                    <input type="number" class="form-control" name="product-quantity" placeholder="Product Quantity">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-usd"></i>
                    </span>
                    <input type="number" class="form-control" name="buying-price" placeholder="Buying Price">
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-usd"></i>
                    </span>
                    <input type="number" class="form-control" name="saleing-price" placeholder="Selling Price">
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" name="add_product" class="btn btn-danger">Add product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Show selected file name for upload
  document.getElementById('product-image').addEventListener('change', function(e) {
    var fileName = e.target.files.length ? e.target.files[0].name : '';
    document.getElementById('file-name').textContent = fileName ? 'Selected: ' + fileName : '';
  });
  // Show selected file name for dropdown
  document.getElementById('product-photo').addEventListener('change', function(e) {
    var selected = e.target.options[e.target.selectedIndex];
    var text = selected.value ? 'Selected: ' + selected.text : '';
    document.getElementById('selected-photo').textContent = text;
  });
</script>
<?php include_once('layouts/footer.php');