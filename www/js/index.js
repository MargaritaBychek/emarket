/*Add brand*/
function validate_brand(f)
{
    if(f.brand.value=="")
    {
        alert("Insert Brand name");
        return false;
    }
    return true;
}
function agreement()
{
    if(document.add_brand.agree.checked==true)
    {
        document.add_brand.submit_btn.disabled=false;
    }else
    {
        document.add_brand.submit_btn.disabled=true;
    }
}

/*Insert Item*/
function validate_item(f)
{
    if(f.itm_name.value=="")// condition for title of the item
    {
        alert("Name cant be emtpy");
        return false;
    }
    if(f.itm_desc.value=="")// condition for title of the item
    {
        alert("Descryption cant be emtpy");
        return false;
    }
    var today = new Date();
    var year = today.getFullYear();

    if(isNaN(f.itm_time.value)==true || f.itm_time.value==""||f.itm_time.value<2000 || f.itm_time.value>year)//condition for time period
    {
        f.itm_time.value=="";
        alert("Invlid time period");
        return false;
    }

    if(f.itm_price.value=="" || isNaN(f.itm_price.value)==true)//condition for price
    {
        f.itm_price.value="";
        alert("Invalid price");
        return false;
    }

    return true;
}


/*function for validation*/
function validate_registration(f)
{
    if(f.user_login.value=="" || f.user_login.value<3)//condition for first name
    {
        f.user_login.value=="";
        alert("Invalid Username");
        return false;
    }

    /*Condition for email address */
    mail=f.email.value;
    a=mail.indexOf('@',0);
    b=mail.indexOf('.',0);
    if(f.email.value=="" || a==-1 || b==-1 || (b-a)<2)
    {
        f.email.value="";
        alert("Invalid email address");
        return false;
    }

    if(f.usr_pass.value=="" || f.usr_pass.value<3)// condition for password
    {
        f.usr_pass.value=="";
        alert("Password length should be at least 3 characters");
        return false;
    }

    if(f.c_pass.value!=f.usr_pass.value)// condition for confirm password
    {
        f.c_pass.value=="";
        alert("Password and confirm password dont match");
        return false;
    }

    return true;
}

/*Search*/
function validate_search(f)
{
    if(f.srch_name.value=="")// condition for title of the search item
    {
        alert("Search item cant be emtpy");
        return false;
    }

    if(f.srch_brand.selectedIndex==0)// condition will brand
    {
        f.srch_brand.selectedIndex=0;
        alert("Please choose a brand");
        return false;
    }

    if(f.srch_price_min.value=="" || isNaN(f.srch_price_min.value)==true)//condition for minimum price
    {
        f.srch_price_min.value="";
        alert("Invalid minimum price");
        return false;
    }

    if(f.srch_price_max.value=="" || isNaN(f.srch_price_max.value)==true)//condition for  maximum price
    {
        f.srch_price_max.value="";
        alert("Invalid maximum price");
        return false;
    }

    if(!f.srch_condn[0].checked && !f.srch_condn[1].checked)// condition for condition state
    {
        alert("Please choose condition");
        return false;
    }

    if(!f.srch_nego[0].checked && !f.srch_nego[1].checked)// condition for negotiation
    {
        alert("Please choose condition");
        return false;
    }
    return true;
}

/*Login*/
/*Validation for member login page*/
function validate_login(f)
{
   if(f.usr_pass.value=="" || f.usr_pass.value<3)// condition for password
    {
        f.usr_pass.value=="";
        alert("Password length should be at least 3 characters");
        return false;
    }   
    return true;
}

/*Insert mobile*/
function validate_mob(f)
{
    if(f.mob_model.value==""||
        f.mob_desc.value==""||
        f.mob_date.value==""||
        f.mob_size_dm.value==""||
        f.mob_size_wt.value==""||
        f.mob_disp_type.value==""||
        f.mob_disp_size.value==""||
        f.mob_sound.value==""||
        f.mob_mem_phnbk.value==""||
        f.mob_mem_int.value==""||
        f.mob_mem_ext.value==""||
        f.mob_data_gprs.value==""||
        f.mob_data_edge.value==""||
        f.mob_data_3g.value==""||
        f.mob_data_bt.value==""||
        f.mob_data_usb.value==""||
        f.mob_data_wlan.value==""||
        f.mob_cam_pri.value==""||
        f.mob_cam_sec.value==""||
        f.mob_cam_vid.value==""||
        f.mob_cam_fea.value==""||
        f.mob_fea_os.value==""||
        f.mob_fea_cpu.value==""||
        f.mob_fea_radio.value==""||
        f.mob_fea_game.value==""||
        f.mob_fea_color.value==""||
        f.mob_fea_java.value==""||
        f.mob_btry_type.value==""||
        f.mob_btry_tt.value==""||
        f.mob_btry_sb.value==""||
        f.mob_img.value==""||
        f.mob_price.value=="")
        {
        alert("One or more fields are empty!");
        return false;
    }
    if(isNaN(f.mob_price.value)==true)
    {
        f.mob_price.value="";
        alert("Invalid Price");
        return false;

    }
    return true;
}

/*Admin Login*/
function validate_login_admin(f)
{
    if(f.admin.value=="")
    {
        alert("Invalid Admin");
        return false;
    }
    if(f.admin_pass.value=="" || f.admin_pass.value<6)// condition for password
    {
        f.admin.value=="";
        alert("Password length should be at least 6 characters");
        return false;
    }   
    return true;
}

function check(f)
{
    if(f.n_pass.value!=f.cn_pass.value)
    {
        f.n_pass.value=="";
        f.cn_pass.value=="";
        alert("New password doesn't match with the confirm password!");
        return false;
    }
    if(f.n_pass.value=="" && f.cn_pass.value=="")
    {
        alert("One or two password fields are empty!");
        return false;
    }

    if(f.f_name.value.length<6 || f.f_name.value=="")
    {
        f.f_name.value="";
        alert("Invalid Name!");
        return false;
    }

    if(f.l_name.value.length<6 || f.l_name.value=="")
    {
        f.l_name.value="";
        alert("Invalid Last Name!");
        return false;
    }

    if(f.n_add1.value=="")
    {
        f.n_add1.value=="";
        alert("Invalid Address1!");
        return false;
    }

    if(f.n_add2.value=="")
    {
        f.n_add2.value=="";
        alert("Invalid Address2!");
        return false;
    }

    if(f.n_city.value=="")
    {
        f.n_city.value=="";
        alert("Invalid City name!");
        return false;
    }

    var phn=f.n_contact.value;
    if(isNaN(phn)==true || f.n_contact.value=="")
    {
        f.n_contact.value="";
        alert("Invalid Contact number!");
        return false;
    }

    return true;
}

function agreement1()
{
    if(document.frm.agreement.checked)
    {
        document.frm.btn.disabled=false;
    }
    else
    {
        document.frm.btn.disabled=true;
    }
}