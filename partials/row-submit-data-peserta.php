<?php if ($row["submit_data_peserta"] === 'Done') : ?>
<td class="text-success">
    <?php echo $row['submit_data_peserta']; ?>
</td>

<?php elseif ($row["submit_data_peserta"] === 'Not Yet') : ?>
<td class="text-purple">
    <?php echo $row['submit_data_peserta']; ?>
</td>

<?php elseif ($row["submit_data_peserta"] === 'Late') : ?>
<td class="text-warning">
    <?php echo $row['submit_data_peserta']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['submit_data_peserta']; ?>
</td>
<?php endif ?>
