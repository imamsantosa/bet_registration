<?php

    if (isset($key) && $key == '12171996') {
        if ($competition->hasDebate()) {
            ?>
            <br>
            <div class="table-responsive">
                <div class="col-md-offset-1 col-md-10">
                    <table class="table table-condensed">
                       <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th width="32%">First Speaker</th>
                                <th width="32%">Second Speaker</th>
                                <th width="32%">Third Speaker</th>
                                <th width="2%">Option</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($competition->getDebate() as $data) {                      
                        ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $data['nama_peserta_1'];?></td>
                                <td><?php echo $data['nama_peserta_2'];?></td>
                                <td><?php echo $data['nama_peserta_3'];?></td>
                                <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#debate_<?php echo $no++; ?>">Edit</button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    
                </div>

                <?php $no = 1; foreach($competition->getDebate() as $data) {?>
                    <div class="modal fade" id="debate_<?php echo $no++;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Biodata Debate</h4>
                                </div>
                                <form class="form-horizontal" name="form-biodata-debate" id="form-biodata-debate" action="biodata.save.php?competition=debate" role="form" method="post">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                                <input type="hidden" name="username" value="<?php echo $_COOKIE['username']; ?>" />
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">First Speaker</label>
                                                  <div class="col-sm-10">
                                                      <input name="namapeserta1" maxlength="25" type="text" class="form-control" value="<?php echo($data['nama_peserta_1']);?>" required="required"/>
                                                  </div>
                                                </div>
                                                 <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                                                  <div class="col-sm-10">
                                                      <input name="phone1" placeholder="ex.081234567890 or 0341-551611 (make sure that your phone number is active)" value="<?php echo($data['no_telp_1']);?>" maxlength="12" type="text" class="form-control" required="required"/>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Food Allergy</label>
                                                  <div class="col-sm-10">
                                                      <textarea name="alergi1" cols="40" maxlength="255" placeholder="Do you have any food allergy? if yes, please mention it. if no, ignore this" rows="5" class="form-control" ><?php echo $data['alergi_1'];?></textarea>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Second Speaker</label>
                                                  <div class="col-sm-10">
                                                      <input name="namapeserta2" maxlength="25" type="text" class="form-control" value="<?php echo($data['nama_peserta_2']);?>" required="required"/>
                                                  </div>
                                                </div>
                                                 <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                                                  <div class="col-sm-10">
                                                      <input name="phone2" placeholder="ex.081234567890 or 0341-551611 (make sure that your phone number is active)" value="<?php echo($data['no_telp_2']);?>" maxlength="12" type="text" class="form-control" required="required"/>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Food Allergy</label>
                                                  <div class="col-sm-10">
                                                      <textarea name="alergi2" cols="40" maxlength="255" placeholder="Do you have any food allergy? if yes, please mention it. if no, ignore this" rows="5" class="form-control" ><?php echo $data['alergi_2'];?></textarea>
                                                  </div>
                                                </div><div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">third Speaker</label>
                                                  <div class="col-sm-10">
                                                      <input name="namapeserta3" maxlength="25" type="text" class="form-control" value="<?php echo($data['nama_peserta_3']);?>" required="required"/>
                                                  </div>
                                                </div>
                                                 <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                                                  <div class="col-sm-10">
                                                      <input name="phone3" placeholder="ex.081234567890 or 0341-551611 (make sure that your phone number is active)" value="<?php echo($data['no_telp_1']);?>"  maxlength="12" type="text" class="form-control" required="required"/>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">Food Allergy</label>
                                                  <div class="col-sm-10">
                                                      <textarea name="alergi3" cols="40" maxlength="255" placeholder="Do you have any food allergy? if yes, please mention it. if no, ignore this" rows="5" class="form-control" ><?php echo $data['alergi_3'];?></textarea>
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
            <div class="alert alert-danger" role="alert">You not register debate!</div>
        <?php  } 
    } else {
        header('location:index.php');
    }
    
?>