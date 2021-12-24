<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Users</title>
  <link rel="stylesheet" href="assets/css/main.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
  <hr>
  <div class="container bootstrap snippets bootdey">
      <div class="row">
        <div class="col-md-1">
            <button type="button" id="add_user" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-primary btn-lg"> Add</button>
          </div>
          <div class="col-3">
        <select class="form-select form-select-lg" id="setup" aria-label=".form-select-lg  example">
            <option selected>Please select</option>
            <option value="" >Set active</option>
            <option value="">Set not active</option>
            <option value="">Delete</option>
        </select>
          </div>
          <div class="col-1">
            <button type="submit" id="ok_user" class="btn btn-outline-primary btn-lg">Ok</button>
          </div>
          <div class="col-lg-12">
              <div class="main-box no-header clearfix">
                  <div class="main-box-body clearfix">
                      <div class="table-responsive" id="table-res">
                          <table class="table user-list">
                              <thead>
                                  <tr>
                                  <th>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="checkall">
                                      <label class="custom-control-label" for="customCheck1"></label>
                                    </div>
                                  </th>
                                  <th><span>Name</span></th>
                                  <th><span>Status</span></th>
                                  <th><span>Role</span></th>
                                  <th><span>Options</span></th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  require_once 'mysql_connect.php';

                                  $sql = 'SELECT * FROM `users` ORDER BY `id` DESC';
                                  $query = $pdo->query($sql);
                                  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                      echo "
                                <tr>
                                    <td>
                                      <div class='custom-control custom-checkbox' id='ischeck'>
                                        <input type='checkbox' class='thing custom-control-input' id='customCheck2'>
                                        <label class='custom-control-label' for='customCheck2'></label>
                                        </div>
                                    </td>
                                    <td>
                                            <a>{$row['firstname']}</a>
                                        <span>{$row['lastname']}</span>
                                    </td>
                                    <td>

                                    <div id='ison' class='isons'>{$row['stat']}</div>
                                        <i id='online' class='fas fa-sm fa-circle' style='display: none; color: #51cf66;'></i>

                                        <i id='offline' class='fas fa-sm fa-circle' style='display: none; color: #8f8f8f;'></i>

                                    </td>

                                    <td>
                                        <span class='label label-default'>{$row['role']}</span>

                                    </td>

                                    <td style='width: 12%;'>
                                        <a href='/ajax/edit.php?id={$row['id']}'class='table-link text-info' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                            <span class='fa-stack'>
                                                <i class='fa fa-square fa-stack-2x'></i>
                                                <i class='fa fa-pencil fa-stack-1x fa-inverse'></i>
                                            </span></a>

                                        <a href='/ajax/delete.php?id={$row['id']}' class='table-link danger' data-bs-toggle='modal' data-bs-target='#deleteModal'>
                                            <span class='fa-stack'>
                                                <i class='fas fa-minus-square fa-2x'></i>
                                            </span></a>
                                    </td>

                                </tr>";
                              }?>
                          </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

          <div class="row">
            <div class="col-md-1">
            <button type="button" id="add_user" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-primary btn-lg"> Add</button>
              </div>
              <div class="col-3">
            <select class="form-select form-select-lg" id="setup" aria-label=".form-select-lg  example">
                <option selected>Please select</option>
                <option value="" >Set active</option>
                <option value="">Set not active</option>
                <option value="">Delete</option>
            </select>
              </div>
              <div class="col-1">
                <button type="submit" id="ok_user" class="btn btn-outline-primary btn-lg">Ok</button>
                </div>
            </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Добавить пользователя</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <div class="modal-body">
            <form method="post">
               <div class="form-group">
                <label for="firsname" class="form-label">Имя</label>
                <input type="text" name="firstname" id="firstname" class="form-control">
              </div>
               <div class="form-group">
                <label for="lastname" class="form-label">Фамилия</label>
                <input type="text" name="lastname" id="lastname" class="form-control">
              </div>

                <label class="form-label" for="name">Статус</label>
                  <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="stat">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Актив</label>
                  </div>
                <br>
                <label for="role" class="form-label">Роль</label>
                <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" id="role">
                <option selected>Выберите роль!</option>
                <option name="role">Админ</option>
                <option name="role">Пользователь</option>
                </select>
                <div class="alert alert-danger mt-2" id="errorBlock"></div>
                </div>
            </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
          <button type="button" id="reg_user" class="btn btn-primary">Добавить</button>
      </div>
    </div>
  </div>
</div>

  <script src="/assets/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $('#reg_user').click(function () {
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var stat = $('#stat:checked').val();
        var role = $('#role').val();

        $.ajax({
          url:'ajax/add.php',
          type: 'POST',
          cache: false,
          data: {'firstname' : firstname, 'lastname' : lastname, 'stat' : stat, 'role' : role},
          dataType: 'html',
          success: function (data) {
            if(data == 'Готово') {
              $('#reg_user').text('Все готово');
              $('#errorBlock').hide();
            } else {
              $('#errorBlock').show();
              $('#errorBlock').text(data);
          }
        }
    });
  });
</script>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Ви действительно хотите удалить пользователя?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#ison').each(function() {
if($(this).text() == 'Active'){
  $('#online').show();
}else{
  $('#offline').show();
}
});


</script>



</body>
</html>
