  <!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  </head>
  <body>
    <button type="button" id="edit_user" data-toggle="modal" data-target="#editModalCenter" class="btn btn-outline-primary btn-lg"> Add</button>
      </div>
<?php
include '../mysql_connect.php';
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{

    $userid = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id = :userid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":userid", $userid);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach ($stmt as $row) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $role = $row['role'];
        }
        echo "<div class='modal fade' id='editModalCenter' tabindex='-1' role='dialog' aria-labelledby='editModalCenterTitle' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title' id='editModalLongTitle'>Изменить пользователя</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
              <div class='modal-body'>
                  <form method='post'>
                     <div class='form-group'>
                     <input type='hidden' name='id' value='$userid'>
                      <label for='firsname' class='form-label'>Имя</label>
                      <input type='text' name='firstname' value='$firstname' id='firstname' class='form-control'>
                    </div>
                     <div class='form-group'>
                      <label for='lastname' class='form-label'>Фамилия</label>
                      <input type='text' name='lastname' value='$lastname' id='lastname' class='form-control'>
                    </div>
                    <label class='form-label' for='name'>Статус</label>
                      <div class='form-check form-switch'>
                      <input class='form-check-input' type='checkbox' value='$stat' id='stat'>
                      <label class='form-check-label' for='flexSwitchCheckChecked'>Актив</label>
                      </div>
                    <br>
                    <label for='role' class='form-label'>Роль</label>
                    <select class='form-select form-control form-select-sm' aria-label='.form-select-sm example' id='role' value='$role'>
                    <option selected>Выберите роль!</option>
                    <option value='$role' name='role'>Админ</option>
                    </select>

                      <div class='alert alert-danger mt-2' id='errorBlock'></div>
                        <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Отмена</button>
                      <button type='submit'  class='btn btn-primary'>Изменить</button>
                      </div>
                  </form>
            </div>
          </div>
        </div>
        </div>
";
    }
    else{
        echo "Пользователь не найден";
    }
}
elseif (isset($_POST["id"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["role"])) {

    $sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, role = :role WHERE id = :userid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":userid", $_POST["id"]);
    $stmt->bindValue(":firstname", $_POST["firstname"]);
    $stmt->bindValue(":lastname", $_POST["lastname"]);
    $stmt->bindValue(":role", $_POST["role"]);
    $stmt->execute();
    header("Location: ../index.php");
} else{
    echo "Некорректные данные";
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
$('#edit_user').hide();
$("#edit_user").click();
});
</script>

</body>
</html>
