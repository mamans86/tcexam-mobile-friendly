<?php
//============================================================+
// File name   : tce_functions_statistics.php
// Begin       : 2008-12-25
// Last Update : 2010-02-17
//
// Description : Functions to calculate descriptive statistics.
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//
// License:
//    Copyright (C) 2004-2010 Nicola Asuni - Tecnick.com LTD
//
//    This program is free software: you can redistribute it and/or modify
//    it under the terms of the GNU Affero General Public License as
//    published by the Free Software Foundation, either version 3 of the
//    License, or (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU Affero General Public License for more details.
//
//    You should have received a copy of the GNU Affero General Public License
//    along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
//    Additionally, you can't remove, move or hide the original TCExam logo,
//    copyrights statements and links to Tecnick.com and TCExam websites.
//
//    See LICENSE.TXT file for more information.
//============================================================+

/**
 * @file
 * Functions to calculate descriptive statistics.
 * @package com.tecnick.tcexam.admin
 * @author Nicola Asuni
 * @since 2008-12-25
 */

/**
 * Return an array containing descriptive statistics for the bidimensional input array.
 * @author Nicola Asuni
 * @since 2008-12-25
 * @param $data (array) input data as bidimesional array. The first dimension is a set of data, the second contains data.
 * @return array of statistical results. The keys of the input data are peserved.
 */
function F_getArrayStatistics($data) {
	$stats = array();
	$stats['number'] = array(); // number of items
	$stats['sum'] = array(); // sum of all elements
	$stats['mean'] = array(); // mean or average value
	$stats['median'] = array(); // median
	$stats['mode'] = array(); // mode
	$stats['minimum'] = array(); // minimum value
	$stats['maximum'] = array(); // maximum value
	$stats['range'] = array(); // range
	$stats['variance'] = array(); // variance
	$stats['standard_deviation'] = array(); // standard deviation
	$stats['skewness'] = array(); // skewness
	$stats['kurtosi'] = array(); // kurtosi
	foreach ($data as $set => $dataset) {
		sort($dataset);
		$stats['number'][$set] = 0;
		$stats['minimum'][$set] = $dataset[0];
		$stats['sum'][$set] = 0;
		$datastr = array();
		foreach ($dataset as $num => $value) {
			$stats['number'][$set]++;
			$stats['sum'][$set] += $value;
			$datastr[] = ''.$value.''; // convert value to string
		}
		if ($stats['number'][$set] > 0) {
			$stats['maximum'][$set] = $dataset[($stats['number'][$set] - 1)];
			$stats['range'][$set] = $stats['maximum'][$set] - $stats['minimum'][$set];
			$stats['mean'][$set] = $stats['sum'][$set] / $stats['number'][$set];
			if (($stats['number'][$set] % 2) == 0) {
				$stats['median'][$set] = ($dataset[($stats['number'][$set] / 2)] + $dataset[(($stats['number'][$set] / 2) - 1)]) / 2 ;
			} else {
				$stats['median'][$set] = $dataset[(($stats['number'][$set] - 1) / 2)];
			}
			$freq = array_count_values($datastr);
			arsort($freq, SORT_NUMERIC);
			$freq = array_keys($freq);
			$stats['mode'][$set] = floatval($freq[0]);
			$dev = 0;
			foreach ($dataset as $num => $value) {
				// deviance
				$dev += pow(($value - $stats['mean'][$set]), 2);
			}
			$stats['variance'][$set] = $dev / $stats['number'][$set];
			$stats['standard_deviation'][$set] = sqrt($stats['variance'][$set]);
			$stats['skewness'][$set] = 0;
			$stats['kurtosi'][$set] = 0;
			if ($stats['standard_deviation'][$set] != 0) {
				foreach ($dataset as $num => $value) {
					$tmpval = (($value - $stats['mean'][$set]) / $stats['standard_deviation'][$set]);
					$stats['skewness'][$set] += pow($tmpval, 3);
					$stats['kurtosi'][$set] += pow($tmpval, 4);
				}
				$stats['skewness'][$set] /= $stats['number'][$set];
				$stats['kurtosi'][$set] /= $stats['number'][$set];
			}
		}
	}
	return $stats;
}

//============================================================+
// END OF FILE
//============================================================+
