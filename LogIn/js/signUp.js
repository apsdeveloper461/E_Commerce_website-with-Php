const SignUp_form=document.getElementById('signUpForm')
const notifcation=document.getElementById('notifcation');
notifcation.classList.add('d-none');
//on submit 

SignUp_form.onsubmit=(e)=>{
e.preventDefault();
let pass=document.getElementById('password')
let cpass=document.getElementById('cpassword')
if(pass.value!=cpass.value){
   document.getElementById('error').innerText=`Confirm password must be match with Password`;
   cpass.value='';
}else{
    document.getElementById('error').innerText=``;
   let xhttp=new XMLHttpRequest();
   xhttp.open("POST",'../DB_action/signUp_user.php',true)
   xhttp.onload=()=>{
      let response=xhttp.response;
      console.log(response);
      notifcation.classList.remove('d-none');
      notifcation.classList.add('bg-'+response);
      if(response=='success'){
        notifcation.innerHTML=`<strong>Successfully ! </strong> Sign Up.  --> plz log in now`;
        setTimeout(() => {
            window.location.href = './logIn.php';
        }, 1000);
    }else if(response=='warning'){
        notifcation.innerHTML=`<strong>Warning ! </strong>This Email is already register Plz log In`;    
        setTimeout(() => {
            window.location.href = './logIn.php';
        }, 3000);
    }else{
        notifcation.innerHTML=`<strong>Sorry ! </strong> Something went wrong .Plz try again or Sign Up..`;

      }
      let property=response;

      setTimeout(() => {
        notifcation.classList.add('d-none');
        notifcation.classList.remove('bg-' + property);
      }, 5000);

   }
   let formData=new FormData(SignUp_form);
   xhttp.send(formData);
}
}