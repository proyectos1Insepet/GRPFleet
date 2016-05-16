var $ = function(id) {
	return document.getElementById(id);
};

var calculadora = function () {
	var dia =  parseFloat($("dia").value);
        var semana = parseFloat($("semana").value);
        var mes =  parseFloat($("mes").value);
	var vol =  parseFloat($("vol").value);        
        var din =  parseFloat($("din").value);
	
	//$("dia").value = "";
	//$("semana").value = "";
        //$("mes").value = "";
        //$("vol").value = "";
	//$("din").value = "";
        
    if (din === 0 || isNaN(din)){
	if (isNaN(vol) || vol < 0 ) {
		alert ("Please put a number greater than zero");
	} else if (isNaN(dia) || dia < 0) {
		alert ("Please put a number greater than zero");
	}else if (isNaN(semana) || semana < 0) {
		alert ("Please put a number greater than zero");
	}else if (isNaN(mes) || mes < 0) {
		alert ("Please put a number greater than zero");
	}else if (dia > semana || dia > mes) {
		alert ("Please put a valid day number. V");
	}else if (semana > mes) {
		alert ("Please put a valid week number. V");
	}else {
            var cal_vol_mon  = vol/ mes;
            var cal_vol_week = cal_vol_mon/semana;
            var cal_vol_day  = cal_vol_week/dia;
	    cal_vol_week = parseFloat(cal_vol_week.toFixed(2));
            cal_vol_mon = parseFloat(cal_vol_mon.toFixed(2));
            cal_vol_day = parseFloat(cal_vol_day.toFixed(2));
	    $("cal_vol_day").value = cal_vol_day;
            $("cal_vol_week").value = cal_vol_week;
            $("cal_vol_mon").value = cal_vol_mon;
	}
    }
    else if (vol === 0 || isNaN(vol) ){
	if (isNaN(din) || din < 0 ) {
		alert ("Please put a number greater than zero");
	} else if (isNaN(dia) || dia < 0) {
		alert ("Please put a number greater than zero");
	}else if (isNaN(semana) || semana < 0) {
		alert ("Please put a number greater than zero");
	}else if (isNaN(mes) || mes < 0) {
		alert ("Please put a number greater than zero");
	}else if (dia > semana || dia > mes) {
		alert ("Please put a valid visit number 1");
	}else if (semana > mes) {
		alert ("Please put a valid visit number 2");
	}else {
            var cal_din_mon  = din/ mes;
            var cal_din_week = cal_din_mon/semana;
            var cal_din_day  = cal_din_week/dia;
	    cal_din_week = parseFloat(cal_din_week.toFixed(2));
            cal_din_mon = parseFloat(cal_din_mon.toFixed(2));
            cal_din_day = parseFloat(cal_din_day.toFixed(2));
	    $("cal_din_day").value = cal_din_day;
            $("cal_din_week").value = cal_din_week;
            $("cal_din_mon").value = cal_din_mon;
	}
    }else if( din !== 0 && vol !== 0 ){
        
        if (isNaN(din) || din < 0 || isNaN(vol) || vol < 0) {
		alert ("Please put a number greater than zero");
	} else if (isNaN(dia) || dia < 0) {
		alert ("Please put a number greater than zero");
	}else if (isNaN(semana) || semana < 0) {
		alert ("Please put a number greater than zero");
	}else if (isNaN(mes) || mes < 0) {
		alert ("Please put a number greater than zero");
	}else if (dia > semana || dia > mes) {
		alert ("Please put a valid visit number 3");
	}else if (semana > mes) {
		alert ("Please put a valid visit number 4");
	}else {
            var cal_din_mon  = din/ mes;
            var cal_din_week = cal_din_mon/semana;
            var cal_din_day  = cal_din_week/dia;
            var cal_vol_mon  = vol/ mes;
            var cal_vol_week = cal_vol_mon/semana;
            var cal_vol_day  = cal_vol_week/dia;
	    cal_din_week = parseFloat(cal_din_week.toFixed(2));
            cal_din_mon = parseFloat(cal_din_mon.toFixed(2));
            cal_din_day = parseFloat(cal_din_day.toFixed(2));
            cal_vol_week = parseFloat(cal_vol_week.toFixed(2));
            cal_vol_mon = parseFloat(cal_vol_mon.toFixed(2));
            cal_vol_day = parseFloat(cal_vol_day.toFixed(2));
	    $("cal_din_day").value = cal_din_day;
            $("cal_din_week").value = cal_din_week;
            $("cal_din_mon").value = cal_din_mon;
            $("cal_vol_day").value = cal_vol_day;
            $("cal_vol_week").value = cal_vol_week;
            $("cal_vol_mon").value = cal_vol_mon;
	}
        
        
    }
};

window.onload = function () {
	$("calcular").onclick = calculadora;
};

