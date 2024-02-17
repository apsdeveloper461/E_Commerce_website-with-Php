const add_brand_btn = document.getElementById("add_brand");
const delete_brand_btn = document.querySelectorAll(".Delete_brand_record");
const edit_brand_btn = document.querySelectorAll(".Edit_brand_record");
// const edit_brand_btn=document.getElementById('')
//get notifcation
const notifcation = document.getElementById("notifcation");
notifcation.style.visibility = "hidden";


//when click on add btn
add_brand_btn.onclick= () => {
    document.getElementById("form_type").setAttribute("value", "add");
};
//handle delete button and get Information of current click btn record

delete_brand_btn.forEach((delete_btn) => {
    delete_btn.addEventListener("click", () => {
        document.getElementById("form_type").setAttribute("value", "delete");
        let brand_id = delete_btn.getAttribute("value");
        // console.log(brand_id);
        document.getElementById("brand_Id").setAttribute("value", brand_id);
        //send an xml and ajax request to get brand information at brand id
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../admin/action/brand_recordGet.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.onload = () => {
            if (xhttp.status == 200 && xhttp.readyState == 4) {
                let res = xhttp.response;
                res = JSON.parse(res);
                console.log(res);
                document
                .getElementById("brand_name")
                .setAttribute("value", res.Brand_Name);
                document.querySelector("#Category_Id").value=res.Category_Id;
            }
        };
        xhttp.send(`brand_Id=` + brand_id);
    });
});
//handle edit button and get Information of current click btn record
edit_brand_btn.forEach((delete_btn) => {
    delete_btn.addEventListener("click", () => {
        document.getElementById("form_type").setAttribute("value", "edit");
        let brand_id = delete_btn.getAttribute("id");
        console.log(brand_id);
        document.getElementById("brand_Id").setAttribute("value", brand_id);
        //send an xml and ajax request to get brand information at brand id
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../admin/action/brand_recordGet.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.onload = () => {
            if (xhttp.status == 200 && xhttp.readyState == 4) {
                let res = xhttp.response;
                res = JSON.parse(res);
                console.log(res);
                document
                    .getElementById("brand_name")
                    .setAttribute("value", res.Brand_Name);

                if(( document.querySelector("#Category_Id").value=res.Category_Id)){
                    if(!(document.querySelector("#Category_Id").value)){
                        document.querySelector("#Category_Id").value=0;
                    }
                }
            }
        };
        xhttp.send(`brand_Id=` + brand_id);
    });
});

//get form id
const BrandForm = document.getElementById("Brand_Form");
//on Submit
BrandForm.onsubmit = (e) => {
    e.preventDefault();
    
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../admin/DB/BrandAdd.php");
    xhttp.onload = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            res = xhttp.response;
            notifcation.style.visibility = "visible";
            notifcation.classList.add("alert-" + res);
            if (res == "success") {
                notifcation.innerHTML = `<strong> Success ! </strong> Add a brand Successfully`;
            } else if (res == "warning") {
                notifcation.innerHTML = `<strong> Warning ! </strong> Plz fill all feild and add brand `;
            } else if (res == "primary") {
                notifcation.innerHTML = `<strong> Suceess ! </strong> Delete brand Successfully`;
            } else if (res == "info") {
                notifcation.innerHTML = `<strong> Update ! </strong> Brand update successfully `;
            } else {
                notifcation.innerHTML = `<strong> ${res} ! </strong> Plz try again, Something went happen `;
            }
            
            let property = res;
            setTimeout(() => {
                notifcation.classList.remove("alert-" + property);
                notifcation.style.visibility = "hidden";
            }, 5000);
        }
    };
    let formData = new FormData(BrandForm);
    console.log(formData);
    xhttp.send(formData);
};
