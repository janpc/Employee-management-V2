const basePath = "http://localhost/employee-management-v2";

const init = () => {
  axios.get(`${basePath}/api/character`).then(({ data }) => {
    $("#jsGrid").jsGrid({
      width: "85vw",
      height: "65vh",
      inserting: true,
      editing: true,
      sorting: true,
      paging: true,
      pageSize: 15,
      pageButtonCount: 8,
      data,

      fields: [
        { name: "id", type: "number", width: 20, readOnly: true},
        { name: "name", type: "text", width: 60, validate: "required" },
        { name: "status", type: "text", width: 40, validate: "required" },
        { name: "species", type: "text", width: 40, validate: "required" },
        { name: "gender", type: "text", width: 40, validate: "required" },
        {
          name: "originLocId",
          type: "number",
          width: 40,
          validate: "required",
        },
        {
          name: "lastLocId",
          type: "number",
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
