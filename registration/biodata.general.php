<?php

    if (isset($key) && $key == '12171996') {
        if ($user->pendamping == 0) {
            ?>
        	<br>
        	<form class="form-horizontal" action="" method="post">	
        		<label>Is there any Advisor (Teacher) who accompany you in BET 2016?</label>
        		<div class="radio">
        			<label>
        				<input type="radio" name="pendamping" id="optionsRadios1" value="1" checked>
        				No
        			</label>
        		</div>
        		<div class="radio">
        			<label>
        				<input type="radio" name="pendamping" id="optionsRadios2" value="2">
        				Yes
        			</label>
        		</div>
        		<br>
        		<input type="submit" name="pendamping-0-btn" class="btn btn-primary" value="Next">
        	</form>
            <?php
        } else if($user->pendamping == 1){
            ?>
            <div class="alert alert-success">you dont send advisor. To change this, contact admision</div>
            <?php
        } else if($user->pendamping == 2){
            ?>
            <br>
            <form class="form-horizontal" role="form" action="" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-8">
                        <input name="namapendamping" placeholder="e.x Moch Wahyu Imam Santosa M.Cs" maxlength="30" type="text" class="form-control" required="required" value="<?php echo $user->nama_pendamping;?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-8">
                        <input name="phonependamping" maxlength="12" placeholder="e.x 081234567891 or 0341-551611" type="text" class="form-control" required="required" value="<?php echo $user->kontak_pendamping;?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input type="submit" name="pendamping-2-btn" class="btn btn-primary" value="Save">
                    </div>
                </div>
            </form>
            <?php
        }

        if (isset($_POST['pendamping-0-btn'])) {
            $user->pendamping = $_POST['pendamping'];
            $user->save();
            header('location:biodata.php?status=success&message=success to save advisor!');
        }

        if (isset($_POST['pendamping-2-btn'])) {
            $user->nama_pendamping = $_POST['namapendamping'];
            $user->kontak_pendamping = $_POST['phonependamping'];
            $user->save();
            header('location:biodata.php?status=success&message=success to save advisor identity');
        }
        
    } else {
        header('location:index.php');
    }
    
?>