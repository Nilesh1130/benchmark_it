<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Check number is prime or not
function primeCheck($number){ 
    if ($number == 1) 
    return 0; 
    for ($i = 2; $i <= $number/2; $i++){ 
        if ($number % $i == 0) 
            return 0; 
    } 
    return 1; 
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>User From</title>
    </head>
    <body>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-5">Student Registration Form</h2>
                    <div class="card card-outline-secondary">
                        <div class="card-body">
			                  <?php 
			                  if($data['success'] === false){?>
                        		<div class="alert alert-danger" role="alert">
								  <?php echo $data['message']; ?>
								</div>
                        	<?php } elseif($data['message'] !== NULL) { ?>
                        		<div class="alert alert-success" role="alert">
								  <?php echo $data['message']; ?>
								</div>
                        	<?php } ?>
                        	
                            <form class="form" role="form" autocomplete="off" method="post" action="<?php echo base_url()."User/RegisterUser"?>" >
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control only-string" type="text" value="" name="first_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control only-string" type="text" value="" name="last_name" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" value="" name="email" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Pocket Money</label>
                                    <div class="col-lg-9">
                                        <input class="form-control only-digit" type="text" value="" name="pocket_money" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="" name="password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Age</label>
                                    <div class="col-lg-9">
                                        <input class="form-control only-digit" type="number" value="" name="age" min="3" size="2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">City</label>
                                    <div class="col-lg-9">
                                        <input class="form-control only-string" type="text" value="" name="city" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">State</label>
                                    <div class="col-lg-9">
                                        <input class="form-control only-string" type="text" value="" name="state" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Zip</label>
                                    <div class="col-lg-9">
                                        <input class="form-control only-digit" type="text" value="" name="zip" size="6">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Country</label>
                                    <div class="col-lg-9">
                                        <input class="form-control only-string" type="text" value="" name="country" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!--/col-->
            </div>

        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-5">2nd Highest Pocket Money</h2>
                    <div class="card card-outline-secondary">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-9">
                                	<?php if(!empty($data['secondLargestPocketMoney'])){ ?>
                                    <label class="col-lg-3 col-form-label form-control-label"><?php echo $data['secondLargestPocketMoney'][0]->first_name." ".$data['secondLargestPocketMoney'][0]->last_name ?></label>
                                    <label class="col-lg-3 col-form-label form-control-label"><?php echo $data['secondLargestPocketMoney'][0]->pocket_money ?></label>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/col-->
            </div>

        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-5">Student List</h2>
                    <div class="card card-outline-secondary">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <label class="col-lg-2 col-form-label form-control-label"><input type="checkbox"></label>

                                    <label class="col-lg-2 col-form-label form-control-label"><b>ID</b></label>

                                    <label class="col-lg-3 col-form-label form-control-label"><b>Name</b></label>
                                    <label class="col-lg-3 col-form-label form-control-label"><b>Pocket Money</b></label>
                                </div>
                                <?php
                                foreach ($data['students'] as $key => $student) {
                                        ?>
                                        <div class="col-lg-9">
                                        	<?php if(primeCheck($student->id)){?>
                                            <label class="col-lg-2 col-form-label form-control-label"><input type="checkbox"></label>
                                            <?php } else {?>
                                            	<label class="col-lg-2 col-form-label form-control-label"><input type="checkbox" disabled></label>
                                            <?php } ?>	
                                            <label class="col-lg-2 col-form-label form-control-label"><?php echo $student->id; ?></label>

                                            <label class="col-lg-3 col-form-label form-control-label"><?php echo $student->first_name . " " . $student->last_name; ?></label>
                                            <label class="col-lg-2 col-form-label form-control-label"><?php echo $student->pocket_money; ?></label>
                                        </div>
                                        <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/col-->
            </div>

        </div>
        <!--/container-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script type="text/javascript">
        	$(function () {
	        	// Only alphabet
		        $(".only-string").keyup(function(e) {
		          var regex = /^[a-zA-Z]+$/;
		          if (regex.test(e.target.value) !== true)
		            e.target.value = e.target.value.replace(/[^a-zA-Z]+/, '');
		        });
		        // only digit
		        $(".only-digit").keyup(function(e) {
		          var regex = /^[0-9]+$/;
		          if (regex.test(this.value) !== true)
		            this.value = this.value.replace(/[^0-9]+/, '');
		        });
		    });    
        </script>
    </body>
</html>