<?php

    if (isset($key) && $key == '12171996') {
        if ($competition->hasStory_telling()) {
            ?>
            <br>
            <div class="table-responsive">
                <div class="col-md-offset-3 col-md-6">
                    <table class="table table-condensed">
                       <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th width="75%">Full Name</th>
                                <th width="24%">Option</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($competition->getStory_telling() as $data) {                      
                        ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $data['nama_peserta'];?></td>
                                <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#story_telling_<?php echo $no++; ?>">Edit</button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php $no = 1; foreach($competition->getStory_telling() as $data) {?>
                    <div class="modal fade" id="story_telling_<?php echo $no++;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Biodata Story Telling</h4>
                                </div>
                                <form class="form-horizontal" name="form-biodata-story_telling" id="form-biodata-story_telling" action="biodata.save.php?competition=story_telling" role="form" method="post">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <input type="hidden" name="username" value="<?php echo $_COOKIE['username']; ?>" />
                                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
                                                  <div class="col-sm-10">
                                                      <input name="namapeserta" maxlength="25" type="text" class="form-control" value="<?php echo($data['nama_peserta']);?>" required="required"/>
                                                  </div>
                                                </div>
                                                 <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                                                  <div class="col-sm-10">
                                                      <input name="phone" placeholder="ex.081234567890 or 0341-551611 (make sure that your phone number is active)" value="<?php echo($data['no_telp']);?>" maxlength="12" type="text" class="form-control" required="required"/>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Food Allergy</label>
                                                  <div class="col-sm-10">
                                                      <textarea name="alergi" cols="40" maxlength="255" placeholder="Do you have any food allergy? if yes, please mention it. if no, ignore this" rows="5" class="form-control" ><?php echo $data['alergi'];?></textarea>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                      <label>
                                                        <input type="checkbox" required="required"> I'm sure that my data is valid !
                                                      </label>
                                                    </div>
                                                  </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" id="save-btn" class="btn btn-primary save-btn" value="Save" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php 
        } else { ?>
            <br>
            <div class="alert alert-danger" role="alert">You not register Story Telling!</div>
        <?php  } 
    } else {
        header('location:index.php');
    }
    
?>