const basePath = "http://localhost/employee-management-v2";

const init = () => {
  axios.get(`${basePath}/api/character`).then(({ data }) => {
    $("#jsGrid").jsGrid({
      width: "90%",
      height: "60vh",
      inserting: true,
      editing: true,
      sorting: true,
      paging: true,
      data,
      fields: [
        { name: "id", type: "text", width: 40, readOnly: true },
        { name: "name", type: "text", width: 40, validate: "required" },
        { name: "status", type: "text", width: 40, validate: "required" },
        { name: "species", type: "text", width: 40, validate: "required" },
        { name: "gender", type: "text", width: 40, validate: "required" },
        {
          name: "originLocId",
          type: "select",
          width: 40,
          validate: "required",
        },
        {
          name: "lastLocId",
          type: "select",
          width: 40,
          validate: "required",
        },
        { type: "control" },
      ],

      onItemInserting: function ({ item }) {
        const data = [];

        $.each(item, function (key, value) {
          if (key != "id") {
            data.push(value);
          }
        });

        axios({
          method: "POST",
          url: `${basePath}/api/character`,
          data: data,
        });
      },

      onItemUpdating: function ({ item }) {
        const data = [];

        $.each(item, function (key, value) {
          data.push(value);
        });

        axios({
          method: "PUT",
          url: `${basePath}/api/character`,
          data: data,
        });
      },

      onItemDeleting: function ({ item }) {
        axios({
          method: "DELETE",
          url: `${basePath}/api/character/${item.id}`,
        });
      },

      rowClick: function (args) {},
      rowDoubleClick: function ({ item }) {
        window.location.href = `${basePath}/character/details/${item.id}`;
      },
    });
  });
};

$(init);
