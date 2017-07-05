function ValidateEmail(inputText)
{
    var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(inputText.value.match(mailFormat))
    {
        this.focus();
        return true;
    }
    else
    {
        alert("Valid Email please!");
        this.focus();
        return false;
    }
}

function ValidateForm(){
    var emailID=document.registration_form.emailAddress;

    if ((emailID.value==null)||(emailID.value=="")){
        alert("Please Enter your Email ID")
        emailID.focus()
        return false
    }
    if (ValidateEmail(emailID.value)==false){
        emailID.value=""
        emailID.focus()
        return false
    }
    return true

}