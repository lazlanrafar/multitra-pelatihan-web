<?php if ($row["submit_data_peserta"]) : ?>
<td class="">
    <?php echo formatDate($row['submit_data_peserta']); ?>
</td>
<?php else : ?>
<td class="bg-danger text-white">
    <?php echo formatDate($row['submit_data_peserta']); ?>
</td>
<?php endif ?>
