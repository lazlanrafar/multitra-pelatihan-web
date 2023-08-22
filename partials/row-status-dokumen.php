<?php if ($row["status_dokumen"] === 'Done') : ?>
<td class="text-success">
    <?php echo $row['status_dokumen']; ?>
</td>

<?php elseif ($row["status_dokumen"] === 'Proses Arsip') : ?>
<td>
    <?php echo $row['status_dokumen']; ?>
</td>

<?php elseif ($row["status_dokumen"] === 'Proses Kemnaker') : ?>
<td>
    <?php echo $row['status_dokumen']; ?>
</td>

<?php elseif ($row["status_dokumen"] === 'Siap Distribusi') : ?>
<td>
    <?php echo $row['status_dokumen']; ?>
</td>

<?php else : ?>
<td class="bg-danger text-white">
    <?php echo $row['status_dokumen']; ?>
</td>
<?php endif ?>