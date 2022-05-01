<?php include 'dash_header.php';
require_once ('config.php'); 

    $prod_data = $mysqli->query("select proid, name,price,detail,single_img,AddedOn from products ");

 ?>

<div id="examples" class="container py-2">

	<div class="row">
			<div class="col">
    
                <div col-sm-6>
                <h4>Our Products</h4>
                </div>
                <div col-sm-6>
                <a href="dash_add_product.php" class="btn btn-primary mb-2">+ Add Product</a>
                </div>
                   
                    <table class="table table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Sr. No
                                                                    </th>
                                                                    <th>
                                                                        Product Name
                                                                    </th>
                                                                    <th>
                                                                        Product Image
                                                                    </th>
                                                                    <th>
                                                                        Category
                                                                    </th>
                                                                    <th>
                                                                        Date
                                                                    </th>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($prod_data->num_rows > 0) {?>
                                                                    <?php for (; $value = $prod_data->fetch_assoc();)  {

                                                                         $image_url = 'img/products/backend_img/'.$value['single_img'];

                                                                        if (file_exists($image_url) && !empty($value['single_img'])) 
                                                                        {
                                                                              $image_name = $base_url.'/'.$image_url; 
                                                                        }

                                                                     ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?= $value['proid'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $value['name'] ?>
                                                                        </td>
                                                                        <td>
                                                                             <?= !empty($image_name) ? '<img src="'.$image_name.'" width="100px" height="100px" /> ' : '-' ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $value['price'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $value['AddedOn'] ?>
                                                                        </td>
                                                                        <td>

                                                                        <a href="<?= $base_url ?>/view_single_product.php?vid=<?= $value['proid'] ?>"  data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="" data-bs-original-title="View Product"><i class="icon-eye icons"></i></a>
                                                                        &nbsp;&nbsp;

                                                                        <a href="<?= $base_url ?>/dash_add_product.php?id=<?= $value['proid'] ?>"  data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="" data-bs-original-title="Edit Product"><i class="icon-pencil icons"></i></a>&nbsp;&nbsp;

                                                                        <a data-id="<?= $value['proid'] ?>"  data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="" data-bs-original-title="Delete Product" class="remove"><i class="icon-trash icons"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php }else{ ?>
                                                                <tr>
                                                                    <td colspan="6" align="center">No Product Found</td>
                                                                </tr>
                                                            <?php } ?>
                                                            
                                                           
                                                            </tbody>
                                                        </table>
            </div>
        </div>
    </div>
<?php include 'dash_footer.php';?>

<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).data('id');
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'pro_delete.php',
               type: 'POST',
               data: {id: id},
               dataType:"json",
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                console.log(data)
                    alert("Record removed successfully");  
                    window.location.replace(data.TargetURL);
               }
            });
        }
    });


</script>