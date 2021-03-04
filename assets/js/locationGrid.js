const basePath = 'http://localhost/employee-management-v2';

const init = () => {
	axios.get(`${basePath}/api/location`).then(({ data }) => {
		$('#jsGrid').jsGrid({
			width: '85vw',
			height: '65vh',
			inserting: true,
			editing: true,
			sorting: true,
			paging: true,
			pageSize: 15,
			pageButtonCount: 8,
			data,

			fields: [
				{
					hidden: true,
					name: 'id',
					type: 'number',
					width: 20,
					readOnly: true,
					align: 'center',
				},
				{
					name: 'name',
					title: 'Name',
					type: 'text',
					width: 60,
					validate: 'required',
				},
				{
					name: 'locType',
					title: 'Location type',
					type: 'text',
					width: 60,
					validate: 'required',
				},
				{
					name: 'dimension',
					title: 'Dimension',
					type: 'text',
					width: 60,
					validate: 'required',
				},
				{
					type: 'control',
				},
			],

			onItemInserting: function ({ item }) {
				axios.post(`${basePath}/api/location`, item);
			},

			onItemUpdating: function ({ item }) {
				axios.put(`${basePath}/api/location`, item);
        $("#grid").jsGrid("updateItem");
			},

			onItemDeleting: function ({ item }) {
				axios
					.delete(`${basePath}/api/location`, {
						params: {
							id: item.id,
						},
					})
					.then(() => {
						$('#jsGrid').jsGrid('refresh');
					});
			},

			onRefreshing: function ({ grid }) {
				axios.get(`${basePath}/api/location`).then(({ data }) => {
					grid.data = data;
				});
			},

			rowClick: function (args) {},
			rowDoubleClick: function ({ item }) {
				window.location.href = `${basePath}/location/details/${item.id}`;
			},
		});
	});
};

$(init);
