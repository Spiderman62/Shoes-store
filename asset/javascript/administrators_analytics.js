const handleGetCountProducts = {
	handleGet() {
		const _this = this;
		$.ajax({
			type: "POST",
			url: "/my_workspace/middleware/getCountProducts.php",
			dataType: "json",
			success: function (response) {
				response = $.map(response, function (elementOrValue, indexOrKey) {
					return {
						ID: elementOrValue.ID,
						view: elementOrValue.views
					}
				});
				// console.log(response);
				_this.handleReceive(response);
			}
		});
	},
	handleReceive(datas) {
		const ctx = $('#myChart');
		new Chart(ctx, {
			type: 'bar',
			data: {
				datasets: [{
					label: 'Views',
					data:
						datas
					,
					borderRadius: 1.5,
					backgroundColor: [
						'rgba(255,99,132,0.4)',
						'rgba(54,162,235,0.4)',
						'rgba(255,206,86,0.4)',
						'rgba(75,192,192,0.4)',
						'rgba(153,102,255,0.4)',
						'rgba(255,159,64,0.4)',
						'rgba(225,126,36,0.4)',
						'rgba(15,23,100,0.4)',
						'rgba(43,122,235,0.4)',
						'rgba(222,200,94,0.4)',
					],
					borderColor: [
						'rgba(255,99,132,0.2)',
						'rgba(54,162,235,0.2)',
						'rgba(255,206,86,0.2)',
						'rgba(75,192,192,0.2)',
						'rgba(153,102,255,0.2)',
						'rgba(255,159,64,0.2)',
						'rgba(225,126,36,0.2)',
						'rgba(15,23,100,0.2)',
						'rgba(43,122,235,0.2)',
						'rgba(222,200,94,0.2)',
					]
				}]
			},
			options: {
				parsing: {
					xAxisKey: 'ID',
					yAxisKey: 'view',
				},

			}
		});
	},
	main() {
		this.handleGet();
	}
}
handleGetCountProducts.main();
const handleGetAnalyticsOrder = {
	handleGet() {
		const _this = this;
		$.ajax({
			type: "POST",
			url: "/my_workspace/middleware/getAnalyticsOrder.php",
			dataType: "json",
			success: function (response) {
				const status = $.map(response, function (elementOrValue, indexOrKey) {
					return elementOrValue.status
				});
				const quantity = $.map(response, function (elementOrValue, indexOrKey) {
					return elementOrValue.quantity
				});
				// console.log(status, quantity);
				_this.handleReceive(status, quantity);
			}
		});
	},
	handleReceive(status, quantity) {
		const orderCharts = $('#orderChart');
		new Chart(orderCharts, {
			type: 'polarArea',
			data: {
				labels: status,
				datasets: [{
					data: quantity,
					borderRadius: 1.5,
					backgroundColor: [
						'rgba(255,99,132,0.4)',
						'rgba(54,162,235,0.4)',
						'rgba(255,206,86,0.4)',
						'rgba(75,192,192,0.4)',
						'rgba(153,102,255,0.4)',

					],
					borderColor: [
						'rgba(255,99,132,0.2)',
						'rgba(54,162,235,0.2)',
						'rgba(255,206,86,0.2)',
						'rgba(75,192,192,0.2)',
						'rgba(153,102,255,0.2)',

					]
				}]
			},
			options: {


			}
			// top level structure
		});
	},
	main() {
		this.handleGet();
	}
}
handleGetAnalyticsOrder.main();
const handleGetMaxMinProducts = {
	handleGet() {
		const _this = this;
		$.ajax({
			type: "POST",
			url: "/my_workspace/middleware/getMaxMinPriceProduct.php",
			dataType: "json",
			success: function (response) {
				const getMaxMin = $.map(response, function (item, index) {
					return [
						{
							label: item.name,
							value: item.max,
							
						},
						{
							label: item.name,
							value: item.min,
							
						}
					]
				});

				_this.handleReceive(getMaxMin);

			}
		});
	},
	handleReceive(data) {
		const ctx = $('#myMaxMin');
		new Chart(ctx, {
			type: 'bar',
			data: {
				labels: data.map(item => item.label),
				datasets: [{
					label: 'Max and min values',
					data:
						data.map(item => item.value)
					,
					borderRadius: 1.5,
					backgroundColor: (context) => {
						const index = context.dataIndex;
						return index % 2 === 0 ? 'rgba(255, 99, 132, 0.4)' : 'rgba(54, 162, 235, 0.4)';
					},
					borderColor: (context) => {
						const index = context.dataIndex;
						return index % 2 === 0 ? 'rgba(255, 99, 132, 1)' : 'rgba(54, 162, 235, 1)';
					},
				}]
			},
			options: {
			}
		});
	},
	main() {
		this.handleGet();
	}
}
handleGetMaxMinProducts.main();
const handleAverageProducts = {
	handleGet() {
		const _this = this;
		$.ajax({
			type: "POST",
			url: "/my_workspace/middleware/getAverageProducts.php",
			dataType: "json",
			success: function (response) {
				

				_this.handleReceive(response);

			}
		});
	},
	handleReceive(data) {
		const ctx = $('#myAverage');
		new Chart(ctx, {
			type: 'bar',
			data: {
				labels: data.map(item => item.name_category),
				datasets: [{
					label: 'Average',
					data:
						data.map(item => item.price)
					,
					borderRadius: 1.5,
					backgroundColor:[
						'rgba(255,99,132,0.4)',
						'rgba(54,162,235,0.4)',
						'rgba(255,206,86,0.4)',
						'rgba(75,192,192,0.4)',
						'rgba(153,102,255,0.4)',
					]
					}],
			},
			options: {
			}
		});
	},
	main() {
		this.handleGet();
	}
}
handleAverageProducts.main();