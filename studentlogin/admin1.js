function focusi(){
    document.getElementById("adfname").focus();
}
function validate(){
    let val1 = document.getElementById("adfname").value;
    let val2 = document.getElementById("adid").value;
    let val3 = document.getElementById("adps").value;
    let val4 = document.getElementById("stgender").value;
    if(val1==""||val2==""||val3==""||val4==""||val5==""){
        ans = "<p style = 'color:lightred;'> Please fill the form </p>"
        document.getElementById("answer").innerHTML=ans;
        return false;
    }else{
        ans = "<p style = 'color:green;'>good </p>"
        document.getElementById("answer").innerHTML=ans;
        return true;
    }
}