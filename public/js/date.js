$.validator.addMethod("date", function(value,element){
    if(value.length!=10) return false;
    // verificando data
    var data       = value;
    var day         = data.substr(0,2);
    var bar1   = data.substr(2,1);
    var month        = data.substr(3,2);
    var bar2   = data.substr(5,1);
    var year         = data.substr(6,4);
    if(data.length!=10||bar1!="/"||bar2!="/"||isNaN(day)||isNaN(month)||isNaN(year)||day>31||month>12)return false;
    if((month==4||month==6||month==9||month==11) && day==31)return false;
    if(month==2  &&  (day>29||(day==29 && year%4!=0)))return false;
    if(year < 1900)return false;
    return true;
},"Please enter a valid date");

