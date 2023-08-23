 <?php if ($row["submit_data_peserta"]) : ?>
 <td class="text-success">
     <?php echo $row['submit_data_peserta']; ?>
 </td>
 <?php else : ?>
 <td class="bg-danger text-white">
     <?php echo $row['submit_data_peserta']; ?>
 </td>
 <?php endif ?>
