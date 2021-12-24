<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLongTitle'>Добавить пользователя</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
          <form method='post'>
             <div class='form-group'>
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
              <select class='form-select form-control form-select-sm' aria-label='.form-select-sm example' id='role'>
              <option value='$role' selected>Выберите роль!</option>
              <option name='role'>Админ</option>
              <option name='role'>Пользователь</option>
              </select>
              <div class='alert alert-danger mt-2' id='errorBlock'></div>
              <input type='submit' value='Изменить'>
          </form>
    </div>
  </div>
</div>
</div>
