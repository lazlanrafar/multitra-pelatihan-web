<?php if ($row["permohonan_izin_pelatihan"] === 'On Progress') : ?>
<td class="text-warning">
    <?php echo $row['permohonan_izin_pelatihan']; ?>
</td>

<?php else : ?>
<td class="">
    <?php echo $row['permohonan_izin_pelatihan']; ?>
</td>
<?php endif ?>
