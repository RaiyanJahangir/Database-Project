<tr>
    <td><?php echo $id ?></td>
    <td><?php echo $name ?></td>
    <td><?php echo $bgroup ?></td>
    <td><?php echo $event ?></td>
    <td><?php echo $type ?></td>
    <td>
    <?php
        include_once '../database.php';
        $query = oci_parse($conn, "select max(blood_datedonation),trunc(sysdate)-TO_date(max(blood_datedonation), 'dd-mon-yy') 
                    from blood_bank where blood_bank_donor_id='$pid' and blood_bank_blood_type='$type'");
        oci_execute($query);
        $row = oci_fetch_array($query, OCI_BOTH);
        if(!$row){$row[0]="none";$row[1]="no";}
        echo $row[0];
        echo '('.$row[1].' days)';
    ?>
    </td>
    <td><?php echo $msg ?></td>
    <td>
    <form action="pending-requesters-profile-check.php" method="post">
    <input type="hidden" name="check_id" value="<?php echo $id; ?>">
    <button type="submit" name="check_btn" class="btn btn-info">CHECK</button>
    </form>
    </td>
    <td><?php echo $invitation ?></td>
    <td>
    <?php if($invitation=="APPROVED") : ?>
    <form action="test-result.php" method="post">
    <input type="hidden" name="type" value="<?php echo $type ?>">
    <input type="hidden" name="per_id" value="<?php echo $pid; ?>">
    <input type="hidden" name="don_id" value="<?php echo $id; ?>">
    <button type="submit" name="test_btn" class="btn btn-info">UPDATE</button>
    </form>
    <?php else : ?>
    <form action="test-result.php" method="post">
    <input type="hidden" name="type" value="<?php echo $type ?>">
    <input type="hidden" name="per_id" value="<?php echo $pid; ?>">
    <input type="hidden" name="don_id" value="<?php echo $id; ?>">
    <button type="submit" name="test_btn" class="btn btn-info" disabled>UPDATE</button>
    </form>
    <?php endif; ?>
    </td>
    <td>
    <?php if($invitation=="PASSED") : ?>
    <form action="check.php" method="post">
    <input type="hidden" name="person_id" value="<?php echo $pid; ?>">
    <input type="hidden" name="donar_id" value="<?php echo $id; ?>">
    <input type="hidden" name="bg_id" value="<?php echo $bgroup; ?>">
    <input type="hidden" name="bt_id" value="<?php echo $type; ?>">
    <input type="hidden" name="event_id" value="<?php echo $event; ?>">
    <button type="submit" name="donated_btn" class="btn btn-info">Donated</button>
    </form>
    <?php else : ?>
    <form action="check.php" method="post">
    <input type="hidden" name="person_id" value="<?php echo $pid; ?>">
    <input type="hidden" name="donar_id" value="<?php echo $id; ?>">
    <input type="hidden" name="bg_id" value="<?php echo $bgroup; ?>">
    <input type="hidden" name="bt_id" value="<?php echo $type; ?>">
    <input type="hidden" name="event_id" value="<?php echo $event; ?>">
    <button type="submit" name="donated_btn" class="btn btn-info" disabled>Donated</button>
    </form>
    <?php endif; ?>
    </td>
    <td>
    <?php if($invitation=="PASSED") : ?>
    <form action="check.php" method="post">
    <input type="hidden" name="donar_id" value="<?php echo $id; ?>">
    <button type="submit" name="not_donated_btn" class="btn btn-info">Not Donated</button>
    </form>
    <?php else : ?>
    <form action="check.php" method="post">
    <input type="hidden" name="donar_id" value="<?php echo $id; ?>">
    <button type="submit" name="not_donated_btn" class="btn btn-info" disabled>Not Donated</button>
    </form>
    <?php endif; ?>
    </td>
</tr>