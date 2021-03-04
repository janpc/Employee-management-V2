const basePath = "http://localhost/employee-management-v2";

const $infoContainer = document.getElementById("infoContainer");
$infoContainer.addEventListener("submit", (event) => {
    event.preventDefault();
    const formData = new FormData(event.target)
    formData.append('id', $infoContainer.dataset['id'] );
    const value = Object.fromEntries(formData.entries());
    data = JSON.stringify(value);
  
    axios({
      method: "PUT",
      url: `${basePath}/api/episode`,
      data: data,
    });
  });