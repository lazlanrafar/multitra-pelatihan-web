<?php if ($row["dokumen_diterima"] === 'On Progress') : ?>
<td class="text-warning">
    <?php echo $row['dokumen_diterima']; ?>
</td>

<?php else : ?>
<td class="">
    <?php echo $row['dokumen_diterima']; ?>
</td>
<?php endif ?>
