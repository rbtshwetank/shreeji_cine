<?php include 'dash_header.php';
require_once ('config.php'); 

    $prod_data = $mysqli->query("select * from images ");

 ?>

<div id="examples" class="container py-2">

	<div class="row">
			<div class="col">
    
                <div col-sm-6>
                <h4>Upload Images</h4>
                </div>
                <div col-sm-6>
                <a href="add_upload_images.php" class="btn btn-primary mb-2">+ Add Images</a>
                </div>
                   
                    <table class="table table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Sr. No
                                                                    </th>
                                                                    <th>
                                                                        Type
                                                                    </th>
                                                                    <th>
                                                                        Product Image
                                                                    </th>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($prod_data->num_rows > 0) {?>
                                                                    <?php for (; $value = $prod_data->fetch_assoc();)  {

                                                                    $mul_imgs = json_decode($value['images'],true);

                                                                        $multiple_images = '';
                                                                            if (!empty($mul_imgs) && is_array($mul_imgs)) {
                                                                                foreach ($mul_imgs as $key => $mul_img) 
                                                                                {
                                                                                    $mul_image_url = 'img/back_images/'.$mul_img;
                                                                                    if (file_exists($mul_image_url)) {
                                                                                        $multiple_images .= '<img src ="'.$base_url.'/'.$mul_image_url.'" width="100px" height="100px"  />&nbsp;&nbsp;';
                                                                                    }
                                                                                }
                                                                            }

                                                                     ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?= $value['imdid'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $value['type'] ?>
                                                                        </td>
                                                                        <td>
                                                                             <?= $multiple_images  ?>
                                                                        </td>
                                                                        <td>
                                                                             <a href="<?= $base_url ?>/add_upload_images.php?id=<?= $value['imdid'] ?>"  data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="" data-bs-original-title="Edit Product"><i class="icon-pencil icons"></i></a>&nbsp;&nbsp;

                                                                        <a data-id="<?= $value['imdid'] ?>"  data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="" data-bs-original-title="Delete Images" class="remove"><i class="icon-trash icons"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php }else{ ?>
                                                                <tr>
                                                                    <td colspan="6" align="center">No Image Found</td>
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
               url: 'img_delete.php',
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