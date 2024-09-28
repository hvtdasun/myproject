function focusi(){
    document.getElementById("stuid").focus();
    document.getElementById("stdate").value= "2000-10-20";
}
function validate(){
    let val1 = document.getElementById("stuid").value;
    let val2 = document.getElementById("stuname").value;
    let val3 = document.getElementById("stgender").value;
    let val4 = document.getElementById("staddress").value;
    let val5 = document.getElementById("stdate").value;
    if(val1==""||val2==""||val3==""||val4==""||val5==""){
        ans = "<p style = 'color:lightred;'> Please fill the form </p>"
        document.getElementById("answer").innerHTML=ans;
        return false;
    }
    else if(val1.length != 10){
        ans = "Invalid Nic number "
        ans = ans + "<p style = 'color:red;'> check the number </p>"
        document.getElementById("answer").innerHTML=ans;
        return false;
    }
    else if (isNaN(val1.substr(0,9))){
        ans = "Invalid Nic number "
        ans = ans + "<p style = 'color:red;'> check the you entered number or string </p>"
        document.getElementById("answer").innerHTML=ans;
        return false;
    }
    else if ((val1.substr(9,1)!="v") && (val1.substr(9,1)!="V")){
        ans = "Invalid Nic number "
        ans = ans + "<p style = 'color:red;'> check the last chracter </p>"
        document.getElementById("answer").innerHTML=ans;
        return false;
    }
    else{
        ans = "<p style = 'color:green;'>good </p>"
        document.getElementById("answer").innerHTML=ans;
        return true;
    }
    
}
