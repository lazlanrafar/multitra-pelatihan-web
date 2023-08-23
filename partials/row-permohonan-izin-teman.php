<?php if ($row["permohonan_izin_pelatihan"] === 'Done') : ?>
<td class="text-success">
    <?php echo $row['permohonan_izin_pelatihan']; ?>
</td>

<?php elseif ($row["permohonan_izin_pelatihan"] === 'On Progress') : ?>
<td class="text-warning">
    <?php echo $row['permohonan_izin_pelatihan']; ?>
</td>

<?php elseif ($row["permohonan_izin_pelatihan"] === 'Over Schedule') : ?>
<td class="text-danger">
    <?php echo $row['permohonan_izin_pelatihan']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['permohonan_izin_pelatihan']; ?>
</td>
<?php endif ?>
