<?php if ($row["input_peserta"] === 'On Progress') : ?>
<td class="text-warning">
    <?php echo $row['input_peserta']; ?>
</td>

<?php else : ?>
<td class="">
    <?php echo $row['input_peserta']; ?>
</td>
<?php endif ?>
