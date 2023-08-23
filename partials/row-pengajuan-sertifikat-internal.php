<?php if ($row["pengajuan_sertifikat_internal"] === 'Done') : ?>
<td class="text-success">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>

<?php elseif ($row["pengajuan_sertifikat_internal"] === 'On Progress') : ?>
<td class="text-warning">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>

<?php elseif ($row["pengajuan_sertifikat_internal"] === 'Over Schedule') : ?>
<td class="text-danger">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>
<?php endif ?>
