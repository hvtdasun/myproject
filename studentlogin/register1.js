function focusi() {
    document.getElementById("userfname").focus();
}
function validate() {
    let val1 = document.getElementById("userfname").value;
    let val2 = document.getElementById("userid").value;
    let val3 = document.getElementById("userpassword").value;
    let val4 = document.getElementById("stgender").value;
    if(val1 == "" ||val2 == "" ||val3 == "" ||val4 == "" ){
        ans = "<p style = 'color:lightred;'> Please fill the form </p>"
        document.getElementById("answer").innerHTML=ans;
        return false;
    }
    else{
        ans = "<p style = 'color:green;'>Success...</p>"
        document.getElementById("answer").innerHTML=ans;
        return true;
    }
}