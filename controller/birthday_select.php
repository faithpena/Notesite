<?php

	function birthdate_select($user=False) {
		$birthdate = array();
		$birthdate[] = '<div class="col-md-5"><select class="form-control" name="month" style="width:8em">';

		for($i = 1; $i <= 12; $i++) {
			if (!$user) {
				$birthdate[] = '<option value=' . date('F', mktime(0, 0, 0, $i, 1)) . '>' . date('F', mktime(0, 0, 0, $i, 1)) . '</option>';
			}
			else {
				if (date('F', mktime(0, 0, 0, $i, 1)) == date('F', strtotime($user->birthdate))) {
					$birthdate[] = '<option value=' . date('F', mktime(0, 0, 0, $i, 1)) . ' selected>' . date('F', mktime(0, 0, 0, $i, 1)) . '</option>';
				}
				else {
					$birthdate[] = '<option value=' . date('F', mktime(0, 0, 0, $i, 1)) . '>' . date('F', mktime(0, 0, 0, $i, 1)) . '</option>';
				}
			}
			
		}

		$birthdate[] = '</select></div><div class="col-md-3"><select class="form-control" name="day" style="width:4.75em">';

		for($i = 1; $i <= 31; $i++) {
			if (!$user) {
				$birthdate[] = '<option value=' . $i . '>' . $i . '</option>';
			}
			else {
				if ($i == date('d', strtotime($user->birthdate))) {
					$birthdate[] = '<option value=' . $i . ' selected>' . $i . '</option>';
				}
				else {
					$birthdate[] = '<option value=' . $i . '>' . $i . '</option>';
				}
			}
		}

		$birthdate[] = '</select></div><div class="col-md-4"><select class="form-control" name="year" style="width:5.75em">';

		for($i = 2016; $i >= 1990; $i--) {
			if (!$user) {
				$birthdate[] = '<option value=' . $i . '>' . $i . '</option>';
			}
			else {
				if ($i == date('Y', strtotime($user->birthdate))) {
					$birthdate[] = '<option value=' . $i . ' selected>' . $i . '</option>';
				}
				else {
					$birthdate[] = '<option value=' . $i . '>' . $i . '</option>';
				}
			}
		}

		$birthdate[] = '</select></div>';

		return join('', $birthdate);
	}

?>