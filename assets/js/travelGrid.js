const basePath = "http://localhost/employee-management-v2";

const init = () => {
  axios.get(`${basePath}/api/travel`).then(({ data }) => {
    
      $("#jsGridTravels").jsGrid({
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
          {
            title: "Travel no",
            name: "id",
            type: "number",
            width: 20,
            readOnly: true,
            align: "center",
          },
          { title: "Episode", name: "episode.name", type: "text", width: 60, validate: "required" },
          { title: "Origin location", name: "originLoc.name", type: "text", width: 60, validate: "required" },
          { title: "Target location", name: "destinationLoc.name", type: "text", width: 60, validate: "required" },
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
            url: `${basePath}/api/travel`,
            data: data,
          }).then(() => {
            $("#jsGridTravels").jsGrid("refresh");
          });
        },

      onItemDeleting: function ({ item }) {
        axios.delete(`${basePath}/api/travel`, {
          params: {
            id: item.id
          }
        }).then(()=>{
          $("#jsGridTravels").jsGrid("refresh");
        });
      },

        onRefreshing: function ({ grid }) {
          axios.get(`${basePath}/api/travel`).then(({ data }) => {
            grid.data = data;
          });
        },

        rowClick: function (args) {},
        rowDoubleClick: function ({ item }) {
          window.location.href = `${basePath}/travel/details/${item.id}`;
        },
      });
  });
};

$(init);
