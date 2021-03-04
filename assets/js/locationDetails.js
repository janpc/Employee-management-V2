
setResidents();

function setResidents() {
  axios
    .get(`http://localhost/employee-management-v2/api/character?locId=`)
    .then(({ data }) => {
      const locations = data;

      $origin_loc.innerHTML = "";
      $last_loc.innerHTML = "";
      locations.forEach((location) => {
        $option = `<option value='${location.id}'>${location.name}</option>`;
        $optionSelected = `<option value='${location.id}' selected="selected">${location.name}</option>`;

        if ($origin_loc.dataset["locationid"] != location.id) {
          $origin_loc.innerHTML += $option;
        } else {
          $origin_loc.innerHTML += $optionSelected;
        }

        if ($last_loc.dataset["locationid"] != location.id) {
          $last_loc.innerHTML += $option;
        } else {
          $last_loc.innerHTML += $optionSelected;
        }
      });
    });
}

function setStatus() {
  statusOptions.forEach((option) => {
    $option = `<option value='${option.value}'>${option.name}</option>`;
    $optionSelected = `<option value='${option.value}' selected="selected">${option.name}</option>`;

    if ($status.dataset["status"] != option.value) {
      $status.innerHTML += $option;
    } else {
      $status.innerHTML += $optionSelected;
    }
  });
}

function setGender() {
    genderOptions.forEach((option) => {
        console.log(option.name)
      $option = `<option value='${option.value}'>${option.name}</option>`;
      $optionSelected = `<option value='${option.value}' selected="selected">${option.name}</option>`;
  
      if ($gender.dataset["gender"] != option.value) {
        $gender.innerHTML += $option;
      } else {
        $gender.innerHTML += $optionSelected;
      }
    });
  }
