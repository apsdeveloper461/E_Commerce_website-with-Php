//when click on change Password btn we add a form to change Password

const change_Pass_Btn = document.getElementById("ChangePasswordBtn");

change_Pass_Btn.onclick = () => {
    console.log("Show");
    document.getElementById("ChangePasswordForm").classList.remove("d-none");
    document.getElementById("accountDetail").classList.add("d-none");
};

//notifcation to alert password change Successfully
const ChangePass=document.getElementById('ChangePasswordForm')
const notifcation=document.getElementById('notifcation');
notifcation.classList.add('d-none');
//on submit 

ChangePass.onsubmit=(e)=>{
e.preventDefault();
let pass=document.getElementById('NewPassword')
let cpass=document.getElementById('ConfirmPassword')
if(pass.value!=cpass.value){
   document.getElementById('error').innerText=`Confirm password must be match with Password`;
   cpass.value='';
}else{
    document.getElementById('error').innerText=``;
   let xhttp=new XMLHttpRequest();
   xhttp.open("POST",'./DB_action/ChangePass.php',true)
   xhttp.onload=()=>{
      let response=xhttp.response;
      console.log(response);
      notifcation.classList.remove('d-none');
      notifcation.classList.add('bg-'+response);
      if(response=='success'){
        notifcation.innerHTML=`<strong>Successfully ! </strong> Change Password `;
        setTimeout(() => {
            window.location.href = './myaccount.php';
        }, 1000);
    }else{
        notifcation.innerHTML=`<strong>Sorry ! </strong> Something went wrong. Plz try again`;

      }
      let property=response;

      setTimeout(() => {
        notifcation.classList.add('d-none');
        notifcation.classList.remove('bg-' + property);
      }, 5000);

   }
   let formData=new FormData(ChangePass);
   xhttp.send(formData);
}
}