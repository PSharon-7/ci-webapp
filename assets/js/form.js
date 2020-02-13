$(document).ready(function(){
    $('#idcard').blur(function () {
        var val = $(this).val();
        if (val != "") {
            isIdCardValid(val);
        }
    });

    var smokehistory = $('#smokehistory :selected').val();
    if (smokehistory == '有') {
        if ($('#smoketime').hasClass('invisible')) {
            $('#smoketime').removeClass('invisible');
        }
    } else if (!$('#smoketime').hasClass('invisible')){
        $('#smoketime').addClass('invisible');
    }

    $('#smokehistory').change(function(){
        var selectedVal = $(this).val();
        if (selectedVal == '有') {
            if ($('#smoketime').hasClass('invisible')) {
                $('#smoketime').removeClass('invisible');
            }
        } else if (!$('#smoketime').hasClass('invisible')){
            $('#smoketime').addClass('invisible');
        }
    });
});

function isIdCardValid(num) { 
    //身份证号码为18位，前17位为数字，最后一位是校验位，可能为数字或字符X。
    num = num.toUpperCase();
    if (!(/(^\d{17}([0-9]|X)$)/.test(num))) {
        document.getElementById('form_validation_errors').innerHTML = '<div class="alert alert-danger">输入的身份证号长度不对，或者号码不符合规定!</div>';
        return false;        
    }

    var len, re; len = num.length; 
    if (len == 18) {
        re = new RegExp(/^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/);
        var arrSplit = num.match(re);  

        //检查生日日期是否正确
        var dtmBirth = new Date(arrSplit[2] + "/" + arrSplit[3] + "/" + arrSplit[4]);
        var bGoodDay = (dtmBirth.getFullYear() == Number(arrSplit[2])) && ((dtmBirth.getMonth() + 1) == Number(arrSplit[3])) && (dtmBirth.getDate() == Number(arrSplit[4]));
        if (!bGoodDay) {
            document.getElementById('form_validation_errors').innerHTML = '<div class="alert alert-danger">输入的身份证号里出生日期不对!</div>';
            return false;
        }
        else {
            // 获取年龄并填写
            var age = getAgeByBD(dtmBirth);
            document.getElementById("age").value = age;

            var valnum;
            var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
            var nTemp = 0, i;
            for(i = 0; i < 17; i ++) {
                nTemp += num.substr(i, 1) * arrInt[i];
            }
            valnum = arrCh[nTemp % 11];
            if (valnum != num.substr(17, 1)) {
                document.getElementById('form_validation_errors').innerHTML = '<div class="alert alert-danger">身份证输入有误, 请再确认一遍</div>';
                return false;
            }

            return true;
        }
    } 
    return false;
}

function getAgeByBD(birthDate) {
    var nowDateTime = new Date();
    var age = nowDateTime.getFullYear() - birthDate.getFullYear();
    if (nowDateTime.getMonth() < birthDate.getMonth() || (nowDateTime.getMonth() == birthDate.getMonth() && nowDateTime.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

