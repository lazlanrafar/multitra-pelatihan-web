<?php if ($row["input_peserta"] === 'Done') : ?>
<td class="text-success">
    <?php echo $row['input_peserta']; ?>
</td>

<?php elseif ($row["input_peserta"] === 'Late') : ?>
<td class="text-warning">
    <?php echo $row['input_peserta']; ?>
</td>

<?php elseif ($row["input_peserta"] === 'Not Yet') : ?>
<td class="text-purple">
    <?php echo $row['input_peserta']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['input_peserta']; ?>
</td>
<?php endif ?>
