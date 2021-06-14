<tr>
    <td><?php echo $id ?></td>
    <td><?php echo $name ?></td>
    <td><?php echo $bgroup ?></td>
    <td><?php echo $type ?></td>
    <td><?php echo $msg ?></td>
    <td>
    <form action="pending-requesters-profile-check.php" method="post">
    <input type="hidden" name="check_id" value="<?php echo $pid; ?>">
    <button type="submit" name="check_btn" class="btn btn-danger">CHECK</button>
    </form>
    </td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            </label>
        </div>
    </td>
    <td>
    <form action="eligibility-update.php" method="post">
    <input type="hidden" name="submit_id" value="<?php echo $id; ?>">
    <button type="submit" name="submit_btn" class="btn btn-danger">SUBMIT</button>
    </form>
    </td>
</tr>