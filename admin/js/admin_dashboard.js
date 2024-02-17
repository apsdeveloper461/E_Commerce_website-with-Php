const adminMenu=document.getElementById('admin_menu');
const slider=document.getElementById('slider')
//see media query slider not work if width is greater then 900px
const media = matchMedia("(max-width:900px)");
if(media.matches){
    slider.style.visibility="hidden";
}

adminMenu.onclick=()=>{
    if(media.matches){
        if(adminMenu.classList=="admin_logo"){
            slider.style.visibility="hidden";
            adminMenu.classList="";
        }
        else{
            adminMenu.setAttribute("class","admin_logo");
            slider.style.visibility="visible";
        }

    }
}

// $('#add_cat').click(function(){
//     $('#cat_model').modal('show');
// })


// // const addCat=document.getElementById('add_cat');
// // addCat.onclick=()=>{
// //     document.getElementById('cat_model').ariaModal('show');
// // }
