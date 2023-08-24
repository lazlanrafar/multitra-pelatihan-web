 <?php if ($row["submit_data_peserta"]) : ?>
 <td class="text-success">
     <?php echo formatDate($row['submit_data_peserta']); ?>
 </td>
 <?php else : ?>
 <td class="bg-danger text-white">
     <?php echo formatDate($row['submit_data_peserta']); ?>
 </td>
 <?php endif ?>
