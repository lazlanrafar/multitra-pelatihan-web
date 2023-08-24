<?php if ($row["pengajuan_sertifikat_internal"] === 'On Progress') : ?>
<td class="text-warning">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>

<?php else : ?>
<td class="">
    <?php echo $row['pengajuan_sertifikat_internal']; ?>
</td>
<?php endif ?>
