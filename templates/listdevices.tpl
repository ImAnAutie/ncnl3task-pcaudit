<table style="width:100%" class="devicestable">
  <tr>
    <th>HB Number</th>
    <th>Device Type</th>
    <th>Make</th>
    <th>Comment</th>
    <th>Working?</th>
    <th>Last changed by user</th>
    <th></th>

  </tr>
{foreach from=$devices item=device}
  <tr id="{$device.id}">
    <td><a href="device.php?id={$device.id}">{$device.hbnumber}</a></td>
    <td>{$device.type}</td>
    <td>{$device.make}</td>
    <td>{$device.comment}</td>
    <td>{$device.working}</td>
    <td><a href="user.php?id={$device.userid}">{$device.username}</a></td>
    <td><a href="deletedevice.php?id={$device.id}&roomid={$device.roomid}"><button id="delete" name="delete" class="btn btn-danger">DELETE</button></a></td>
  </tr>
{/foreach}
</table>
