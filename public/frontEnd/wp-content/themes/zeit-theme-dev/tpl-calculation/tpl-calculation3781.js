var estimationCalculator = function ($scope, $http) {
	$scope.triggeredSearch = false;
	$scope.employee_fee = 0;

	setTimeout(function () {
		$scope.tc_q_opt = 1;
	}, 500);

	let language = document.documentElement.lang;

	$scope.type_options = [
		{
			name: language == 'vi-VN' ? 'Khung Xương Cá' : 'Concealed Ceiling - V runner',
			value: 1
		},
		{
			name: language == 'vi-VN' ? 'Khung Đồng Dạng' : 'Concealed Ceiling - C runner',
			value: 2
		},
	]

	$scope.vach_options = [
		{
			name: language == 'vi-VN' ? 'Vách Chuẩn' : 'Standard Wall',
			value: 1
		},
		{
			name: language == 'vi-VN' ? 'Chống cháy 1 giờ' : '1-hour Fire Proof Wall',
			value: 2
		},
		{
			name: language == 'vi-VN' ? 'Chống cháy 2 giờ' : '2-hour Fire Proof Wall',
			value: 3
		}
	];

	$scope.setSize = function () {
		$scope.triggeredSearch = false;
		var option = $scope.est_opt;
		if (option == 1 || option == 2) {
			$scope.width = Math.round(Math.sqrt($scope.area) * 0.75);
			$scope.length = $scope.area / $scope.width;
		}

		if (option == 3) {
			$scope.width = 3;
			$scope.length = $scope.area / $scope.width;
		}
	}

	$scope.startCalculation = function () {
		console.log("Start Calculation");
		$scope.triggeredSearch = true;
		var option = $scope.est_opt;
		/* Trần Chìm */
		if (option == 1) {
			/* Đồng dạng */
			if ($scope.tc_t_opt.value == 2) {
				if ($scope.tc_q_opt == 2)
					calc_TCDDCC();
				else
					calc_TCDDPT();
			}
			/* Xương Cá */
			else {
				if ($scope.tc_q_opt == 2)
					calc_TCXCCC();
				else
					calc_TCXCPT();
			}
		}

		/* Trần Nổi */
		if (option == 2) {
			calc_TNPT();
		}

		/* Vách */
		if (option == 3) {
			if ($scope.v_opt.value == 3)
				calc_VCC2();
			else if ($scope.v_opt.value == 2)
				calc_VCC1();
			else
				calc_VC();
		}
	}

	/* Xương Cá */
	get_TCXCPT_1 = function () {
		var item = $scope.tcxcpt[0];
		item.quantity = Math.ceil(($scope.length / 0.9 + 1) * ($scope.width / 3.66) * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[0] = item;
	}
	get_TCXCPT_2 = function () {
		var item = $scope.tcxcpt[1];
		item.quantity = Math.ceil(($scope.width / 0.406) * ($scope.length / 4) * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[1] = item;
	}
	get_TCXCPT_3 = function () {
		var item = $scope.tcxcpt[2];
		item.quantity = Math.ceil(($scope.length + $scope.width) * 2);
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[2] = item;
	}
	get_TCXCPT_4 = function () {
		var item = $scope.tcxcpt[3];
		item.quantity = (Math.round(($scope.width - 0.3) / 0.9, 0) + 1) * (Math.round(($scope.length - 0.3) / 0.9, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[3] = item;
	}
	get_TCXCPT_5 = function () {
		var item = $scope.tcxcpt[4];
		item.quantity = (Math.round(($scope.width - 0.3) / 0.9, 0) + 1) * (Math.round(($scope.length - 0.3) / 0.9, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[4] = item;
	}
	get_TCXCPT_6 = function () {
		var item = $scope.tcxcpt[5];
		item.quantity = Math.round((Math.round(($scope.width - 0.3) / 0.9, 0) + 1) * (Math.round(($scope.length - 0.3) / 0.9, 0) + 1) / 2);
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[5] = item;
	}
	get_TCXCPT_7 = function () {
		var item = $scope.tcxcpt[6];
		item.quantity = Math.ceil(($scope.length * $scope.width) / (1.22 * 1.8) / 0.95);
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[6] = item;
	}
	get_TCXCPT_8 = function () {
		var item = $scope.tcxcpt[7];
		item.quantity = ($scope.length * $scope.width) / 100;
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[7] = item;
	}
	get_TCXCPT_9 = function () {
		var item = $scope.tcxcpt[8];
		item.quantity = ($scope.length * $scope.width) / 60 * 3;
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[8] = item;
	}
	get_TCXCPT_10 = function () {
		var item = $scope.tcxcpt[9];
		item.quantity = ($scope.length * $scope.width) / 100;
		item.total_cost = item.price * item.quantity;
		$scope.tcxcpt[9] = item;
	}

	var calc_TCXCPT = function () {
		get_TCXCPT_1();
		get_TCXCPT_2();
		get_TCXCPT_3();
		get_TCXCPT_4();
		get_TCXCPT_5();
		get_TCXCPT_6();
		get_TCXCPT_7();
		get_TCXCPT_8();
		get_TCXCPT_9();
		get_TCXCPT_10();
		var total_cost = 0;
		angular.forEach($scope.tcxcpt, function (value, key) {
			total_cost += value.total_cost;
		});
		$scope.employee_fee = calc_employee($scope.length * $scope.width, 1, 1, 1);
		$scope.material_cost = total_cost;
		$scope.total_cost = total_cost + $scope.employee_fee;
	}

	get_TCXCCC_1 = function () {
		var item = $scope.tcxccc[0];
		item.quantity = Math.ceil(($scope.length / 1.2 + 1) * ($scope.width / 3.66) * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[0] = item;
	}
	get_TCXCCC_2 = function () {
		var item = $scope.tcxccc[1];
		item.quantity = Math.ceil(($scope.width / 0.406) * ($scope.length / 4) * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[1] = item;
	}
	get_TCXCCC_3 = function () {
		var item = $scope.tcxccc[2];
		item.quantity = Math.ceil(($scope.length + $scope.width) * 2);
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[2] = item;
	}
	get_TCXCCC_4 = function () {
		var item = $scope.tcxccc[3];
		item.quantity = (Math.round(($scope.width - 0.3) / 1.2, 0) + 1) * (Math.round(($scope.length - 0.3) / 1.2, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[3] = item;
	}
	get_TCXCCC_5 = function () {
		var item = $scope.tcxccc[4];
		item.quantity = (Math.round(($scope.width - 0.3) / 1.2, 0) + 1) * (Math.round(($scope.length - 0.3) / 1.2, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[4] = item;
	}
	get_TCXCCC_6 = function () {
		var item = $scope.tcxccc[5];
		item.quantity = Math.round((Math.round(($scope.width - 0.3) / 1.2, 0) + 1) * (Math.round(($scope.length - 0.3) / 1.2, 0) + 1) / 2);
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[5] = item;
	}
	get_TCXCCC_7 = function () {
		var item = $scope.tcxccc[6];
		item.quantity = Math.ceil(($scope.length * $scope.width) / (1.22 * 1.8) / 0.95);
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[6] = item;
	}
	get_TCXCCC_8 = function () {
		var item = $scope.tcxccc[7];
		item.quantity = ($scope.length * $scope.width) / 100;
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[7] = item;
	}
	get_TCXCCC_9 = function () {
		var item = $scope.tcxccc[8];
		item.quantity = ($scope.length * $scope.width) / 60 * 3;
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[8] = item;
	}
	get_TCXCCC_10 = function () {
		var item = $scope.tcxccc[9];
		item.quantity = ($scope.length * $scope.width) / 100;
		item.total_cost = item.price * item.quantity;
		$scope.tcxccc[9] = item;
	}

	var calc_TCXCCC = function () {
		get_TCXCCC_1();
		get_TCXCCC_2();
		get_TCXCCC_3();
		get_TCXCCC_4();
		get_TCXCCC_5();
		get_TCXCCC_6();
		get_TCXCCC_7();
		get_TCXCCC_8();
		get_TCXCCC_9();
		get_TCXCCC_10();
		var total_cost = 0;
		angular.forEach($scope.tcxccc, function (value, key) {
			total_cost += value.total_cost;
		});
		$scope.employee_fee = calc_employee($scope.length * $scope.width, 1, 1, 1);
		$scope.material_cost = total_cost;
		$scope.total_cost = total_cost + $scope.employee_fee;
	}
	/* /Xương Cá */

	/* Đồng dạng */
	get_TCDDPT_1 = function () {
		var item = $scope.tcddpt[0];
		item.quantity = (Math.ceil(($scope.length / 0.9 + 1) * ($scope.width / 4) * 1.03)) + (Math.ceil(($scope.width / 0.406) * ($scope.length / 4) * 1.03));
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[0] = item;
	}

	get_TCDDPT_2 = function () {
		var item = $scope.tcddpt[1];
		item.quantity = Math.ceil(($scope.length + $scope.width) * 2);
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[1] = item;
	}

	get_TCDDPT_3 = function () {
		var item = $scope.tcddpt[2];
		item.quantity = (Math.round(($scope.width - 0.3) / 0.9, 0) + 1) * (Math.round(($scope.length - 0.3) / 0.9, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[2] = item;
	}

	get_TCDDPT_4 = function () {
		var item = $scope.tcddpt[3];
		item.quantity = (Math.round(($scope.width - 0.3) / 0.9, 0) + 1) * (Math.round(($scope.length - 0.3) / 0.9, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[3] = item;
	}

	get_TCDDPT_5 = function () {
		var item = $scope.tcddpt[4];
		item.quantity = Math.round(((Math.round(($scope.width - 0.3) / 0.9, 0) + 1) * (Math.round(($scope.length - 0.3) / 0.9, 0) + 1)) / 3);
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[4] = item;
	}

	get_TCDDPT_6 = function () {
		var item = $scope.tcddpt[5];
		item.quantity = (Math.round(($scope.width - 0.3) / 0.9, 0) + 1) * (Math.round(($scope.length - 0.3) / 0.9, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[5] = item;
	}

	get_TCDDPT_7 = function () {
		var item = $scope.tcddpt[6];
		item.quantity = Math.round($scope.width / 0.403 * $scope.length / 0.9);
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[6] = item;
	}

	get_TCDDPT_8 = function () {
		var item = $scope.tcddpt[7];
		item.quantity = Math.ceil(($scope.length * $scope.width) / (1.22 * 1.8) / 0.9);
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[7] = item;
	}
	get_TCDDPT_9 = function () {
		var item = $scope.tcddpt[8];
		item.quantity = ($scope.length * $scope.width) / 100;
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[8] = item;
	}
	get_TCDDPT_10 = function () {
		var item = $scope.tcddpt[9];
		item.quantity = ($scope.length * $scope.width) / 60 * 3;
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[9] = item;
	}
	get_TCDDPT_11 = function () {
		var item = $scope.tcddpt[10];
		item.quantity = ($scope.length * $scope.width) / 100;
		item.total_cost = item.price * item.quantity;
		$scope.tcddpt[10] = item;
	}

	var calc_TCDDPT = function () {
		get_TCDDPT_1();
		get_TCDDPT_2();
		get_TCDDPT_3();
		get_TCDDPT_4();
		get_TCDDPT_5();
		get_TCDDPT_6();
		get_TCDDPT_7();
		get_TCDDPT_8();
		get_TCDDPT_9();
		get_TCDDPT_10();
		get_TCDDPT_11();
		var total_cost = 0;
		angular.forEach($scope.tcddpt, function (value, key) {
			total_cost += value.total_cost;
		});
		$scope.employee_fee = calc_employee($scope.length * $scope.width, 1, 1, 1);
		$scope.material_cost = total_cost;
		$scope.total_cost = total_cost + $scope.employee_fee;
	}

	get_TCDDCC_1 = function () {
		var item = $scope.tcddcc[0];
		item.quantity = (Math.ceil(($scope.length / 1.2 + 1) * ($scope.width / 4) * 1.03)) + (Math.ceil(($scope.width / 0.406) * ($scope.length / 4) * 1.03));
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[0] = item;
	}

	get_TCDDCC_2 = function () {
		var item = $scope.tcddcc[1];
		item.quantity = Math.ceil(($scope.length + $scope.width) * 2);
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[1] = item;
	}

	get_TCDDCC_3 = function () {
		var item = $scope.tcddcc[2];
		item.quantity = (Math.round(($scope.width - 0.3) / 1.2, 0) + 1) * (Math.round(($scope.length - 0.3) / 1.2, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[2] = item;
	}

	get_TCDDCC_4 = function () {
		var item = $scope.tcddcc[3];
		item.quantity = (Math.round(($scope.width - 0.3) / 1.2, 0) + 1) * (Math.round(($scope.length - 0.3) / 1.2, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[3] = item;
	}

	get_TCDDCC_5 = function () {
		var item = $scope.tcddcc[4];
		item.quantity = Math.round(((Math.round(($scope.width - 0.3) / 1.2, 0) + 1) * (Math.round(($scope.length - 0.3) / 1.2, 0) + 1)) / 3);
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[4] = item;
	}

	get_TCDDCC_6 = function () {
		var item = $scope.tcddcc[5];
		item.quantity = (Math.round(($scope.width - 0.3) / 1.2, 0) + 1) * (Math.round(($scope.length - 0.3) / 1.2, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[5] = item;
	}

	get_TCDDCC_7 = function () {
		var item = $scope.tcddcc[6];
		item.quantity = Math.round($scope.width / 0.403 * $scope.length / 1.2);
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[6] = item;
	}

	get_TCDDCC_8 = function () {
		var item = $scope.tcddcc[7];
		item.quantity = Math.ceil(($scope.length * $scope.width) / (1.22 * 1.8) / 0.9);
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[7] = item;
	}
	get_TCDDCC_9 = function () {
		var item = $scope.tcddcc[8];
		item.quantity = ($scope.length * $scope.width) / 100;
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[8] = item;
	}
	get_TCDDCC_10 = function () {
		var item = $scope.tcddcc[9];
		item.quantity = ($scope.length * $scope.width) / 60 * 3;
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[9] = item;
	}
	get_TCDDCC_11 = function () {
		var item = $scope.tcddcc[10];
		item.quantity = ($scope.length * $scope.width) / 100;
		item.total_cost = item.price * item.quantity;
		$scope.tcddcc[10] = item;
	}

	var calc_TCDDCC = function () {
		get_TCDDCC_1();
		get_TCDDCC_2();
		get_TCDDCC_3();
		get_TCDDCC_4();
		get_TCDDCC_5();
		get_TCDDCC_6();
		get_TCDDCC_7();
		get_TCDDCC_8();
		get_TCDDCC_9();
		get_TCDDCC_10();
		get_TCDDCC_11();
		var total_cost = 0;
		angular.forEach($scope.tcddcc, function (value, key) {
			total_cost += value.total_cost;
		});
		$scope.employee_fee = calc_employee($scope.length * $scope.width, 1, 1, 1);
		$scope.material_cost = total_cost;
		$scope.total_cost = total_cost + $scope.employee_fee;
	}
	/* /Đồng dạng */

	/* Trần nổi */
	get_TNPT_1 = function () {
		var item = $scope.tnpt[0];
		item.quantity = Math.ceil(($scope.length / 1.22 + 1) * ($scope.width / 3.66) * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.tnpt[0] = item;
	}
	get_TNPT_2 = function () {
		var item = $scope.tnpt[1];
		item.quantity = Math.ceil(($scope.length / 0.61) * ($scope.width / 1.22) * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.tnpt[1] = item;
	}
	get_TNPT_3 = function () {
		var item = $scope.tnpt[2];
		item.quantity = Math.ceil(($scope.length / 0.61) * ($scope.width / 1.22) * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.tnpt[2] = item;
	}
	get_TNPT_4 = function () {
		var item = $scope.tnpt[3];
		item.quantity = Math.ceil(($scope.length + $scope.width) * 2 / 3.66 * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.tnpt[3] = item;
	}
	get_TNPT_5 = function () {
		var item = $scope.tnpt[4];
		item.quantity = (Math.round($scope.width / 1.22, 0) + 1) * (Math.round($scope.length / 1.22, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tnpt[4] = item;
	}
	get_TNPT_6 = function () {
		var item = $scope.tnpt[5];
		item.quantity = (Math.round($scope.width / 1.22, 0) + 1) * (Math.round($scope.length / 1.22, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tnpt[5] = item;
	}
	get_TNPT_7 = function () {
		var item = $scope.tnpt[6];
		item.quantity = Math.round(((Math.round($scope.width / 1.22, 0) + 1) * (Math.round($scope.length / 1.22, 0) + 1)) / 3);
		item.total_cost = item.price * item.quantity;
		$scope.tnpt[6] = item;
	}
	get_TNPT_8 = function () {
		var item = $scope.tnpt[7];
		item.quantity = (Math.round($scope.width / 1.22, 0) + 1) * (Math.round($scope.length / 1.22, 0) + 1);
		item.total_cost = item.price * item.quantity;
		$scope.tnpt[7] = item;
	}
	get_TNPT_9 = function () {
		var item = $scope.tnpt[8];
		item.quantity = Math.ceil(($scope.length / 0.61) * ($scope.width / 1.22) * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.tnpt[8] = item;
	}

	var calc_TNPT = function () {
		get_TNPT_1();
		get_TNPT_2();
		get_TNPT_3();
		get_TNPT_4();
		get_TNPT_5();
		get_TNPT_6();
		get_TNPT_7();
		get_TNPT_8();
		get_TNPT_9();
		var total_cost = 0;
		angular.forEach($scope.tnpt, function (value, key) {
			total_cost += value.total_cost;
		});
		$scope.employee_fee = calc_employee($scope.length * $scope.width, 1, 1, 1);
		$scope.material_cost = total_cost;
		$scope.total_cost = total_cost + $scope.employee_fee;
	}
	/* Trần nổi */

	/* Vách */
	get_VC_1 = function () {
		var item = $scope.vc[0];
		item.quantity = Math.ceil(($scope.length / 0.61 + 1) * $scope.width / 3 * 1.05);
		item.total_cost = item.price * item.quantity;
		$scope.vc[0] = item;
	}
	get_VC_2 = function () {
		var item = $scope.vc[1];
		item.quantity = Math.ceil(($scope.width / 1.2 + 1) * $scope.length / 3 * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.vc[1] = item;
	}
	get_VC_3 = function () {
		var item = $scope.vc[2];
		item.quantity = Math.ceil(($scope.length / 0.6 + 1) * 2);
		item.total_cost = item.price * item.quantity;
		$scope.vc[2] = item;
	}
	get_VC_4 = function () {
		var item = $scope.vc[3];
		item.quantity = Math.round($scope.length * $scope.width / (1.22 * 1.8) * 1.05) * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vc[3] = item;
	}
	get_VC_5 = function () {
		var item = $scope.vc[4];
		item.quantity = $scope.length * $scope.width;
		item.total_cost = item.price * item.quantity;
		$scope.vc[4] = item;
	}
	get_VC_6 = function () {
		var item = $scope.vc[5];
		item.quantity = ($scope.length * $scope.width) / 100 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vc[5] = item;
	}
	get_VC_7 = function () {
		var item = $scope.vc[6];
		item.quantity = ($scope.length * $scope.width) / 60 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vc[6] = item;
	}
	get_VC_8 = function () {
		var item = $scope.vc[7];
		item.quantity = ($scope.length * $scope.width) / 100 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vc[7] = item;
	}
	get_VC_9 = function () {
		var item = $scope.vc[8];
		item.quantity = Math.round(($scope.length + $scope.width) * 2 / 4);
		item.total_cost = item.price * item.quantity;
		$scope.vc[8] = item;
	}

	var calc_VC = function () {
		get_VC_1();
		get_VC_2();
		get_VC_3();
		get_VC_4();
		get_VC_5();
		get_VC_6();
		get_VC_7();
		get_VC_8();
		get_VC_9();
		var total_cost = 0;
		angular.forEach($scope.vc, function (value, key) {
			total_cost += value.total_cost;
		});
		$scope.employee_fee = calc_employee($scope.length * $scope.width, 1, 1, 1);
		$scope.material_cost = total_cost;
		$scope.total_cost = total_cost + $scope.employee_fee;
	}

	get_VCC1_1 = function () {
		var item = $scope.vcc1[0];
		item.quantity = Math.ceil(($scope.length / 0.61 + 1) * $scope.width / 3 * 1.05);
		item.total_cost = item.price * item.quantity;
		$scope.vcc1[0] = item;
	}
	get_VCC1_2 = function () {
		var item = $scope.vcc1[1];
		item.quantity = Math.ceil(($scope.width / 1.2 + 1) * $scope.length / 3 * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.vcc1[1] = item;
	}
	get_VCC1_3 = function () {
		var item = $scope.vcc1[2];
		item.quantity = Math.ceil(($scope.length / 0.6 + 1) * 2);
		item.total_cost = item.price * item.quantity;
		$scope.vcc1[2] = item;
	}
	get_VCC1_4 = function () {
		var item = $scope.vcc1[3];
		item.quantity = Math.round($scope.length * $scope.width / (1.22 * 1.8) * 1.05) * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vcc1[3] = item;
	}
	get_VCC1_5 = function () {
		var item = $scope.vcc1[4];
		item.quantity = $scope.length * $scope.width;
		item.total_cost = item.price * item.quantity;
		$scope.vcc1[4] = item;
	}
	get_VCC1_6 = function () {
		var item = $scope.vcc1[5];
		item.quantity = ($scope.length * $scope.width) / 100 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vcc1[5] = item;
	}
	get_VCC1_7 = function () {
		var item = $scope.vcc1[6];
		item.quantity = ($scope.length * $scope.width) / 60 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vcc1[6] = item;
	}
	get_VCC1_8 = function () {
		var item = $scope.vcc1[7];
		item.quantity = ($scope.length * $scope.width) / 100 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vcc1[7] = item;
	}
	get_VCC1_9 = function () {
		var item = $scope.vcc1[8];
		item.quantity = Math.round(($scope.length + $scope.width) * 2 / 3);
		item.total_cost = item.price * item.quantity;
		$scope.vcc1[8] = item;
	}

	var calc_VCC1 = function () {
		get_VCC1_1();
		get_VCC1_2();
		get_VCC1_3();
		get_VCC1_4();
		get_VCC1_5();
		get_VCC1_6();
		get_VCC1_7();
		get_VCC1_8();
		get_VCC1_9();
		var total_cost = 0;
		angular.forEach($scope.vcc1, function (value, key) {
			total_cost += value.total_cost;
		});
		$scope.employee_fee = calc_employee($scope.length * $scope.width, 1, 1, 1);
		$scope.material_cost = total_cost;
		$scope.total_cost = total_cost + $scope.employee_fee;
	}

	get_VCC2_1 = function () {
		var item = $scope.vcc2[0];
		item.quantity = Math.ceil(($scope.length / 0.61 + 1) * $scope.width / 3 * 1.05);
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[0] = item;
	}
	get_VCC2_2 = function () {
		var item = $scope.vcc2[1];
		item.quantity = Math.ceil(($scope.width / 1.2 + 1) * $scope.length / 3 * 1.03);
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[1] = item;
	}
	get_VCC2_3 = function () {
		var item = $scope.vcc2[2];
		item.quantity = Math.ceil(($scope.length / 0.6 + 1) * 2);
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[2] = item;
	}
	get_VCC2_4 = function () {
		var item = $scope.vcc2[3];
		item.quantity = Math.round($scope.length * $scope.width / (1.22 * 1.8) * 1.05) * 4;
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[3] = item;
	}
	get_VCC2_5 = function () {
		var item = $scope.vcc2[4];
		item.quantity = $scope.length * $scope.width;
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[4] = item;
	}
	get_VCC2_6 = function () {
		var item = $scope.vcc2[5];
		item.quantity = ($scope.length * $scope.width) / 100 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[5] = item;
	}
	get_VCC2_7 = function () {
		var item = $scope.vcc2[6];
		item.quantity = ($scope.length * $scope.width) / 100 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[6] = item;
	}
	get_VCC2_8 = function () {
		var item = $scope.vcc2[7];
		item.quantity = ($scope.length * $scope.width) / 60 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[7] = item;
	}
	get_VCC2_9 = function () {
		var item = $scope.vcc2[8];
		item.quantity = ($scope.length * $scope.width) / 100 * 2;
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[8] = item;
	}
	get_VCC2_10 = function () {
		var item = $scope.vcc2[9];
		item.quantity = Math.round(($scope.length + $scope.width) * 2 / 2);
		item.total_cost = item.price * item.quantity;
		$scope.vcc2[9] = item;
	}

	var calc_VCC2 = function () {
		get_VCC2_1();
		get_VCC2_2();
		get_VCC2_3();
		get_VCC2_4();
		get_VCC2_5();
		get_VCC2_6();
		get_VCC2_7();
		get_VCC2_8();
		get_VCC2_9();
		get_VCC2_10();
		var total_cost = 0;
		angular.forEach($scope.vcc2, function (value, key) {
			total_cost += value.total_cost;
		});
		$scope.employee_fee = calc_employee($scope.length * $scope.width, 1, 1, 1);
		$scope.material_cost = total_cost;
		$scope.total_cost = total_cost + $scope.employee_fee;
	}

	var calc_employee = function (a, b, c, d) {
		return a * (20000 * b + 15000 * c + 25000 * d);
	}

	setTimeout(function () {
		if ($scope.width != 0 && $scope.length != 0) {
			$('.btn-submit').click();
		}

		if ($scope.area != 0) {
			$scope.setSize();
			$('.btn-submit').click();
		}
	}, 1000);
};
var app = angular.module("ZeitApp", []);
app.controller('calculator', ["$scope", "$http", estimationCalculator]).run();