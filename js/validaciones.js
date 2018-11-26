function soloEnteros(e) {
    var keynum;
    if (window.vent)
        keynum = e.keyCode;
    else if (e.which)
        keynum = e.which;
    if ((keynum >= 48 && keynum <= 57 || keynum === 8)|| (keynum === 13)){
        return true;
    }else{
        return false;
    }
}
function letras(e) {
    var letra;
    if (window.vent)
        letra = e.keyCode;
    else if (e.which)
        letra = e.which;
    if ((letra >= 65 && letra <= 90) || (letra === 8) || (letra === 13) || (letra >= 97 && letra <= 122) || (letra === 32)){
        return true;
    }else{
        return false;
    }
}
function letnum(e) {
    var letra;
    if (window.vent)
        letra = e.keyCode;
    else if (e.which)
        letra = e.which;
    if ((letra >= 48 && letra <= 57) || (letra === 8) || (letra === 13) || (letra >= 65 && letra <= 90) || (letra === 8) || (letra >= 97 && letra <= 122)){
        return true;
    }else{
        return false;
    }
}
function letnumespacio(e) {
    var letra;
    if (window.vent)
        letra = e.keyCode;
    else if (e.which)
        letra = e.which;
    if ((letra >= 48 && letra <= 57) || (letra === 8) || (letra === 13) || (letra >= 65 && letra <= 90) || (letra === 32) || (letra >= 97 && letra <= 122)) {
        return true;
    }
    else {

        return false;
    }
}
function calleV(e) {
    var letra;
    if (window.vent)
        letra = e.keyCode;
    else if (e.which)
        letra = e.which;
    if ((letra >= 48 && letra <= 57) || (letra === 8) || (letra === 13) || (letra === 46) || (letra >= 65 && letra <= 90) || (letra >= 97 && letra <= 122) || (letra === 32) || (letra === 95) || (letra === 45)) {
        return true;
    } else {
        return false;
    }
}
function correo(e) {
    var letra;
    if (window.vent)
        letra = e.keyCode;
    else if (e.which)
        letra = e.which;
    if ((letra >= 48 && letra <= 57) || (letra === 8)
            || (letra >= 64 && letra <= 90)
            || (letra >= 97 && letra <= 122)
            || (letra === 164)
            || (letra === 39)
            || (letra === 35)
            || (letra === 33)
            || (letra === 95)
            || (letra === 42)
            || (letra === 126)
            || (letra === 45)
            || (letra === 92)
            || (letra === 13)
            || (letra === 39)
            || (letra === 46)) {
        span();
        return true;

    }
    else {
        return false;

    }
}