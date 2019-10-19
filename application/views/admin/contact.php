<h1><?php echo $title ?></h1>

<table class="table table-hover"> 
  <tbody> 
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $data[0]['address']; ?></td>
    </tr>
    <tr>
      <th scope="row">Phone</th>
      <td><a href="tel:<?php echo $data[0]['phone']; ?>"><?php echo $data[0]['phone']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><a href="mailto:<?php echo $data[0]['email']; ?>"><?php echo $data[0]['email']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">web</th>
      <td><a href="<?php echo $data[0]['web']; ?>"><?php echo $data[0]['web']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">facebook</th>
      <td><a href="<?php echo $data[0]['facebook']; ?>"><?php echo $data[0]['facebook']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">flickr</th>
      <td><a href="<?php echo $data[0]['flickr']; ?>"><?php echo $data[0]['flickr']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">twitter</th>
      <td><a href="<?php echo $data[0]['twitter']; ?>"><?php echo $data[0]['twitter']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">Out of Hours Security</th>
      <td><a href="tel:<?php echo $data[0]['security']; ?>"><?php echo $data[0]['security']; ?></a></td>
    </tr>
    <tr>
      <th scope="row">VHF Channel</th>
      <td><?php echo $data[0]['channel']; ?></td>
    </tr>
    <tr>
      <th scope="row">Waypoint position</th>
      <td><?php echo $data[0]['position']; ?></td>
    </tr>
    <tr>
      <th scope="row">Opening Hours</th>
      <td>
        <table> 
            <tr><th scope="row">Monday - Friday</th><td><?php echo $data[0]['mon-fri']; ?></td></tr>
            <tr><th scope="row">Saturday</th><td><?php echo $data[0]['sat']; ?></td></tr>
            <tr><th scope="row">Sunday</th><td><?php echo $data[0]['sun']; ?></td></tr>
          
        </table>
      </td>
    </tr>
    <tr>
      <th scope="row">Lat</th>
      <td><?php echo $data[0]['lat']; ?></td>
    </tr>
    <tr>
      <th scope="row">Long</th>
      <td><?php echo $data[0]['lon']; ?></td>
    </tr>
      


    <tr>
      <td>
      	<a href="#!" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit text-info"></i></a>-
      	<a href="#!" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash text-danger"></i></a>
      </td>
    </tr> 
  </tbody>
</table>
