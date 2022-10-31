<?php

  echo "<table>";
  echo "<tr><th>Meta-Data</th><th>Value</th></tr>";

  #The URL root is the AWS meta data service URL where metadata
  # requests regarding the running instance can be made
  $urlRoot=getenv("ECS_CONTAINER_METADATA_URI_V4") . "/task";
 
  # Get the instance ID from meta-data and print to the screen
  //echo "<tr><td>InstanceId</td><td><i>" . file_get_contents($urlRoot . 'DockerId') . "</i></td><tr>";
  $str = file_get_contents($urlRoot);
  $json = json_decode($str, true);
  
  echo "<tr><td>DockerId</td><td><i>" . explode('-',$json['Containers'][0]['DockerId'])[0] . "</i></td><tr>";

  # Availability Zone
  //echo "<tr><td>Availability Zone</td><td><i>" . file_get_contents($urlRoot . 'placement/availability-zone') . "</i></td><tr>";
  echo "<tr><td>Availability Zone</td><td><i>" . $json['AvailabilityZone'] . "</i></td><tr>";

  echo "</table>";

?>
