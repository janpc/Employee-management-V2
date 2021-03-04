const basePath = "http://localhost/employee-management-v2";

const init = () => {
  axios.get(`${basePath}/api/episode`).then(({ data }) => {
    $("#jsGrid").jsGrid({
      width: "70vw",
      height: "65vh",
      inserting: true,
      editing: true,
      sorting: true,
      paging: true,
      pageSize: 15,
      pageButtonCount: 8,
      data,

      fields: [
        {
          name: "id",
          type: "number",
          width: 20,
          readOnly: true,
          align: "center",
        },
        { name: "name", type: "text", width: 60, validate: "required" },
        {
          name: "airDate",
          type: "date",
          width: 40,
          validate: "required",
          valueType: "string",
        },
        {
          title: "Season",
          name: "seasonNo",
          align: "center",
          type: "number",
          width: 40,
          validate: "required",
        },
        {
          title: "Episode",
          name: "episodeNo",
          align: "center",
          type: "number",
          width: 40,
          validate: "required",
        },
        { type: "control" },
      ],

      onItemInserting: function ({ item }) {
        const data = {};

        $.each(item, function (key, value) {
          if (key != "id") {
            data[key] = value;
          }
        });

        axios({
          method: "POST",
          url: `${basePath}/api/character`,
          data: data,
        }).then(() => {
          $("#jsGrid").jsGrid("refresh");
        });
      },

      onItemUpdating: function ({ item }) {
        data = JSON.stringify(item);
        axios({
          method: "PUT",
          url: `${basePath}/api/character`,
          data: data,
        }).then((response) => {
          if (response.status != 204) {
            $("#jsGrid").jsGrid("refresh");
          }
        });
      },

      onItemDeleting: function ({ item }) {
        axios({
          method: "DELETE",
          url: `${basePath}/api/character/${item.id}`,
        }).then(() => {
          $("#jsGrid").jsGrid("refresh");
        });
      },

      onRefreshing: function ({ grid }) {
        axios.get(`${basePath}/api/episode`).then(({ data }) => {
          grid.data = data;
        });
      },

      rowClick: function (args) {},
      rowDoubleClick: function ({ item }) {
        window.location.href = `${basePath}/episode/details/${item.id}`;
      },
    });
  });
};

$(init);
