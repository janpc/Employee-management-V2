const basePath = "http://localhost/employee-management-v2";
const $origin_loc = document.getElementById("origin_loc");
const $last_loc = document.getElementById("last_loc");
const $status = document.getElementById("status");
const $gender = document.getElementById("gender");
const statusOptions = [
  { name: "Alive", value: "Alive" },
  { name: "Dead", value: "Dead" },
  { name: "Unknown", value: "unknown" },
];

const genderOptions = [
  { name: "Female", value: "Female" },
  { name: "Male", value: "Male" },
  { name: "Genderless", value: "Genderless" },
  { name: "Unknown", value: "unknown" },
];

setLocations();
setStatus();
setGender();

function setLocations() {
  console.log("data");
  axios
    .get(`http://localhost/employee-management-v2/api/location`)
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
    console.log(option.name);
    $option = `<option value='${option.value}'>${option.name}</option>`;
    $optionSelected = `<option value='${option.value}' selected="selected">${option.name}</option>`;

    if ($gender.dataset["gender"] != option.value) {
      $gender.innerHTML += $option;
    } else {
      $gender.innerHTML += $optionSelected;
    }
  });
}

const $infoContainer = document.getElementById("infoContainer");

$infoContainer.addEventListener("submit", (event) => {
  event.preventDefault();
  const formData = new FormData(event.target)
  formData.append('id', $infoContainer.dataset['id'] );
  const value = Object.fromEntries(formData.entries());
  data = JSON.stringify(value);
  axios({
    method: "PUT",
    url: `${basePath}/api/character`,
    data: data,
  }).then((response) => {
    console.log(response);
  });
});
