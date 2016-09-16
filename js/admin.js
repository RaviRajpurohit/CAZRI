function admin_today_selling() {
    document.getElementById('myIframe').src = 'admin_selling.php';
}
function today_selling(){
    document.getElementById('myIframe').src = 'other/today_selling.php?user='+login_user;
}
function set_price(){
  
    document.getElementById('myIframe').src = 'other/set_price.php';
}
function price(){
    document.getElementById('myIframe').src = 'other/set_price.php';
}

function add_remove(){
    document.getElementById('myIframe').src = 'other/add_remove.php';
}
function inventory(){
    document.getElementById('myIframe').src = 'other/inventory.php';
}
function your_sell(){
    document.getElementById('myIframe').src = 'other/your_selling.php?user='+login_user;
}