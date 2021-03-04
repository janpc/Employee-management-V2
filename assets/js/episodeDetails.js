const $infoContainer = document.getElementById("infoContainer");
$infoContainer.addEventListener("submit", (event) => {
    event.preventDefault();
    const formData = new FormData(event.target)
    const value = Object.fromEntries(formData.entries());
    data = JSON.stringify(value);
    axios({
      method: "PUT",
      url: `${basePath}/api/episode/${$infoContainer.dataset['id']}`,
      data: data,
    }).then((response) => {
      console.log(response.status);
      if (response.status != 204) {
        console.log('error');
      }
    });
  });