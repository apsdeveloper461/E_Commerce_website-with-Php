const CategoryAddForm = document.getElementById("category_Add");
console.log(CategoryAddForm);
const notifcation = document.getElementById("notifcation");
notifcation.style.visibility = "hidden";
const add_cat = document.getElementById("add_cat");
const btn_submit_form = document.getElementById("submit");
add_cat.onclick = () => {
    document.getElementById('catTitle').innerHTML="Add a Category";
    console.log("12345");
    if(btn_submit_form.hasAttribute('class','btn-warning')){
    btn_submit_form.classList.remove("btn-warning");
    }
    if(btn_submit_form.hasAttribute('class','btn-danger')){
        btn_submit_form.classList.remove("btn-danger");
    }
    btn_submit_form.classList.add("btn-primary");
    btn_submit_form.innerText = "Add";
    document.getElementById('form_type').setAttribute('value','add');
};
//AJAX to handle a post request to add category

CategoryAddForm.onsubmit = (e) => {
    notifcation.style.visibility = "hidden";
        console.log('adding a new categories');
        e.preventDefault();
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../admin/DB/CategoryAdd.php", true);
        xhttp.onload = () => {
            console.log("hi");
            //when Ajax is loaded
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                let response = xhttp.response;
                // notifcation.setAttribute('class',"alert-"+response);
                //show notifcation on the base of response
                notifcation.style.visibility = "visible";
                notifcation.classList.add("alert-" + response);
                if (response == "success") {
                    notifcation.innerHTML = `<strong>${response} ! </strong> Add a new category..`;
                } else if (response == "warning") {
                    notifcation.innerHTML = `<strong>${response} ! </strong> empty input is not allow `;
                }else if(response == "info"){
                    
                    notifcation.innerHTML = `<strong>Success ! </strong> Update category Successfully`;
                }else if(response == "primary") { 
                    // notifcation.classList.remove("alert-" + response);
                    notifcation.innerHTML = `<strong>Success ! </strong> Delete category Successfully`;

                }else{
                    console.log(response);
                    notifcation.innerHTML = `<strong>${response} ! </strong> Something went wrong. Plz Try Again !`;
                }
                let r = response;
                $("#catModel").modal("hide");
                setTimeout(() => {
                    notifcation.classList.remove("alert-" + r);
                    notifcation.style.visibility = "hidden";
                }, 5000);
                console.log(response);
            }
            //hide notifcation after 5 sec
        };
        //all form data send to php
        let formData = new FormData(CategoryAddForm);
        xhttp.send(formData);
    
};

