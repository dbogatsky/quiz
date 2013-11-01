<a href="/admin/pages/add" class="btn btn-primary">Add new</a>
<div style="padding-top: 10px;">
    <table class="table">
        <tr>
            <th>
                ID
            </th>
            <th>
                Friendly Url
            </th>
            <th>
                Edit
            </th>
            <th>
                Delete
            </th>
        </tr>
        <?php foreach ($pages as $num => $page) { ?>
            <tr>
              <td>
                <?php echo $page->id; ?>
              </td>
              <td>
                  <?php echo $page->friendly_url; ?>
              </td>
              <td>
                  <a href="/admin/pages/edit/<?php echo $page->id; ?>"><div class="glyphicon glyphicon-edit"></div></a>
              </td>
              <td>
                  <a href="javascript:void(0);" onclick="if (confirm('Are you sure you want to delete it?')) location.href = '/admin/pages/delete/<?php echo $page->id; ?>'"><div class="glyphicon glyphicon-minus-sign"></div></a>
              </td>
          </tr>
        <?php } ?>
    </table>
</div>