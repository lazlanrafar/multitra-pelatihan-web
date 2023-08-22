<?php if ($row["pengajuan_sertifikat_internal"] === 'Done') : ?>
<td class="text-success">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>

<?php elseif ($row["pengajuan_sertifikat_internal"] === 'Not Yet') : ?>
<td class="text-purple">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>

<?php elseif ($row["pengajuan_sertifikat_internal"] === 'Late') : ?>
<td class="text-warning">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>
<?php endif ?>