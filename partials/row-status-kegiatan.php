<?php if ($row["status_kegiatan"] === 'Running') : ?>
<td style="font-size:13px; color:blue" class="text-blue">
    <?php echo $row['status_kegiatan']; ?>
</td>

<?php elseif ($row["status_kegiatan"] === 'Postpone') : ?>
<td class="text-warning">
    <?php echo $row['status_kegiatan']; ?>
</td>

<?php elseif ($row["status_kegiatan"] === 'Cancel') : ?>
<td class="text-danger">
    <?php echo $row['status_kegiatan']; ?>
</td>

<?php elseif ($row["status_kegiatan"] === 'Done') : ?>
<td class="text-gray">
    <?php echo $row['status_kegiatan']; ?>
</td>

<?php elseif ($row["status_kegiatan"] === 'On Schedule') : ?>
<td class="text-success">
    <?php echo $row['status_kegiatan']; ?>
</td>

<?php elseif ($row["status_kegiatan"] === 'Estimate') : ?>
<td class="text-purple">
    <?php echo $row['status_kegiatan']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['status_kegiatan']; ?>
</td>
<?php endif ?>
