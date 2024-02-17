//we get brand nae according to selected category/////////////////////////////////////////
const category_id = document.getElementById("Category_Id");
category_id.onchange = () => {
    Cat_Id = category_id.value;
    console.log(Cat_Id);
    let xhtp = new XMLHttpRequest();
    xhtp.open("POST", "../admin/action/brandGet_by_catId.php", true);
    xhtp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhtp.onload = () => {
        if (xhtp.status == 200 && xhtp.readyState == 4) {
            let res = xhtp.response;
            res = JSON.parse(res);
            let Brand_option = document.getElementById("Brand_Id");
            Brand_option.innerHTML = `
         <option value="0">- - - -Select a Brand- - - -</option>`;
            res.forEach((element) => {
                Brand_option.innerHTML +=
                    `<option value="` +
                    element.Brand_Id +
                    `">` +
                    element.Brand_Name +
                    `</option>`;
            });
        }
    };
    xhtp.send(`Category_Id=` + Cat_Id);
};


// delete th product ////////////////////////////////////////////////////////
const delete_product_btn = document.querySelectorAll(".Delete_product_record");
delete_product_btn.forEach(element => {
    element.addEventListener('click', (e) => {
        e.preventDefault();
        let Product_id = element.getAttribute("value");
        console.log(Product_id);
        document.getElementById("Product_Id").setAttribute("value", Product_id);
        let deleteConform = confirm('Confirm you want to delete this Product which  --->> Product_Id =' + Product_id);
        if (deleteConform) {

            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "../admin/DB/ProductAdd.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.onload = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    res = xhttp.response;
                    console.log(res);
                    notifcation.style.visibility = "visible";
                    notifcation.classList.add("alert-" + res);
                    if (res == "warning") {
                        notifcation.innerHTML = `<strong> Suceess ! </strong> Delete Product Successfully`;
                    } else {
                        notifcation.innerHTML = `<strong> ${res} ! </strong> Plz try again, Something went happen `;
                    }

                    let property = res;
                    setTimeout(() => {
                        notifcation.classList.remove("alert-" + property);
                        notifcation.style.visibility = "hidden";
                    }, 5000);
                }
            }
            xhttp.send('form_type=delete' + '& Product_Id=' + Product_id);
        }
    });

});






//get notifcation
const notifcation = document.getElementById("notifcation");
notifcation.style.visibility = "hidden";

//when click on add btn
const add_product_btn = document.getElementById("add_product");

add_product_btn.onclick = () => {
    document.getElementById("form_type").setAttribute("value", "add");
};
//Form submit
const ProductFormSubmit = document.getElementById("Product_Form");

ProductFormSubmit.onsubmit = (e) => {
    e.preventDefault();

    console.log('request send');
    if (document.getElementById("Category_Id").value != "0" && document.getElementById("Brand_Id").value != '0') {
        console.log('request send');

        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../admin/DB/ProductAdd.php", true);
        xhttp.onload = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                res = xhttp.response;
                console.log(res);
                notifcation.style.visibility = "visible";
                notifcation.classList.add("alert-" + res);
                if (res == "success") {
                    notifcation.innerHTML = `<strong> Success ! </strong> Add a Product Successfully`;
                } else if (res == "warning") {
                    notifcation.innerHTML = `<strong> Suceess ! </strong> Delete Product Successfully`;
                } else if (res == "info") {
                    notifcation.innerHTML = `<strong> Update ! </strong> Product update successfully `;
                } else {
                    notifcation.innerHTML = `<strong> ${res} ! </strong> Plz try again, Something went happen `;
                }
                    console.log('sarting hide');                
                    $('#productModel').modal('hide')
                    console.log('Done hide');                
                let property = res;
                setTimeout(() => {
                    notifcation.classList.remove("alert-" + property);
                    notifcation.style.visibility = "hidden";
                }, 5000);
            }
        }
            let formData = new FormData(ProductFormSubmit);
            console.log(formData);
            xhttp.send(formData);
        }
    }




