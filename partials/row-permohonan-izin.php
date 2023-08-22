<?php if ($row["permohonan_izin"] === 'Done') : ?>
<td class="text-success">
    <?php echo $row['permohonan_izin']; ?>
</td>

<?php elseif ($row["permohonan_izin"] === 'Late') : ?>
<td class="text-warning">
    <?php echo $row['permohonan_izin']; ?>
</td>

<?php elseif ($row["permohonan_izin"] === 'Not Yet') : ?>
<td class="text-purple">
    <?php echo $row['permohonan_izin']; ?>
</td>

<?php elseif ($row["permohonan_izin"] === 'Over Schedule') : ?>
<td class="text-danger">
    <?php echo $row['permohonan_izin']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['permohonan_izin']; ?>
</td>
<?php endif ?>
