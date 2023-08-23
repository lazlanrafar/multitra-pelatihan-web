<?php if ($row["input_peserta"] === 'Done') : ?>
<td class="text-success">
    <?php echo $row['input_peserta']; ?>
</td>

<?php elseif ($row["input_peserta"] === 'On Progress') : ?>
<td class="text-warning">
    <?php echo $row['input_peserta']; ?>
</td>

<?php elseif ($row["input_peserta"] === 'Over Schedule') : ?>
<td class="text-danger">
    <?php echo $row['input_peserta']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['input_peserta']; ?>
</td>
<?php endif ?>
