<?php if ($row["dokumen_diterima"] === 'Done') : ?>
<td class="text-success">
    <?php echo $row['dokumen_diterima']; ?>
</td>

<?php elseif ($row["dokumen_diterima"] === 'On Progress') : ?>
<td class="text-warning">
    <?php echo $row['dokumen_diterima']; ?>
</td>

<?php elseif ($row["dokumen_diterima"] === 'Over Schedule') : ?>
<td class="text-danger">
    <?php echo $row['dokumen_diterima']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['dokumen_diterima']; ?>
</td>
<?php endif ?>