const LogIn_form=document.getElementById('loginForm')
const notifcation=document.getElementById('notifcation');
notifcation.classList.add('d-none');
//on submit 

LogIn_form.onsubmit=(e)=>{
e.preventDefault();
   let xhttp=new XMLHttpRequest();
   xhttp.open("POST",'../DB_action/LOgIN_user.php',true)
   xhttp.onload=()=>{
      let response=xhttp.response;
      console.log(response);
      notifcation.classList.remove('d-none');
      if(response=='success'){
          notifcation.classList.add('bg-success');
        notifcation.innerHTML=`<strong>Successfully ! </strong> Log In to Website`;
        setTimeout(() => {
            window.location.href = '../';
        }, 3000);
    }else{
          notifcation.classList.add('bg-danger');
        notifcation.innerHTML=`<strong>Wrong Credentials !  </strong> Plz try again or Sign Up..`;
       LogIn_form.reset();

      }
      let property=response;

      setTimeout(() => {
        notifcation.classList.add('d-none');
        notifcation.classList.remove('bg-' + property);
      }, 5000);

   }
   let formData=new FormData(LogIn_form);
   xhttp.send(formData);
}