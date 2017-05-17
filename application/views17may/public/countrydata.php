 <div id="body">
<?php
foreach($results as $data) {
    echo $data->name . " - " . $data->id . "<br>";
}
?>
   <p><?php echo $links; ?></p>
  </div>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
 </div>